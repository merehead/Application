<?php

namespace App\Http\Controllers;

use App\Helpers\Traits\ResponseFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    use ResponseFormatter;

    protected $user;
    protected $template;
    protected $content = FALSE;
    protected $title;
    protected $vars;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function renderOutput() {
        $this->vars = array_add($this->vars,'title',$this->title);



        $this->vars = array_add($this->vars,'content',$this->content);

        return view($this->template)->with($this->vars);

    }

    public function checkReferCode($referCode) {


        $rc = DB::select("select `id` from `users` where `own_referral_code` = '".$referCode."'");

        if ($rc) return $referCode;

        return 0;
    }
}
