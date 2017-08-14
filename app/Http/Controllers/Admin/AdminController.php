<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

        $navigation = view(config('settings.theme').'.navigation.leftMenu')->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $logoInfo = view(config('settings.theme').'.logoInfo.logoInfo')->render();
        $this->vars = array_add($this->vars,'logoInfo',$logoInfo);

        $this->vars = array_add($this->vars,'content',$this->content);

        return view($this->template)->with($this->vars);

    }

    public function index(Request $request){

        $this->template = config('settings.theme').'.templates.adminBase';
        $this->title = 'Admin Home page';
        $this->content = view(config('settings.theme').'.home.home')->render();

        return $this->renderOutput();
    }
}
