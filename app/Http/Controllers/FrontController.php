<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
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

        $header = view(config('settings.frontTheme').'.headers.userRegistrationHeader')->render();
        $this->vars = array_add($this->vars,'header',$header);

        $footer = view(config('settings.frontTheme').'.footers.userRegistrationFooter')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

        $this->vars = array_add($this->vars,'content',$this->content);

        return view($this->template)->with($this->vars);

    }
}
