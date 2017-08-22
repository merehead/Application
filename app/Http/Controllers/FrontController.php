<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //$navigation = view(config('settings.theme').'.navigation.leftMenu')->render();
        //$this->vars = array_add($this->vars,'navigation',$navigation);

        //$logoInfo = view(config('settings.theme').'.logoInfo.logoInfo')->render();
        //$this->vars = array_add($this->vars,'logoInfo',$logoInfo);

        $this->vars = array_add($this->vars,'content',$this->content);

        return view($this->template)->with($this->vars);

    }
}
