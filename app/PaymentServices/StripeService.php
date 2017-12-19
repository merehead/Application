<?php

namespace App\PaymentServices;

use Illuminate\Support\Facades\Log;
use Stripe\FileUpload;
use Stripe\Payout;
use \Stripe\Stripe;
use \Stripe\Token;
use \Stripe\Charge;
use \Stripe\Account;
use Stripe\Transfer;

class StripeService {

    private $stripe_object;

    private $response;

    public function __construct() {
        $this->initialize();

        $this->response = array(
            'status' => NULL,
            'response_object' => NULL,
            'reject_message' => NULL,
            'reject_message_user' => NULL
        );
    }

    public function initialize() {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    private function constructErrorResponse($response) {

        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $response->getJsonBody();
        $error  = $body['error'];

        $formatted_response = array(
            'error' => True,
            'http' => $response->getHttpStatus(),
            'type' => $error['type'],
            //'param' => $error['param'],
            'message' => $error['message'],
            'user' => NULL
        );

        return $formatted_response;
    }

    public function createCreditCardToken(array $creditCardData) {
        $response = Token::create(
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
        return $response;
    }

    public function createCharge(int $amount, string $cardToken) {
        $res = $response = Charge::create(array(
            "amount" => $amount,
            "currency" => 'gbp',
            "source" => $cardToken,
            "description" => "Charging purchaser"
        ));

        return $res;
    }

//    public function createConnectedAccount($email){
//        $acct = \Stripe\Account::create(array(
//            "country" => "GB",
//            "type" => "custom",
//            "email" => $email,
//        ));
//
//        return $acct;
//    }

    public function createConnectedAccount(array $stripeAccountData, int $user_id) {


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

        //todo get caarer document
        $documentId = $this->uploadDocument('../storage/documents/e6b6b2e63a805be2ac105ca68fb81568.jpeg', $account->id);
        $data['legal_entity']['verification']['document'] = $documentId;
        $this->updateConnectedAccount('acct_1BDwrPHySv5f7qBn', $data);


        //todo sync carer account with connected account

        return $account;
    }

    private function uploadDocument($path_to_file, $account_id){
        $response = FileUpload::create(
            array(
                "purpose" => "identity_document",
                "file" => fopen($path_to_file, 'r')
            ),
            array("stripe_account" => $account_id)
        );

        return $response->id;
    }

    public function updateConnectedAccount(string $stripeAccountID, array $stripeAccountData) {

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
            return $response;
    }

    public function attachExternalAccount($connectedAccountId, array $externalAccountData){
        $account = \Stripe\Account::retrieve($connectedAccountId);
        $res = $account->external_accounts->create([
            "external_account" => [
                'object' => 'bank_account',
                'account_number' => $externalAccountData['account_number'],
                'country' => 'gb',
                'currency' => 'gbp',
            ],
            'default_for_currency' => true,
        ]);

        return $res;
    }

    public function createTransfer(string $connectedAccountId, int $amount, string $comment = ''){
        $res = Transfer::create([
            "amount" => $amount,
            "currency" => "gbp",
            'destination' => $connectedAccountId,
            'metadata' => ['comment' => $comment],
        ]);


        return $res;
    }

    public function deleteConnectedAccount($connectedAccountId){
        $account = \Stripe\Account::retrieve($connectedAccountId);
        return $account->delete();
    }

    public function deleteExternalAccount($connectedAccountId, $externalAccountId){
        $account = Account::retrieve($connectedAccountId);
        return $account->external_accounts->retrieve($externalAccountId)->delete();
    }
}

//    dd($stripeService->createConnectedAccount([
//        'email' => 'ovch2008@ukr.net',
//        "legal_entity" => [
//            "address" => [
//                "city" => 'Manchester',
//                "line1" => '50 Newton St',
//                "postal_code" => 'M1',
//            ],
//            "dob" => [
//                "day" => '20',
//                "month" => '12',
//                "year" => '1994'
//            ],
//            "first_name" => 'Andrii',
//            "last_name" => 'Ovcharuk',
//        ],
//    ], 1));

//    dd($stripeService->attachExternalAccount('acct_1BDwrPHySv5f7qBn', ['account_number' => '11111113']));
//    dd($stripeService->deleteExternalAccount('acct_1BDwrPHySv5f7qBn', 'ba_1BEFm8HySv5f7qBnFJyQv3r5'));
//    dd($stripeService->createTransfer('acct_1BDwrPHySv5f7qBn', 1000, 'Payment to carer 1'));
//    dd($stripeService->deleteConnectedAccount('acct_1BDwjOIMrRlUobQ5'));
//    dd($stripeService->createCreditCardToken([
//        'card_number' => '4000 0000 0000 0077',
//        'exp_month' => '12',
//        'exp_year' => '20',
//        'cvc' => '123',
//    ]));

//    dd($stripeService->createCharge(100000, 'tok_1BEFgqDBFNDzp4kiTKbd3UwU'));
?>
