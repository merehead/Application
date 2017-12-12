<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use DB;
use Illuminate\Http\Request;

class HolidaysController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index()
    {

        $data = Holiday::all();
        $this->vars['holiday'] = $data;
        $this->content = view(config('settings.theme') . '.holidays')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request)
    {

        foreach ($request->holiday['id'] as $key => $item) {
            $holidays = Holiday::find($item);
            if (!$holidays) {
                $holidays = new Holiday;
            }
            $holidays->name = $request->holiday['name'][$key];
            $holidays->date = $request->holiday['date'][$key];
            $holidays->save();
        }
        $data = Holiday::all();
        $this->vars['holiday'] = $data;
        $this->content = view(config('settings.theme') . '.holidays')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function delete(Request $request, $id)
    {
        $holidays = Holiday::find($id);
        if (isset($holidays->id)) {
            $holidays->delete();
            return response(json_encode(['status' => 'true', 'message' => '']), 200);
        } else
            return response(json_encode(['status' => 'false', 'message' => 'Field not find']), 200);
    }

}
