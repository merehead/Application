<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(){

        $this->title = 'Holm Care - Blog';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $blog = Blog::with('user')->get();
        $blogDate = Blog::selectRaw("date_format(`created_at`,'%M %Y') as cdate")->groupBy('created_at')->get();


        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $this->content = view(config('settings.frontTheme').'.homePage.blogPage',['blog'=>$blog,'blogDate'=>$blogDate])
            ->render();

        return $this->renderOutput();
    }

    public function view(Request $request, $blog_id){

        $this->title = 'Holm Care - Blog';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $blog = Blog::with('user')->findOrFail($blog_id);

//        dd($blog);

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $this->content = view(config('settings.frontTheme').'.homePage.blogViewPage',['blog'=>$blog])->render();

        return $this->renderOutput();
    }
}
