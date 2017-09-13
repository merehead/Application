<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\AdminController;
#use App\Http\Controllers\Controller;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends AdminController
{
    private $blog;

    public function __construct(Blog $blog) {
        parent::__construct();
        $this->blog = $blog;

        $this->template = config('settings.theme').'.templates.adminBase';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->title = 'Admin Blogs';
        $blogs = Blog::where('id', '>=', 1)->paginate(5);
        $this->vars = array_add($this->vars,'blogs',$blogs);
       // dd($this->vars);

        $this->content = view(config('settings.theme').'.blog.blog')->with($this->vars)->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($blogId)
    {

        $this->title = 'Admin Blogs';
        $blogs = $this->blog->findOrFail($blogId);
        $this->vars = array_add($this->vars,'blog',$blogs);
        $this->content = view(config('settings.theme').'.blog.edit')->with($this->vars)->render();

        return $this->renderOutput();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch ($request->get('action')){

            case 'accept':
                return $id.' - accept';
            case 'reject':
                return $id.' - reject';
            case 'block':
                return $id.' - block';
        }

        dd($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
