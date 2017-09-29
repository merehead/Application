<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Language;
use App\AssistanceType;
use App\ServiceType;
use App\CarersProfile;


class SearchController extends FrontController
{

    public function __construct()
    {
        parent::__construct();

        $this->template = config('settings.frontTheme') . '.templates.homePage';
    }

    public function index(Request $request, $page = 1)
    {

        $data = [];
        $this->title = 'Holm Care - Saerch';
        $input = $request->all();
        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $languages = Language::all();
        $this->vars = array_add($this->vars, 'languages', $languages);
        $typeCare = AssistanceType::all();
        $this->vars = array_add($this->vars, 'typeCare', $typeCare);
        $typeService = ServiceType::all();
        $this->vars = array_add($this->vars, 'typeService', $typeService);

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $perPage = 5;
        $where = '';
        if ($request->get('language')) {
            $where .= 'inner join carer_profile_language cl on cl.carer_profile_id = cp.id and cl.language_id in (' . implode(',', array_keys($request->get('language'))) . ')';
        }
        if ($request->get('typeService')) {
            $where .= 'inner join carer_profile_service_type ct on ct.carer_profile_id = cp.id and ct.service_type_id in (' . $request->get('typeService') . ')';
        }
        if ($request->get('typeCare')) {
            $where .= 'inner join carer_profile_assistance_type cs on cs.carer_profile_id = cp.id and cs.assistance_types_id in ('.implode(',',array_keys($request->get('typeCare'))).')';
        }
        $working_times[1]=[5,6,7];
        $working_times[2]=[8,9,10];
        $working_times[3]=[11,12,13];
        $working_times[4]=[14,15,16];
        $working_times[5]=[17,18,19];
        $working_times[6]=[20,21,22];
        $working_times[0]=[22,24,25];
        if($request->get('findDate')){
            $date=$request->get('findDate');
            $date=explode("/", $date);
            $dayofweek =  date("w", mktime(0, 0, 0, $date[1], $date[0], $date[2]));
            $where .= 'inner join carer_profile_working_time cw on cw.carer_profile_id = cp.id and cw.working_times_id in ('.implode(',',$working_times[$dayofweek]).')';
        }

        $where .=' where registration_progress=20';
        if ($request->get('gender'))
            $where .= " and cp.gender in ('" . implode("','",array_keys($request->get('gender'))) . "')";

        if ($request->get('have_car'))
            $where .= " and cp.have_car='Yes'";

        if ($request->get('work_with_pets'))
            $where .= " and cp.work_with_pets='Yes'";

        if ($request->get('postCode'))
            $where .= " and cp.postcode='".$request->get('postCode')."'";

        $sql = 'select cp.id,first_name,family_name,sentence_yourself,town from carers_profiles cp '.$where. ' group by cp.id,first_name,family_name,sentence_yourself,town';
        $carerResult = DB::select($sql);


        $start = (($page*$perPage)-$perPage==0)?'1':($page*$perPage)-$perPage;
        if(count($carerResult)==1)$start=0;
        $this->vars = array_add($this->vars, 'carerResult', array_slice($carerResult,$start,$perPage));
        $this->vars = array_add($this->vars, 'perPage', $perPage);
        $this->vars = array_add($this->vars, 'carerResultCount', count($carerResult));
        $this->vars = array_add($this->vars, 'page', $page);
        $this->vars = array_add($this->vars, 'requestSearch', $request->all());

        $this->content = view(config('settings.frontTheme') . '.homePage.searchPage', $this->vars)->render();
        if (!$request->get('carerSearchAjax'))
            return $this->renderOutput();
        else {
            $html = view(config('settings.frontTheme') . '.homePage.searchPageAjax', $this->vars)->render();
            $htmlHeader = view(config('settings.frontTheme') . '.homePage.searchPageHeaderAjax', $this->vars)->render();
            $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;
            return response()->json(array('success' => true, 'html' => $html,'sql'=>$sql, 'count' => count($carerResult), 'htmlHeader' => $htmlHeader), 200, [$options]);
            exit;
        }
    }
}
   