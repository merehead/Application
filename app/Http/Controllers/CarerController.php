<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Booking;
use App\CarerReference;
use App\CarersProfile;
use App\Interfaces\Constants;
use App\Language;
use App\Postcode;
use App\PurchasersProfile;
use App\ServiceType;
use App\ServiceUsersProfile;
use App\User;
use App\Document;
use App\WorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Auth;

class CarerController extends FrontController implements Constants
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getNoAddress(){
        $response = array();
        $response['query'] = '';
        $response['suggestions'] = array();
        return response(json_encode($response),200);
    }

    public function welcome()
    {
        $this->template = config('settings.frontTheme') . '.templates.ImCarer';
        $this->title = 'I am a home care worker - HOLM CARE';
        $this->description = 'Are you a qualified Care Worker? Not joined Holm yet? Join now and receive a £50 bonus just for registering.';
        $this->keywords='home care worker jobs, private care work, home care worker, personal care assistant career';


        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        $carers = CarersProfile::orderBy('id', 'desc')
            ->take(3)
            ->get();
        $this->vars = array_add($this->vars,'carers',$carers);

        $this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->with($this->vars)->render();
        return $this->renderOutput();
    }

    public function index($id=null)
    {

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);



        if (!Auth::check()) {
            return \redirect('welcome-carer');
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {
            $newBookings = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('purchaser_id', Auth::user()->id)->get();
            $this->vars = array_add($this->vars, 'newBookings', $newBookings);

            if(!empty($id) && Auth::user()->user_type_id==4) { //админ
                $carerProfile = CarersProfile::findOrFail($id);
            } else {
                $carerProfile = CarersProfile::findOrFail($this->user->id);

            }

            if ($carerProfile->registration_progress != '20') {
                return redirect()->action('CarerRegistrationController@index');
            }
            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'carerProfile', $carerProfile);
            $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'postcodes', $postcodes);

            $typeServices = ServiceType::all();
            $this->vars = array_add($this->vars, 'typeServices', $typeServices);

            $typeCares = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCares', $typeCares);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $newBookings = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('carer_id', Auth::user()->id)->get();
            $this->vars['newBookings'] = $newBookings;
            $this->content = view(config('settings.frontTheme') . '.CarerProfiles.PrivateProfile')->with($this->vars)->render();

        }

        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        //dd($this->content);

        return $this->renderOutput();
    }

    public function profile($user_id)
    {


        // Это вывод ПУБЛИЧНОГО профиля



/*        if(Auth::check()) {
            //TODO карер может смотреть свой профиль и никого другого
            //todo Нет, не так!!! Публичный профиль могут смотреь все без каких либо ограничений
            if (Auth::user()->user_type_id == 3&&Auth::user()->id!=$user_id) {
                return \redirect('welcome-carer');
            }
        }*/

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';


        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();


        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);


        $carerProfile = CarersProfile::findOrFail($user_id);

        $this->vars = array_add($this->vars, 'reviews', $carerProfile->carerReviews());

        $this->vars = array_add($this->vars, 'user', $this->user);
        $this->vars = array_add($this->vars, 'carerProfile', $carerProfile);
        $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
        $this->vars = array_add($this->vars, 'postcodes', $postcodes);
        $typeCare = $carerProfile->AssistantsTypes()->get();
        $this->vars = array_add($this->vars, 'typeCare', $typeCare);
        $typeCareAll = AssistanceType::all();
        $this->vars = array_add($this->vars, 'typeCareAll', $typeCareAll);


        $this->title = $carerProfile->first_name.' '.$carerProfile->family_name. ' - Home care worker -  HOLM CARE';
        $this->description = $carerProfile->first_name.' '.$carerProfile->family_name. ' provides nursing care in your own home  on our personal home care online market place';
        $this->keywords='home care worker, live in personal carer, live in care assistant ';

        /*$typeServices = ServiceType::all();
        $this->vars = array_add($this->vars, 'typeServices', $typeServices);*/

        $workingTimes = $carerProfile->WorkingTimes()->get();
        $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
        $languages = $carerProfile->Languages()->get();
        $this->vars = array_add($this->vars, 'languages', $languages);

        $modals = view(config('settings.frontTheme') . '.includes.modals')->with($this->vars)->render();
        $this->vars = array_add($this->vars, 'modals', $modals);

        $times = array(2=>array(5,8,11,14,17,20,23),
            3=>array(6,9,12,15,18,21,24),
            4=>array(7,10,13,16,19,22,25));
        $this->vars = array_add($this->vars, 'times', json_encode($times));
        $documents_type = array(
            'nvq',
            'care_certificate',
            'health_and_social',
            'training_certificate',
            'additional_training_course',
            'other_relevant_qualification'
        );
        $documents_name = array(
            'nvq' => 'NVQ',
            'care_certificate' => 'CARE CERTIFICATE',
            'health_and_social' => 'Health and social',
            'training_certificate' => 'Training certificate',
            'additional_training_course' => 'Additional training course',
            'other_relevant_qualification' => 'Other relevant qualification'
        );
        foreach ($documents_type as $dt) {
            $documents[$dt] = Document::where('user_id', '=', $user_id)->where('type', '=', $dt)->get(['title']);
        }
        $this->vars = array_add($this->vars, 'documents', $documents);
        $this->vars = array_add($this->vars, 'documents_name', $documents_name);
        $this->vars = array_add($this->vars, 'documents_type', $documents_type);
