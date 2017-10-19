<?php

namespace App\Helpers;


use App\Helpers\Contracts\PaymentToolsInterface;
use App\StripeCharge;
use App\StripeConnectedAccount;
use App\StripeExternalAccount;
use App\StripeTransfer;
use App\User;
use Stripe\Account;
use Stripe\Balance;
use Stripe\Charge;
use Stripe\FileUpload;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Transfer;

class StripePaymentTools implements PaymentToolsInterface
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function createCreditCardToken(array $creditCardData) : string
    {
        $res = Token::create(
            array(
                "card" => array(
                    "number" => $creditCardData['card_number'],
                    "exp_month" => $creditCardData['exp_month'],
                    "exp_year" => $creditCardData['exp_year'],
                    "cvc" => $creditCardData['cvc'],
                    "currency" => 'gbp'
                )
            )
        );

        return $res->id;
    }

    public function createCharge(int $amount, string $cardToken, int $bookingId) : string
    {
        $res = $response = Charge::create(array(
            "amount" => $amount,
            "currency" => 'gbp',
            "source" => $cardToken,
            "description" => "Charging carer"
        ));

        StripeCharge::create([
            'id' => $res->id,
            'booking_id' => $bookingId,
            'amount' => $amount,
        ]);

        return $res->id;
    }

    public function createRefund(int $amount, string $chargeId, string $comment) : string
    {
        $ref = Refund::create(array(
            "charge" => $chargeId,
            "amount" => $amount,
            "metadata" => ['comment' => $comment],
        ));

        return $ref->id;
    }

    public function createConnectedAccount(array $stripeAccountData, int $userId)
    {
        $carer = User::findOrFail($userId);
        $account = Account::create(
            [
                "type" => 'custom',
                "country" => 'GB',
                "email" => $stripeAccountData['email'],
                "legal_entity" => [
                    "address" => [
                        "city" => $stripeAccountData['legal_entity']['address']['city'],
                        "line1" => $stripeAccountData['legal_entity']['address']['line1'],
                        "postal_code" => $stripeAccountData['legal_entity']['address']['postal_code'],
                    ],
                    "dob" => [
                        "day" => $stripeAccountData['legal_entity']['dob']['day'],
                        "month" => $stripeAccountData['legal_entity']['dob']['month'],
                        "year" => $stripeAccountData['legal_entity']['dob']['year']
                    ],
                    "type" => "individual",
                    "first_name" => $stripeAccountData['legal_entity']['first_name'],
                    "last_name" => $stripeAccountData['legal_entity']['last_name'],
                ],
                "tos_acceptance" => [
                    "date" => time(),
                    "ip" => $_SERVER['REMOTE_ADDR']
                ]
            ]
        );
        $account = Account::retrieve('acct_1BEMdvAij8rTvtXk');

        //todo get caarer document
        $documentPath = 'C:\OSPanel\domains\holm\public\img\Annie_B.png';
        $documentId = $this->uploadDocument($documentPath, $account->id);
        $data['legal_entity']['verification']['document'] = $documentId;
        $this->updateConnectedAccount($data, $account->id);

        StripeConnectedAccount::create([
            'id' => $account->id,
            'carer_id' => $carer->id,
        ]);

        return $account->id;
    }

    public function updateConnectedAccount(array $stripeAccountData, string $stripeAccountID) : bool
    {
        $account = Account::retrieve($stripeAccountID);

        $keys = array_keys($stripeAccountData);

        foreach($keys as $key) {

            // LEGAL ENTITY
            if ($key == 'legal_entity') {

                $legal_entity_keys = array_keys($stripeAccountData[$key]);

                foreach ($legal_entity_keys as $le_key) {

                    // DATE OF BIRTH
                    if ($le_key == 'dob') {

                        $dob_keys = array_keys($stripeAccountData[$key][$le_key]);

                        foreach ($dob_keys as $dob_key) {
                            $account->$key->$le_key->$dob_key = $stripeAccountData[$key][$le_key][$dob_key];
                        }
                    }
                    // ADDRESS
                    else if ($le_key == 'address') {

                        $address_keys = array_keys($stripeAccountData[$key][$le_key]);

                        foreach ($address_keys as $address_key) {
                            $account->$key->$le_key->$address_key = $stripeAccountData[$key][$le_key][$address_key];
                        }
                    }
                    // VERIFICATION
                    else if ($le_key == 'verification') {

                        $verification_keys = array_keys($stripeAccountData[$key][$le_key]);

                        foreach ($verification_keys as $verification_key) {
                            $account->$key->$le_key->$verification_key = $stripeAccountData[$key][$le_key][$verification_key];
                        }
                    }
                    else {
                        // otherwise
                        $account->$key->$le_key = $stripeAccountData[$key][$le_key];
                    }
                }
            }
            // TERMS OF ACCEPTANCE
            else if ($key == 'tos_acceptance') {
                $tos_keys = array_keys($stripeAccountData[$key]);

                foreach ($tos_keys as $tos_key) {
                    $account->$key->$tos_key = $stripeAccountData[$key][$tos_key];
                }
            }
            else {
                $account->$key = $stripeAccountData[$key];
            }
        }
        $response = $account->save();

        return true;
    }

    public function deleteConnectedAccount(string $connectedAccountId) : bool
    {
        $account = Account::retrieve($connectedAccountId);
        $account->delete();

        return true;
    }

    public function createExternalAccount(array $externalAccountData, string $connectedAccountId) : string
    {
        $account = Account::retrieve($connectedAccountId);
        $externalAccount = $account->external_accounts->create([
            "external_account" => [
                'object' => 'bank_account',
                'account_number' => $externalAccountData['account_number'],
                'country' => 'gb',
                'currency' => 'gbp',
            ],
            'default_for_currency' => true,
        ]);

        StripeExternalAccount::create([
            'id' => $externalAccount->id,
            'connected_account_id' => $connectedAccountId,
        ]);

        return $externalAccount->id;
    }

    public function deleteExternalAccount(string $connectedAccountId, string $externalAccountId) : bool
    {
        $account = Account::retrieve($connectedAccountId);
        return $account->external_accounts->retrieve($externalAccountId)->delete();
    }


    private function uploadDocument(string $pathToFile, string$stripeAccountId) : string
    {
        $res = FileUpload::create(
            array(
                "purpose" => "identity_document",
                "file" => fopen($pathToFile, 'r')
            ),
            array("stripe_account" => $stripeAccountId)
        );

        return $res->id;
    }

    public function createTransfer(string $connectedAccountId, int $amount, string $comment = ''){
        $res = Transfer::create([
            "amount" => $amount,
            "currency" => "gbp",
            'destination' => $connectedAccountId,
            'metadata' => ['comment' => $comment],
        ]);

        StripeTransfer::create([
            'id' => $res->id,
            'connected_account_id' => $connectedAccountId,
            'amount' => $amount,
        ]);


        return $res->id;
    }
}