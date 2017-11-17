<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\BookingOverview;
use DB;


class ReviewManagementController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function edit(Request $request, $id){
        $input = $request->all();
        if(isset($input['comment'])){
            $review = BookingOverview::find($id);
            $review->comment = $input['comment'];
            $review->save();
           return redirect()->route('ReviewManagement');
        }

        $review = BookingOverview::find($id);
        $this->vars['reviews']=$review;
        $this->content = view(config('settings.theme').'.review_management_edit')->with( $this->vars)->render();

        return $this->renderOutput();
    }

    public function index(Request $request){
        $input = $request->all();
        if(isset($input['method'])&&$input['id']){
            switch ($input['method']){
                case 'confirm':
                    $review = BookingOverview::find($input['id']);
                    if(isset($review->id)){
                        $review->accept = 1;
                        $review->save();
                    }
                    break;
                case 'delete':
                    $review = BookingOverview::find($input['id']);
                    if(isset($review->id)){
                        $review->delete();
                    }
                    break;
            }

        }
        $data = BookingOverview::all();
        $this->vars['reviews']=$data;
        $this->content = view(config('settings.theme').'.review_management')->with( $this->vars)->render();

        return $this->renderOutput();
    }
}
