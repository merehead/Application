<?php

namespace App\Http\Controllers;

use App\PostCodes;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $postCode=null;
        $this->title = 'Find a personal carer - HOLM CARE';
        $this->description = 'Holm offers care at a far more affordable price than care agencies.';
        $this->keywords = 'looking to hire a personal assistant';

        $input = $request->all();
        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);


        $user = Auth::user();

        if ($user && $user->isPurchaser() && $user->account_status == 'blocked') {

            $this->template = config('settings.frontTheme') . '.templates.blockedUserSorryTemplate';


            $content = view(config('settings.frontTheme') . '.homePage.sorryPageForBlockedPurchaser')->render();
            $this->vars = array_add($this->vars, 'content', $content);

            return $this->renderOutput();
        }

        $load_more_count = $request->get('load-more-count', 5);
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
            $where .= 'inner join carer_profile_language cl on cl.carer_profile_id = cp.id and cl.language_id in (' . implode(',',
                    array_keys($request->get('language'))) . ')';
        }
        if ($request->get('typeService')) {
            $where .= 'inner join carer_profile_service_type ct on ct.carer_profile_id = cp.id and ct.service_type_id in (' . $request->get('typeService') . ')';
        }

        $working_times[1] = [5, 6, 7];
        $working_times[2] = [8, 9, 10];
        $working_times[3] = [11, 12, 13];
        $working_times[4] = [14, 15, 16];
        $working_times[5] = [17, 18, 19];
        $working_times[6] = [20, 21, 22];
        $working_times[0] = [22, 24, 25];
        if ($request->get('findDate')) {
            $date = $request->get('findDate');
            $date = explode("/", $date);
            $dayofweek = date("w", mktime(0, 0, 0, $date[1], $date[0], $date[2]));
            $where .= 'inner join carer_profile_working_time cw on cw.carer_profile_id = cp.id and cw.working_times_id in (' . implode(',',
                    $working_times[$dayofweek]) . ')';
        }
        $where .= 'left join review r on cp.id=r.carer_id';
        $where .= ' where registration_progress=20 and profiles_status_id=2 ';

        if ($request->get('gender')) {
            $where .= " and cp.gender in ('" . implode("','", array_keys($request->get('gender'))) . "')";
        }

        if ($request->get('have_car')) {
            $where .= " and cp.have_car='Yes'";
        }

        if ($request->get('work_with_pets')) {
            $where .= " and cp.work_with_pets!='No'";
        }

        if ($request->get('typeCare')) {
            $careSelect = 'SELECT carer_profile_id FROM (
                              SELECT carer_profile_id,assistance_types_id FROM carer_profile_assistance_type cs WHERE assistance_types_id IN (' . implode(',',
                    array_keys($request->get('typeCare'))) . ')) AS tb
                            GROUP BY carer_profile_id
                           HAVING count(*)=' . count(array_keys($request->get('typeCare')));

            $careResult = DB::select($careSelect);
            $carerId = [];
            foreach ($careResult as $result) {
                $carerId[] = $result->carer_profile_id;
            }
            $where .= ' and cp.id in (' . implode(',', array_values($carerId)) . ') ';
        }

        if ($request->get('postCode') && !empty($request->get('postCode'))) {
            $postCode = trim($request->get('postCode'));
            if(strlen($postCode)>1){

                $code = PostCodes::where('code', '=' ,$postCode)->first();
                if(isset($code->code)){
                    $code->amount=$code->amount+1;
                    $code->save();
                }else{
                    $data=['code'=>$postCode,'amount'=>1,'frequency'=>0];
                    PostCodes::create($data);
                }
            }
            if (strpos($postCode, ' ') === false) {
                $postCode .= ' ';
//                $where .= " AND (SELECT COUNT(*) FROM postcodes p WHERE p.name = LEFT('" . $postCode . "', POSITION(' ' IN '" . $postCode . "')) and  p.name = LEFT(cp.postcode, POSITION(' ' IN '" . $postCode . "')))>0";
//            } else {
            }
            $where .= " AND cp.postcode like '" . $postCode . "%'";
        }
        if ($request->get('load-more', 0) == 1) {
            $page = $request->get('page');
        }

        $order = [];
        if ($request->get('sort-rating', 0) == 1) {
            $order[] = 'avg_total ' . $request->get('sort-rating-order', 'asc');
        }
        if ($request->get('sort-id', 0) == 1) {
            $order[] = 'cp.id ' . $request->get('sort-id-order', 'desc');
        }

        if (empty($order)) {
            $order[] = 'cp.id asc';
        }
        $start = ($page - 1) * $perPage;
        if ($page == 1) {
            $start = 0;
        }
        $carerResult = [];
        $countAllResult = [];
        $sql = 'select cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview,postcode
                  from carers_profiles cp ' . $where . ' 
                group by cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview,postcode
                order by ' . implode(',', $order) . " limit $start,$perPage";
        //if (Auth::check() && Auth::user()->isAdmin()) {
        //echo($sql);
        $carerResult = DB::select($sql); //раскоментить
        //}
        if (Auth::check() && Auth::user()->user_type_id != 4) {
                $order_distance = $request->get('sort-distance-order', 'asc');

            $carerResult = $this->sortByDistanseToCarer($carerResult,$order_distance,$postCode);
        }

        $start = (($page * $perPage) - $perPage == 0) ? '0' : ($page * $perPage) - $perPage;
        //раскоментить
        //if (Auth::check() && Auth::user()->isAdmin()){
        $countAllResult = DB::select('SELECT cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview
                  FROM carers_profiles cp ' . $where . '
                GROUP BY cp.id,first_name,family_name,sentence_yourself,town,avg_total,creview
                ORDER BY ' . implode(',', $order));
        //}
        $countAll = count($countAllResult);

        //if(count($carerResult)<=5)$start=0;
        $carerResultPage = $carerResult; //array_slice($carerResult,$start,$perPage);
        $this->vars = array_add($this->vars, 'carerResult', $carerResultPage);
        $this->vars = array_add($this->vars, 'perPage', $perPage);
        $this->vars = array_add($this->vars, 'carerResultCount', count($carerResult));
        $this->vars = array_add($this->vars, 'page', $page);
        $this->vars = array_add($this->vars, 'requestSearch', $request->all());
        $this->vars = array_add($this->vars, 'countAll', $countAll);

        $load_more = $request->get('load_more');
        $this->content = view(config('settings.frontTheme') . '.homePage.searchPage', $this->vars)->render();
        if (!$request->get('carerSearchAjax')) {
            return $this->renderOutput();
        } else {
            $html = view(config('settings.frontTheme') . '.homePage.searchPageAjax', $this->vars)->render();
            $post_ = true;
            if ($request->get('postCode') && !empty($request->get('postCode'))) {
                if ($this->isExsistPostCode($postCode) == false) {
                    $post_ = false;
                    $html = '<p>Sorry Holm is not yet available in this area. Please <a href="/contact">contact us</a> to request Holm in your area. Many thanks!</p>';
                }
            }
            //var_dump($carerResult[count($carerResult)-1]->id);
            $htmlHeader = view(config('settings.frontTheme') . '.homePage.searchPageHeaderAjax', $this->vars)->render();
            $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;
            return response()->json(array(
                'success' => (count($carerResult) > 0),
                'load-more' => isset($load_more) && !empty($load_more) ? 1 : 0,
                'html' => $html,
                'post_' => $post_,
                'sql' => $sql,
                'start' => $start,
                'page' => $page,
                'id' => (ceil($countAll / $perPage) > $page) ? $carerResult[count($carerResult) - 1]->id : 0,
                'count' => count($carerResult),
                'countAll' => $countAll,
                'htmlHeader' => $htmlHeader
            ), 200, [$options]);
            exit;
        }
    }

    /**
     * @param $carerResult
     * @return mixed
     */
    private function sortByDistanseToCarer($carerResult,$order_distance,$postCode)
    {

        foreach ($carerResult as $key => $item) {
            switch (Auth::user()->user_type_id) {
                case 1:
                    $purchaser = PurchasersProfile::find(Auth::user()->id);
                    if($purchaser->active_user!=null){
                        $servise =ServiceUsersProfile::find($purchaser->active_user);
                        $from = urlencode(trim(($servise->postcode)));
                    }else
                    $from = (trim($purchaser->town . ' ' . $purchaser->address_line1));

                    break;
                case 2:
                    $servise = ServiceUsersProfile::find(Auth::user()->id);
                    $from = urlencode(trim(($servise->postcode)));
                    break;
                case 3:
                    $carer = CarersProfile::find(Auth::user()->id);
                    $from = urlencode(trim(($carer->postcode)));
                    break;
            }
            $to = urlencode(trim($item->postcode));
            $distance = $this->getDistance($from, $to);
            $item->distance = ($distance=='0')?'0 MI':$distance;
        }
        if($order_distance=='asc')
            usort($carerResult, function ($a, $b) {
                return strcmp($a->distance, $b->distance);
            });
        elseif($order_distance=='desc')
            usort($carerResult, function ($a, $b) {
                return strcmp($b->distance, $a->distance);
            });

        return $carerResult;
    }

    /**
     * @param $from - Need post code
     * @param $to - Need post code
     * @return int - distance in mile
     */
    private function getDistance($from, $to)
    {
        $distance = 0;
        $data = array(
            'origins'=>$from,
            'destinations' => $to,
            'mode' => 'driving',
            'language' => 'driving',
            'mode' => 'nl-BE',
            'sensor' => false,
            'units' => 'imperial',
        );
        $url = "http://maps.googleapis.com/maps/api/distancematrix/json?".http_build_query($data);
        if ($from !== $to && !empty($from) && !empty($to)) {
            $result = json_decode(file_get_contents($url), true);
            if ($result['status'] == "OK") {
                $distance = (isset($result['rows'][0]['elements'][0]['distance']['text']))
                    ? ($result['rows'][0]['elements'][0]['distance']['text']) : 'NOT FOUND';
            }else{
                $distance ='NOT_FOUND';
            }
        }
        return $distance;
    }

    private function isExsistPostCode($postCode)
    {
        $sql = "SELECT count(*) AS ctn FROM postcodes p WHERE p.name = LEFT('" . $postCode . "', POSITION(' ' IN '" . $postCode . "'))";
        $carerResult = DB::select($sql);
        return $carerResult[0]->ctn > 0;
    }
}
   