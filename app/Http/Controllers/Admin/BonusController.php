<?php

namespace App\Http\Controllers\Admin;


use App\BonusPayout;
use App\BonusTransaction;
use App\StripeConnectedAccount;
use Illuminate\Http\Request;
use PaymentTools;
use DB;


class BonusController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function getBonusesCarer(Request $request) {

            $res = DB::table('bonus_payouts')
                ->join('users', 'bonus_payouts.user_id', '=', 'users.id')
                ->select('bonus_payouts.id')
                ->where('users.user_type_id', 3)
                ->get();

        $res = $res->pluck('id')->toArray();

        $bonusPayouts = BonusPayout::find($res);
        $userName = $request->get('userName',false);
        if($userName){
            $bonusPayouts = $bonusPayouts->filter(function($item)use($userName){
                if(strpos(strtolower($item->user->full_name),strtolower($userName))!==false)
                    return true;
            });
        }
        $this->vars['bonusPayouts']=$bonusPayouts;

        $this->content = view(config('settings.theme').'.bonusesCarers')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function getBonusesPurchaser(Request $request) {
        $res = DB::table('bonus_payouts')
            ->join('users', 'bonus_payouts.user_id', '=', 'users.id')
            ->select('bonus_payouts.id')
            ->where('users.user_type_id', 1)
            ->get();

        $res = $res->pluck('id')->toArray();

        $bonusPayouts = BonusPayout::find($res);
        $userName = $request->get('userName',false);
        if($userName){
            //dd($userName);
            $bonusPayouts = $bonusPayouts->filter(function($item)use($userName){
                dd($item);
                if(strpos(strtolower($item->user->full_name),strtolower($userName))!==false)
                    return true;
            });
        }
        $this->vars['bonusPayouts'] = $bonusPayouts;
        $this->content = view(config('settings.theme').'.bonusesPurchasers')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function payoutBonus(Request $request) {
        $bonusPayout = BonusPayout::findOrFail($request->bonus_id);
        $user = $bonusPayout->user;
        if($user->user_type_id == 1){
            //Purchaser
            BonusTransaction::create([
               'user_id' => $user->id,
               'amount' => $bonusPayout->amount,
            ]);
        } elseif($user->user_type_id == 3){
            //Carer
            $stripeConnectedAccount = StripeConnectedAccount::where('carer_id', $user->id)->get()->first();
            try {
                PaymentTools::createTransfer($stripeConnectedAccount->id, 0, $bonusPayout->amount * 100, 'Bonus payout');
            } catch (\Exception $ex) {
                return response($this->formatResponse('error', $ex->getMessage()));
            }
        }

        $bonusPayout->payout = true;
        $bonusPayout->save();

        return response(['status' => 'success']);
    }

    public function cancelBonus(Request $request) {
        $bonusPayout = BonusPayout::findOrFail($request->bonus_id);
        $bonusPayout->delete();

        return response(['status' => 'success']);
    }
}
