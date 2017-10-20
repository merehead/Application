<?php
namespace App\Helpers\Contracts;

interface PaymentToolsInterface
{
    public function createCreditCardToken(array $creditCardData) : string;

    public function createCharge(int $amount, string $cardToken, int $bookingId) : string;

    public function createRefund(int $amount, string $chargeId, string $comment) : string;

    public function createConnectedAccount(array $stripeAccountData, int $userId);

    public function updateConnectedAccount(array $stripeAccountData, string $stripeAccountID) : bool;

    public function deleteConnectedAccount(string $connectedAccountId) : bool;

    public function createExternalAccount(array $externalAccountData, string $connectedAccountId) : string;

    public function deleteExternalAccount(string $connectedAccountId, string $externalAccountId) : bool;

    public function createTransfer(string $connectedAccountId, int $amount, string $comment = '');

    public function createBonusPayment(int $amount, int $bookingId);


}