<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;


class SearchController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(Request $request){

        $data = [];
        $this->title = 'Holm Care - Saerch';
        $input = $request->all();
        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        if(!isset($input['search']))
            $blog = Blog::with('user')->paginate(8);
        else
            $blog = Blog::with('user')->where('body','like','%'.$input['search'].'%')->paginate(8);
//dd($blog->items());
        $blogDate = Blog::selectRaw("date_format(`created_at`,'%M %Y') as cdate,date_format(`created_at`,'%m')as month,date_format(`created_at`,'%Y')as year")->groupBy('created_at')->get();

        $data = array_add($data,'blog',$blog);
        $data = array_add($data,'blogDate',$blogDate);

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $this->content = view(config('settings.frontTheme').'.homePage.searchPage',$data)->render();

        return $this->renderOutput();
    }

    public function viewFilter(Request $request,$month,$year){
        $input = $request->all();

        $data = [];
        $this->title = 'Holm Care - Blog';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();
        if(!isset($input['search']))
        $blog = Blog::with('user')->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)
            ->paginate(8);
        else
            $blog = Blog::with('user')->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->
                where('body','like','%'.$input['search'].'%')->paginate(8);
        $blogDate = Blog::selectRaw("date_format(`created_at`,'%M %Y') as cdate,date_format(`created_at`,'%m')as month,date_format(`created_at`,'%Y')as year")->groupBy('created_at')->get();

        $data = array_add($data,'blog',$blog);
        $data = array_add($data,'month',$month);
        $data = array_add($data,'year',$year);
        $data = array_add($data,'blogDate',$blogDate);

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $this->content = view(config('settings.frontTheme').'.homePage.blogPage',$data)->render();

        return $this->renderOutput();
    }

    public function view(Request $request, $blog_id){
        $data = [];
        $this->title = 'Holm Care - Blog';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $blog = Blog::with('user')->findOrFail($blog_id);
        $relationPost = Blog::all()->where('id','!=',$blog_id)->random(2);
        //dd($relationPost);
        $data = array_add($data,'relationPost',$relationPost);
        $data = array_add($data,'blog',$blog);
        $data = array_add($data,'image','');
        $data = array_add($data,'title',$blog->title);
        $data = array_add($data,'url',route('BlogPage').'/'.$blog->id);

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $this->content = view(config('settings.frontTheme').'.homePage.blogViewPage',$data)->render();

        return $this->renderOutput();
    }
}
