<?php

namespace App\Http\Controllers;

use App\StripeCostumer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardsController extends FrontController
{
    public function store(Request $request){
        $user = Auth::user();

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

            $stripeCustomer = StripeCostumer::create([
                'purchaser_id' => $user->id,
                'token' => $customer->id,
                'last_four' => substr(str_replace(' ','',$request->number), 12),
            ]);
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }
        $view = view(config('settings.frontTheme').'.purchaserProfiles.payment_card',['card'=>$request])->render();
        return response($this->formatResponse('success', null, ['id' => $stripeCustomer,'card'=>$view]));
    }

    public function destroy($card_id){
        $customer = StripeCostumer::findOrFail($card_id);
        $customer->delete();

        return response($this->formatResponse('success'));
    }
}
