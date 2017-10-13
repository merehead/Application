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
        $load_more_count=$request->get('load-more-count',5);
        $languages = Language::all();
        $this->vars = array_add($this->vars, 'languages', $languages);
        $typeCare = AssistanceType::all();
        $this->vars = array_add($this->vars, 'typeCare', $typeCare);
        $typeService = ServiceType::all();
        $this->vars = array_add($this->vars, 'typeService', $typeService);

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);
        $this->vars = array_add($this->vars, 'load_more_count', $load_more_count);

        $perPage = 5;
        $where = '';
        if ($request->get('language')) {
            $where .= 'inner join carer_profile_language cl on cl.carer_profile_id = cp.id and cl.language_id in (' . implode(',', array_keys($request->get('language'))) . ')';
        }
        if ($request->get('typeService')) {
            $where .= 'inner join carer_profile_service_type ct on ct.carer_profile_id = cp.id and ct.service_type_id in (' . $request->get('typeService') . ')';
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


            $where .= 'left join review r on cp.id=r.carer_id';

        $where .=' where registration_progress=20';
        if ($request->get('gender'))
            $where .= " and cp.gender in ('" . implode("','",array_keys($request->get('gender'))) . "')";

        if ($request->get('have_car'))
            $where .= " and cp.have_car='Yes'";

        if ($request->get('work_with_pets'))
            $where .= " and cp.work_with_pets='Yes'";

        if ($request->get('typeCare')) {
            $careSelect = 'select carer_profile_id from (
                              select carer_profile_id,assistance_types_id from carer_profile_assistance_type cs where assistance_types_id in ('.implode(',',array_keys($request->get('typeCare'))).')) as tb
                            group by carer_profile_id
                           having count(*)='.count(array_keys($request->get('typeCare')));

            $careResult = DB::select($careSelect);
            $carerId=[];
            foreach ($careResult as $result)$carerId[]=$result->carer_profile_id;
            $where .= ' and cp.id in ('.implode(',',array_values($carerId)).') ';
        }

        if ($request->get('postCode')&&!empty($request->get('postCode'))){
            $postCode = $request->get('postCode');
            if(strpos(' ',$postCode)===false) $postCode.=' ';
            $where .= " AND (SELECT COUNT(*) FROM postcodes p WHERE p.name = LEFT('".$postCode."', POSITION(' ' IN '".$postCode."')) and  p.name = LEFT(cp.postcode, POSITION(' ' IN '".$postCode."')))>0";
        }
        if ($request->get('load-more',0)==1)
            $where .= " and cp.id > " . $request->get('id');

        $order=[];
        if ($request->get('sort-rating',0)==1)
            $order[]='avg_total '.$request->get('sort-rating-order','asc');
        if ($request->get('sort-id',0)==1)
                $order[]='cp.id '.$request->get('sort-id-order','asc');

        if(empty($order))$order[]='cp.id asc';
        $sql = 'select cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview from carers_profiles cp '.$where. ' group by cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview order by '.implode(',',$order);
        $carerResult = DB::select($sql);

        $start = (($page*$perPage)-$perPage==0)?'0':($page*$perPage)-$perPage;
        $countAll = count(DB::select(str_replace( " and cp.id > " . $request->get('id') ,'',$sql)));
        if(count($carerResult)==1)$start=0;
        $carerResultPage = array_slice($carerResult,$start,$perPage);
        $this->vars = array_add($this->vars, 'carerResult', $carerResultPage);
        $this->vars = array_add($this->vars, 'perPage', $perPage);
        $this->vars = array_add($this->vars, 'carerResultCount', count($carerResult));
        $this->vars = array_add($this->vars, 'page', $page);
        $this->vars = array_add($this->vars, 'requestSearch', $request->all());
        $this->vars = array_add($this->vars, 'countAll', $countAll);

        $load_more = $request->get('load_more');
        $this->content = view(config('settings.frontTheme') . '.homePage.searchPage', $this->vars)->render();
        if (!$request->get('carerSearchAjax'))
            return $this->renderOutput();
        else {
            $html = view(config('settings.frontTheme') . '.homePage.searchPageAjax', $this->vars)->render();
            $post_=true;
            if ($request->get('postCode')&&!empty($request->get('postCode'))){
                if($this->isExsistPostCode($postCode)==false){
                    $post_=false;
                    $html='<p>Sorry Holm is not yet available in this area. Please <a href="/contact">contact us</a> to request Holm in your area. Many thanks!</p>';
                }
            }
            $htmlHeader = view(config('settings.frontTheme') . '.homePage.searchPageHeaderAjax', $this->vars)->render();
            $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;
            return response()->json(array(
                'success' => (count($carerResult)>0),
                'load-more' => isset($load_more) && !empty($load_more)?1:0,
                'html' => $html,
                'post_'=>$post_,
                'sql' => $sql,
                'id'=>(count($carerResultPage)-1>0)?$carerResultPage[count($carerResultPage)-1]->id:0,
                'count' => count($carerResult),
                'countAll' => $countAll,
                'htmlHeader' => $htmlHeader), 200, [$options]);
            exit;
        }
    }
    private function isExsistPostCode($postCode){
        $sql = "select count(*) as ctn from postcodes p where p.name = left('".$postCode."', LENGTH(p.name)) and left('".$postCode."', LENGTH(p.name))='".$postCode."'";
        $carerResult = DB::select($sql);//dd($carerResult[0]->ctn>0);
        return $carerResult[0]->ctn>0;
    }
}
   