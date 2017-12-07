<?php

namespace App\Http\Controllers;

use App\StripeCostumer;
use App\User;
use Illuminate\Http\Request;

class CreditCardsController extends FrontController
{
    public function store(Request $request){
//        $user = Auth::user();
        $user  = User::find(2);

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = \Stripe\Customer::create(array(
                'source'   => [
                    'object' => 'card',
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ));

            dd($customer);


            $stripeCustomer = StripeCostumer::create([
                'purchaser_id' => $user->id,
                'token' => $customer->id,
                'last_four' => substr($request->number, 12),
            ]);
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }

        return response($this->formatResponse('success', null, ['id' => $stripeCustomer]));
    }

    public function destroy($card_id){
        $customer = StripeCostumer::findOrFail($card_id);
        $customer->delete();

        return response($this->formatResponse('success'));
    }
}
