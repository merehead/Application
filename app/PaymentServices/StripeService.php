<?php

namespace App\PaymentServices;

use Illuminate\Support\Facades\Log;
use \Stripe\Stripe;
use \Stripe\Token;
use \Stripe\Charge;

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

        $response = NULL;
        $error_response = NULL;

        $currency = 'GBP';
        try {

            $response = Token::create(
                array(
                    "card" => array(
                        "number" => $creditCardData['card_number'],
                        "exp_month" => $creditCardData['exp_month'],
                        "exp_year" => $creditCardData['exp_year'],
                        "cvc" => $creditCardData['cvc'],
                        "currency" => $currency
                    )
                )
            );
        } catch(\Stripe\Error\Card $e) {
            $error_response = $this->constructErrorResponse($e);

            // user error
            $error_response['user'] = true;

        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            $error_response = $this->constructErrorResponse($e);

            // user error (possibly)
            $error_response['user'] = true;

        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\Base $e) {
            // Generic Stripe error
            $error_response = $this->constructErrorResponse($e);

        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $error_response = $this->constructErrorResponse($e);

        }

        if ($error_response)
            return $error_response;
        else
            return $response;
    }

    public function createCharge(array $chargeData, $cardToken) {

        $response = NULL;
        $error_response = NULL;

        $currency = 'GBP';
        try {

            $response = Charge::create(array(
                "amount" => $chargeData['amount'],
                "currency" => $currency,
                "source" => $cardToken,
                "description" => "Charging carer"
            ));

        } catch(\Stripe\Error\Card $e) {
            $error_response = $this->constructErrorResponse($e);

            // user error
            $error_response['user'] = true;

        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            $error_response = $this->constructErrorResponse($e);

            // user error (possibly)
            $error_response['user'] = true;

        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            $error_response = $this->constructErrorResponse($e);

        } catch (\Stripe\Error\Base $e) {
            // Generic Stripe error
            $error_response = $this->constructErrorResponse($e);

        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $error_response = $this->constructErrorResponse($e);

        }

        if ($error_response)
            return $error_response;
        else
            return $response;
    }
}
?>