//        $Message = view(config('settings.frontTheme').'.CarerProfiles.Booking.Message')->with($this->vars)->render();
//        $this->vars = array_add($this->vars, 'Message', $Message);
        $this->content = view(config('settings.frontTheme') . '.CarerProfiles.PublicProfile')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function bookingFilter($status = 'all')
    {

        //todo костыль на логаут
        if (!Auth::check()) {
            return \redirect('/');
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        }

        $user = Auth::user();

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);
        $carerProfile = CarersProfile::findOrFail($user->id);
        $this->vars = array_add($this->vars,'carerProfile',$carerProfile);



        $this->vars = array_add($this->vars, 'status', $status);

        $newBookings = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('carer_id', $user->id)->get();
        $this->vars = array_add($this->vars, 'newBookings', $newBookings);

        $inProgressBookings = Booking::whereIn('status_id', [self::CONFIRMED, self::IN_PROGRESS, self::DISPUTE])->where('carer_id', $user->id)->get();
        $inProgressAmount = 0;
        foreach ($inProgressBookings as $booking){
            $inProgressAmount += ($booking->hours * $booking->hour_price);
        }

        $this->vars = array_add($this->vars, 'inProgressBookings', $inProgressBookings);
        $this->vars = array_add($this->vars, 'inProgressAmount', $inProgressAmount);

        $completedBookings = Booking::where('status_id', 7)->where('carer_id', $user->id)->get();
        $completedAmount = 0;
        foreach ($completedBookings as $booking){
            $completedAmount += ($booking->hours * $booking->hour_price);
        }
        $this->vars = array_add($this->vars, 'completedBookings', $completedBookings);
        $this->vars = array_add($this->vars, 'completedAmount', $completedAmount);

        $canceledBookings = Booking::where('status_id', 4)->where('carer_id', $user->id)->get();
        $this->vars = array_add($this->vars, 'canceledBookings', $canceledBookings);

        $this->content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.BookingTabCarerall')->with($this->vars)->render();


        return $this->renderOutput();
    }

    public function update(Request $request)
    {



        $input = $request->all();

        //dd($input['Persons'][0]['phone'],$input['Persons'][1]['phone']);


        $carerProfiles = CarersProfile::findOrFail($input['id']);

        if ($input['stage'] == 'general') {
            $this->validate($request, [

                'like_name' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'Persons.0.phone' =>
                    array(
                        'required',
                        'regex:/^0[0-9]{10}$/',
                    ),
                'Persons.1.phone' =>
                    array(
                        'required',
                        'regex:/^0[0-9]{10}$/',
                    ),
                'mobile_number' =>
                    array(
                        'required',
                        'regex:/^07[0-9]{9}$/',
                    ),
                'address_line1' =>
                    array(
                        'required',
                        'string',
                        'max:256'
                    ),
                'address_line2' =>
                    array(
                        'nullable',
                        'string',
                        'max:256'
                    ),
                'town' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'postcode' =>
                    array(
                        'required',
                        'regex:/^(([Bb][Ll][0-9])|([Mm][0-9]{1,2})|([Oo][Ll][0-9]{1,2})|([Ss][Kk][0-9]{1,2})|([Ww][AaNn][0-9]{1,2})) {0,}([0-9][A-Za-z]{2})$/',
                    ),

            ]);

            $depart = "#carerGeneral";

            if (isset($input['like_name'])) {
                $carerProfiles->like_name = $input['like_name'];
            }
            if (isset($input['address_line1'])) {
                $carerProfiles->address_line1 = $input['address_line1'];
            }
            if (isset($input['address_line2'])) {
                $carerProfiles->address_line2 = $input['address_line2'];
            }
            if (isset($input['town'])) {
                $carerProfiles->town = $input['town'];
            }
            if (isset($input['postcode_id'])) {
                $carerProfiles->postcode_id = $input['postcode_id'];
            }
            if (isset($input['postcode'])) {
                $carerProfiles->postcode = $input['postcode'];
            }
            if (isset($input['mobile_number'])) {
                $carerProfiles->mobile_number = $input['mobile_number'];
            }
            if (isset($input['sentence_yourself'])) {
                $carerProfiles->sentence_yourself = $input['sentence_yourself'];
            }
            if (isset($input['description_yourself'])) {
                $carerProfiles->description_yourself = $input['description_yourself'];
            }
            if (isset($input['national_insurance_number'])) {
                $carerProfiles->national_insurance_number = $input['national_insurance_number'];
            }
            if (isset($input['like_name'])) {
                $carerProfiles->like_name = $input['like_name'];
            }

            $carerProfiles->save();

            if (isset($input['Persons']) && count($input['Persons'])) {
                foreach ($input['Persons'] as $personData) {

                    $person = CarerReference::findOrFail($personData['id']);

                    if (isset($personData['name'])) {
                        $person->name = $personData['name'];
                    }
                    if (isset($personData['job_title'])) {
                        $person->job_title = $personData['job_title'];
                    }
                    if (isset($personData['relationship'])) {
                        $person->relationship = $personData['relationship'];
                    }
                    if (isset($personData['phone'])) {
                        $person->phone = $personData['phone'];
                    }
                    if (isset($personData['email'])) {
                        $person->email = $personData['email'];
                    }

                    $person->save();

                    unset($person);
                }
            }
            unset($carerProfiles);
        }
        if ($input['stage'] == 'bank') {

            $this->validate($request, [
                'account_number' => 'nullable|integer',
                'sort_code' => 'nullable|string|max:15',
            ]);

            $depart = "#carerBank";

            //$user = User::findOrFail($input['id']);
            $carerProfiles = CarersProfile::findOrFail($input['id']);
            if (isset($input['sort_code'])) {
                $carerProfiles->sort_code = $input['sort_code'];
            }
            if (isset($input['account_number'])) {
                $carerProfiles->account_number = $input['account_number'];
            }

            $carerProfiles->save();
            /*     $user->save();
                 unset($user);*/
            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateTypeCare') {

            $depart = "#carerTypeCare";

            if (isset($input['typeCare'])) {
                $carerProfiles->AssistantsTypes()->sync(array_keys($input['typeCare']));
            }

            if (isset($input['typeService'])) {
                $carerProfiles->ServicesTypes()->sync(array_keys($input['typeService']));
            }

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateAvailability') {

            $depart = "#carerAvailability";

            if (isset($input['times'])) {
                $carerProfiles->times = $input['times'];
            }

            if (isset($input['work_hours'])) {
                $carerProfiles->work_hours = $input['work_hours'];
            }
            if (isset($input['work_at_holiday'])) {
                $carerProfiles->work_at_holiday = $input['work_at_holiday'];
            }

            $carerProfiles->save();

            if (isset($input['workingTime'])) {
                $carerProfiles->WorkingTimes()->sync(array_keys($input['workingTime']));
            }

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivatePets') {

            $depart = "#carerPets";

            if (isset($input['work_with_pets'])) {
                $carerProfiles->work_with_pets = $input['work_with_pets'];
            }
            if (isset($input['pets_description'])) {
                $carerProfiles->pets_description = $input['pets_description'];
            }

            $carerProfiles->save();

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateLanguages') {

            //dd($input);

            $depart = "#carerLanguages";
            //DB::query('delete from carer_profile_language where carer_profile_id=:?',[$input['id']]);
            if (isset($input['languages'])) {

            $languages = $request->input('languages');
                $carerProfiles->Languages()->sync(array_map('intval',array_keys($languages)));
                }if (isset($input['language_additional'])) {$carerProfiles->language_additional = $input['language_additional'];}
                $carerProfiles->save();

/*            $serviceUsersProfile->Languages()->sync(array_map('intval', array_keys($languages)));
            */

            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateTransport') {

            $depart = "#carerTransport";

            if (isset($input['driving_licence'])) {
                $carerProfiles->driving_licence = $input['driving_licence'];
            }
            if (isset($input['have_car'])) {
                $carerProfiles->have_car = $input['have_car'];
            }
            if (isset($input['use_car'])) {
                $carerProfiles->use_car = $input['use_car'];
            }
            if (isset($input['car_insurance_number'])) {
                $carerProfiles->car_insurance_number = $input['car_insurance_number'];
            }
            if (isset($input['DBS_number'])) {
                $carerProfiles->DBS_number = $input['DBS_number'];
            }


            if (isset($input['driver_licence_valid_until'])) {
                $carerProfiles->driver_licence_valid_until = $input['driver_licence_valid_until'];
            }
            if (isset($input['car_insurance_valid_until'])) {
                $carerProfiles->car_insurance_valid_until = $input['car_insurance_valid_until'];
            }

            $carerProfiles->save();
            unset($carerProfiles);
        }

        if ($input['stage'] == 'carerPrivateCriminal') {

            $depart = "#carerCriminal";

            if (isset($input['DBS'])) {
                $carerProfiles->DBS = $input['DBS'];
            }
            if (isset($input['criminal_conviction'])) {
                $carerProfiles->criminal_conviction = $input['criminal_conviction'];
            }
            if (isset($input['DBS_use'])) {
                $carerProfiles->DBS_use = $input['DBS_use'];
            }
            if (isset($input['DBS_identifier'])) {
                $carerProfiles->DBS_identifier = $input['DBS_identifier'];
            }
            if (isset($input['date_certificate'])) {
                $carerProfiles->date_certificate = $input['date_certificate'];
            }

            $carerProfiles->save();
            unset($carerProfiles);
        }

        //return redirect()->back();


        return response(json_encode(['status' => 'save']), 200);

    }

    public function getAddress(Request $request){
        $query = $request->get('query');
        $enable = $request->get('enable');
        $response = array();
        $response['query'] = $query;
        $response['suggestions'] = [];
        if(!$enable) {
            $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M&input=" . urlencode($query);
            //$url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M&address=".urlencode($query);

            $data = file_get_contents($url);
            $items = json_decode($data, true);
            $response = array();
            $response['query'] = $query;
            foreach ($items['predictions'] as $item) {
                $response['suggestions'][] = array(
                    "value" => $item['description'],
                    "data" => $item
                );
            }
//        foreach ($items['results'] as $item){
//            $response['suggestions'][]=array(
//                "value"=>$item['formatted_address'],
//                "data"=>$this->getAddressComponents($item['address_components'])
//            );
//        }
        }
        return response(json_encode($response),200);

    }

    public function address_autocomplete(Request $request){

        $apiKey = 'PCWSC-24HJR-XTT9V-NH82T';

        if($request->has('query')&&!$request->has('udprn')){
            $url = 'http://ws.postcoder.com/pcw/'.$apiKey.'/autocomplete/v2/uk/'.urlencode($request->get('query')).'?format=json';
            $data = file_get_contents($url);
            $items = json_decode($data, true);
            $response = array();
            $response['query'] = $request->get('query');
            foreach ($items['predictions'] as $item) {
                $item["query"] = $request->get('query');
                $response['suggestions'][] = array(
                    "value" => $item['prediction'],
                    "data" => $item,
                    "query" => $request->get('query')
                );
            }
        }else{
            $url = 'http://ws.postcoder.com/pcw/'.$apiKey.'/address/uk/'.urlencode($request->get('query')).'?udprn='.$request->get('udprn');
            $response = file_get_contents($url);
        }
        return response($response,200);

    }

    private function getAddressComponents($address){

        $arr = [];
        foreach ($address as $item){
            $arr[$item['types'][0]]=array(
                'long_name'=>$item['long_name'],
                'short_name'=>$item['short_name'],
                'types'=>$item['types'][0]
            );
        }
        return $arr;
    }

    public function review($bookings_id){

        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care - Leave review';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $bookings = Booking::findOrFail($bookings_id);
        $service_user_id = $bookings->service_user_id;
        $purchaser_id = $bookings->purchaser_id;

        $service_user = ServiceUsersProfile::findOrFail($service_user_id);
        $purchaser = PurchasersProfile::findOrFail($purchaser_id);

        $this->vars = array_add($this->vars, 'carerProfile', $bookings);
        $this->vars = array_add($this->vars, 'service_user', $service_user);
        $this->vars = array_add($this->vars, 'purchaser', $purchaser);


        $this->content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.CarerLeaveReview')->with($this->vars)
            ->render();
        return $this->renderOutput();
    }

    public function appointment(Request $request, $service_user_id){
        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care - Leave review';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $service_user = ServiceUsersProfile::findOrFail($service_user_id);
        $this->vars = array_add($this->vars, 'service_user', $service_user);

        $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.Booking.NewAnAppointment')->with($this->vars)
            ->render();

        return $this->renderOutput();
    }
}

