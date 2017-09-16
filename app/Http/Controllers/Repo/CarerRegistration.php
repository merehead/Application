<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Repo;


use App\CarerReference;
use App\CarersProfile;
use App\Http\Requests\CarerRegistrationRequest;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CarerRegistration
{
    use  ValidatesRequests;

    protected $model = FALSE;

    public function __construct(CarersProfile $carersProfile) {
        $this->model = $carersProfile;
    }

    public function getID()
    {


        $user = Auth::user();

        return $user->id;
    }

    public function getNextStep()
    {


        $user = Auth::user();

            $currentStep = $this->model->find($user->id)->registration_progress;


        switch ($currentStep) {
            case '0' : $step = 'Step1_carerRegistration';break;
            case '1' : $step = 'Step2_carerRegistration';break;
            case '2' : $step = 'Step3_carerRegistration';break;
            case '3' : $step = 'Step4_carerRegistration';break;
            case '4' : $step = 'Step5_carerRegistration';break;
            case '5' : $step = 'Step5_1_carerRegistration';break;
            case '5_1' : $step = 'Step5_2_carerRegistration';break;
            case '5_2' : $step = 'Step6_carerRegistration';break;
            case '6' : $step = 'Step7_carerRegistration';break;
            case '7' : $step = 'Step8_carerRegistration';break;
            case '8' : $step = 'Step9_carerRegistration';break;
            case '9' : $step = 'Step10_carerRegistration';break;
            case '10' : $step = 'Step11_carerRegistration';break;
            case '11' : $step = 'Step12_carerRegistration';break;
            case '12' : $step = 'Step13_carerRegistration';break;
            case '13' : $step = 'Step14_carerRegistration';break;
            case '14' : $step = 'Step14_1_carerRegistration';break;
            case '14_1' : $step = 'Step15_carerRegistration';break;
            case '15' : $step = 'Step16_carerRegistration';break;
            case '16' : $step = 'Step17_carerRegistration';break;
            case '17' : $step = 'Step18_carerRegistration';break;
            case '18' : $step = 'Step19_carerRegistration';break;
            case '19' : $step = 'Step20_carerRegistration';break;
            case '20' : $step = 'Step21_carerRegistration';break;
            //case '21' : $step = 'Step2_carerRegistration';break;
        }

        return $step;
    }

    public function setNextStep($request)
    {

        $array=$request->all();

        $user = Auth::user();

        $carersProfile = $this->model->findOrFail($user->id);

        $nextStep = 0;
        switch ($array['step']) {
            case '1' : $nextStep = '1';break;
            case '2' : $nextStep = '2';break;
            case '3' : $nextStep = '3';break;
            case '4' : $nextStep = '4';break;
            case '5' : $nextStep = '5';break;
            case '5_1' : $nextStep = '5_1';break;
            case '5_2' : $nextStep = '5_2';break;
            case '6' : $nextStep = '6';break;
            case '7' : $nextStep = '7';break;
            case '8' : $nextStep = '8';break;
            case '9' : $nextStep = '9';break;
            case '10' : $nextStep = '10';break;
            case '11' : $nextStep = '11';break;
            case '12' : $nextStep = '12';break;
            case '13' : $nextStep = '13';break;
            case '14' : $nextStep = '14';break;
            case '14_1' : $nextStep = '14_1';break;
            case '15' : $nextStep = '15';break;
            case '16' : $nextStep = '16';break;
            case '17' : $nextStep = '17';break;
            case '18' : $nextStep = '18';break;
            case '19' : $nextStep = '19';break;
            case '20' : $nextStep = '20';break;
            case '21' : $nextStep = '21';break;
        }

        //dd($request->all());


        $carersProfile->registration_progress = $nextStep;

        if ($request->input('step')==5 && $request->input('criminal_conviction')=="No") { // no a criminal backend
            $carersProfile->registration_progress = '5_2';
        }

        if (($request->input('step')=='5' && $request->input('criminal_conviction')=="Yes") // has the criminal backend
        ||($request->input('step')=='14' && $request->input('work_UK')=="No")) {            // restricted in UK
           $carersProfile->registration_progress = '5_1';
            //return redirect()->action('HomePageController@index');
        }

        if ($request->input('step')=='5_1' && $carersProfile->criminal_conviction=='Some') { // has some criminal backend
            $carersProfile->registration_progress = '5_2';
        }


        $carersProfile->update();

        return;
    }

    public function saveStep($request) {

        $step = $request->input('step');

        switch ($step) {
            case '1'    : $this->saveStep1($request);break;
            case '4'    : $this->saveStep4($request);break;
            case '5'    : $this->saveStep5($request);break;
            case '5_1'  : $this->saveStep5_1($request);break;
            case '6'    : $this->saveStep6($request);break;
            case '8'    : $this->saveStep8($request);break;
            case '9'    : $this->saveStep9($request);break;
            case '10'    : $this->saveStep10($request);break;
            case '11'    : $this->saveStep11($request);break;
            case '12'    : $this->saveStep12($request);break;
            case '13'    : $this->saveStep13($request);break;
            case '14'    : $this->saveStep14($request);break;
            case '15'    : $this->saveStep15($request);break;
            case '17'    : $this->saveStep17($request);break;
            case '18'    : $this->saveStep17($request);break; //step 17 and 18 have the one method
            case '20'    : $this->saveStep20($request);break;
        }

        $this->setNextStep($request);

        return;
    }

    private function saveStep1($request) {


        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'referral_code'=>'string|nullable|max:128',
        ]);

        (isset($request['referral_code']))? $referal_code = $request['referral_code'] : $referral_code = 0;

        $user = User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'referral_code' => $referral_code,
            'user_type_id' => 3,
        ]);


        if ($user) {

            $carerPrifile = new CarersProfile();

            $carerPrifile->id = $user->id;
            $carerPrifile->registration_progress = 1;
            $carerPrifile -> save();
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']],TRUE)) {
            Auth::login($user, true);

            Mail::send('errors.404', ['userName' => $user->email, 'password' => $request['password']],
                function ($m) use ($request) {$m->to($request['email'])->subject('Registration');});

        }

        return;
    }

    private function saveStep4($request) {

        $this->validate($request, [
            'title' =>
                array(
                    'required',
                    'numeric:1',
                ),
            'first_name' =>
                array(
                    'required',
                    'string',
                    'max:128'
                ),
            'family_name' =>
                array(
                    'required',
                    'string',
                    'max:128'
                ),
            'like_name' =>
                array(
                    'required',
                    'string',
                    'max:128'
                ),
            'gender' =>
                array(
                    'required',
                    'string',
                    'max:14'
                ),
            'mobile_number' =>
                array(
                    'required',
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
            'DoB' =>
                array(
                    'required',
                ),
            'postcode' =>
                array(
                    'required',
                    'regex:/^([Bb][Ll][0-9])|([Mm][0-9]{1,2})|([Oo][Ll][0-9]{1,2})|([Ss][Kk][0-9]{1,2})|([Ww][AaNn][0-9]{1,2})|([Ss][Kk][0-9]{1,2}) [0-9][A-Za-z]{1,2}$/'


                    //'regex:#^([BMOSWbmosw][LKANlkan0-9][0-9]{1,2})|([BMOSWbmosw][LKANlkan0-9]) [0-9][A-Za-z]{1,2}$#'

//                    'regex:#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([AZa-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))
//[0-9][A-Za-z]{2})$#',
                )
        ]);


        //dd($request->all());


/*        $this->validate($request,[
            'title' => 'required|numeric:1',
            'first_name' => 'required|string|max:128',
            'family_name' => 'required|string|max:128',
            'like_name' => 'required|string|max:128',
            'gender' => 'required|string|max:14',
            'mobile_number' => 'required',
            'address_line1'=>'required|string|max:256',
            'address_line2' => 'nullable|string|max:256',
            'town' => 'required|string|max:128',
            'postcode' => 'required|string|max:32',
            'DoB'=>'required',
            'postcode_second_part' => 'nullable|string|max:16',
        ]);*/


        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->title            = $request->input('title');
        $carerProfile->first_name       = $request->input('first_name');
        $carerProfile->family_name      = $request->input('family_name');
        $carerProfile->like_name        = $request->input('like_name');
        $carerProfile->gender           = $request->input('gender');
        $carerProfile->mobile_number    = $request->input('mobile_number');
        $carerProfile->address_line1    = $request->input('address_line1');
        $carerProfile->address_line2    = $request->input('address_line2');
        $carerProfile->address_line1    = $request->input('address_line1');
        $carerProfile->town             = $request->input('town');
        $carerProfile->postcode         = strtoupper($request->input('postcode'));
        //$carerProfile->postcode_second_part= $request->input('postcode_second_part');
        $carerProfile->DoB              = $request->input('DoB');
        $carerProfile->update();
        //dd($request->all());

        return;
    }

    private function saveStep5($request) {

        //dd($request->all());


        $this->validate($request,[
            'criminal_conviction' => 'required|in:"Yes","No","Some"',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_conviction  = $request->input('criminal_conviction');
        $carerProfile->update();

        return;
    }

    private function saveStep5_1($request) {

        $this->validate($request,[
            'criminal_detail' => 'required|string:512',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_detail  = $request->input('criminal_detail');

        $carerProfile->update();

        return;
    }

    private function saveStep6($request) {

        $this->validate($request,[
            'DBS' => 'required|in:"Yes","No"',
            'DBS_use' => 'required|in:"Yes","No"',
            'DBS_identifier' => 'required_if:DBS_use,"Yes"|string|nullable|max:128',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->DBS  = $request->input('DBS');
        $carerProfile->DBS_use  = $request->input('DBS_use');
        $carerProfile->DBS_identifier  = $request->input('DBS_identifier');

        $carerProfile->dbs_date  = $request->input('dbs_date');

        $carerProfile->update();

        return;
    }
    private function saveStep8($request) {

        $this->validate($request,[
            'driving_licence' => 'required|in:"Yes","No"',
            'DBS_number' => 'string|nullable|max:128',
            'have_car' => 'nullable|in:"Yes","No"',
            'use_car' => 'required_if:have_car,"Yes"|nullable|in:"Yes","No"',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->driving_licence  = $request->input('driving_licence');
        $carerProfile->have_car  = $request->input('have_car');
        $carerProfile->use_car  = $request->input('use_car');
        $carerProfile->DBS_number  = $request->input('DBS_number');

        $carerProfile->update();

        return;
    }

    private function saveStep9($request) {


        $this->validate($request,[
            'serviceType' => 'required|array',
        ]);

        $serviceTypes = $request->input('serviceType');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->ServicesTypes()->sync(array_keys($serviceTypes));


/*        foreach ($serviceTypes as $k=>$v) {
            $carerProfile->ServicesTypes()->attach($k);
        }*/

        return;
    }

    private function saveStep10($request) {

        $this->validate($request,[
            'assistanceType' => 'required|array',
        ]);

        $assistanceType = $request->input('assistanceType');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->AssistantsTypes()->sync(array_keys($assistanceType));

/*
        foreach ($assistanceType as $k=>$v) {
            $carerProfile->AssistantsTypes()->attach($k);
        }*/

        return;
    }
    private function saveStep11($request) {


        $this->validate($request,[
            'workingTime' => 'required|array',
            'work_at_holiday' => 'required|string:3',
            'times' => 'required|string:32',
            'work_hours' => 'nullable|numeric:2',
        ]);


        //$request->input('work_at_holiday')=='1' ? $work_at_holiday='Yes' : $work_at_holiday='No';
        $workingTimes = $request->input('workingTime');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_at_holiday  = $request->input('work_at_holiday');
        $carerProfile->times  = $request->input('times');

        if (null !== $request->input('work_hours')) $carerProfile->work_hours  = $request->input('work_hours');

        $carerProfile->update();

        $carerProfile->WorkingTimes()->sync(array_keys($workingTimes));

/*        foreach ($workingTimes as $k=>$v) {
            $carerProfile->WorkingTimes()->attach($k);
        }*/

        return;
    }

    private function saveStep12($request) {

        $this->validate($request,[
            'work_with_pets' => 'required|in:"Yes","No","It Depends"',
            'pets_description' => 'required_if:work_with_pets,"Sometimes","Yes"|string:512|nullable',
        ]);

/*        switch ($request->input('work_with_pets')){
            case 'Yes' : {$work_with_pets='Yes'; break; }
            case 'No' : {$work_with_pets='No'; break; }
            case 'It depends' : {$work_with_pets='It depends'; break; }
        }*/


        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_with_pets  = $request->input('work_with_pets');
        $carerProfile->pets_description  = $request->input('pets_description');

        $carerProfile->update();

        return;
    }

    private function saveStep13($request) {

        $this->validate($request,[
            'languages' => 'required|array',
            'language_additional' => 'nullable|string:128',
        ]);


        $languages = $request->input('languages');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->language_additional  = $request->input('language_additional');

        $carerProfile->update();

        $carerProfile->Languages()->sync(array_keys($languages));

/*        foreach ($languages as $k=>$v) {
            $carerProfile->Languages()->attach($k);
        }*/

        return;
    }

    private function saveStep14($request) {

        $this->validate($request,[
            'work_UK' => 'required|in:"Yes","No"',
            'work_UK_restriction' => 'required_if:work_UK,"Yes"|nullable|in:"Yes","No"',
            'work_UK_description' => 'required_if:work_UK_restriction,"Yes"|nullable|string:512',
            'national_insurance_number'=>'nullable|string:128',
        ]);

/*
        $request->input('work_UK')=='1' ? $work_UK='Yes' : $work_UK='No';
        $request->input('work_UK_restriction')=='1' ? $work_UK_restriction='Yes' : $work_UK_restriction='No';*/

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_UK  = $request->input('work_UK');
        $carerProfile->work_UK_restriction  = $request->input('work_UK_restriction');
        $carerProfile->work_UK_description  = $request->input('work_UK_description');
        $carerProfile->national_insurance_number  = $request->input('national_insurance_number');

        $carerProfile->update();

        return;
    }
    private function saveStep15($request) {

        $this->validate($request,[
            'description_yourself' => 'required|string:1024',
            'sentence_yourself' => 'required|string:250',
        ]);
        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->description_yourself  = $request->input('description_yourself');
        $carerProfile->sentence_yourself  = $request->input('sentence_yourself');

        $carerProfile->update();

        return;
    }

    private function saveStep17($request) {


        //dd($request->all());
        $this->validate($request,[
            'name' => 'required|string:128',
            'job_title' => 'required|string:128',
            'relationship' => 'required|string:128',
            'phone' => 'required|string:64',
            'email' => 'required|email',
        ]);

        if($request->input('id')=='0')
            $reference = new CarerReference();
        else
            $reference = CarerReference::findOrFail($request->input('id'));



        $reference->name = $request->input('name');
        $reference->job_title = $request->input('job_title');
        $reference->relationship = $request->input('relationship');
        $reference->phone = $request->input('phone');
        $reference->email = $request->input('email');

        $reference->save();

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        if($request->input('id')=='0')
            $carerProfile->CarerReferences()->attach($reference->id);



        //$carerProfile->CarerReferences()->attach($reference->id);
        //dd($carerProfile->CarerReferences,$reference, $reference->CarersProfiles);

        return;
    }

    private function saveStep20($request) {
        $this->validate($request,[
            'have_questions' => 'nullable|in:"Yes","No"',
            'questions' => 'nullable|string:1024',
        ]);


        $request->input('have_questions')=='1' ? $have_questions='Yes' : $have_questions='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->have_questions  = $request->input('have_questions');
        $carerProfile->questions  = $request->input('questions');

        $carerProfile->update();

        return;
    }

    public function getActiveStep($id){

        $activeStep=1;

        $step = $this->model->find($id)->registration_progress;

        //dd($step);

        if ($step>=1)
            $activeStep=2;
        if ($step>3)
            $activeStep=3;
        if ($step>17)
            $activeStep=4;
        if ($step>19)
            $activeStep=5;
        return $activeStep;
    }

}