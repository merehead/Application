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
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class CarerRegistration
{
    use  ValidatesRequests;

    protected $model = FALSE;

    public function __construct(CarersProfile $carersProfile) {
        $this->model = $carersProfile;
    }

    public function getID()
    {

        //здесь ошибка, т.к. предполагается, что ид-юзера == ид-профиля, что точно не правильно!!!

        $user = Auth::user();

        return $user->id;
    }

    public function getNextStep()
    {


        $user = Auth::user();

        $currentStep = $this->model->find($user->id)->registration_progress; //смотри предыдущую ошибку!!!!

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

        $carersProfile->registration_progress = $nextStep;

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
            'referal_code'=>'string|nullable|max:128',
        ]);

        (isset($request['referal_code']))? $referal_code = $request['referal_code'] : $referal_code = 0;

        $user = User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'referal_code' => $referal_code,
            'user_type_id' => 3,
        ]);


        if ($user) {

            $carerPrifile = new CarersProfile();

            $carerPrifile->id = $user->id;
            $carerPrifile->registration_progress = 1;
            $carerPrifile -> save();
        }

        if (Auth::attempt(['email' => $user->email, 'password' => $request['password']],TRUE)) {
            Auth::login($user, true);
        }

        return;
    }



    private function saveStep4($request) {

        //dd($request->all());


        $this->validate($request,[
            'title' => 'required|numeric:1',
            'first_name' => 'required|string|max:128',
            'family_name' => 'required|string|max:128',
            'like_name' => 'required|string|max:128',
            'gender' => 'required|string|max:14',
            'mobile_number' => 'required',
            'address_line1'=>'required|string|max:256',
            'address_line2' => 'nullable|string|max:256',
            'town' => 'required|string|max:128',
            'postcode_id' => 'required|integer',
            'DoB'=>'required|date',
        ]);


        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->first_name       = $request->input('first_name');
        $carerProfile->family_name      = $request->input('family_name');
        $carerProfile->like_name        = $request->input('like_name');
        $carerProfile->gender           = $request->input('gender');
        $carerProfile->mobile_number    = $request->input('mobile_number');
        $carerProfile->address_line1    = $request->input('address_line1');
        $carerProfile->address_line2    = $request->input('address_line2');
        $carerProfile->address_line1    = $request->input('address_line1');
        $carerProfile->town             = $request->input('town');
        $carerProfile->postcode_id      = $request->input('postcode_id');
        $carerProfile->DoB              = $request->input('DoB');
        $carerProfile->update();
        //dd($request->all());

        return;
    }

    private function saveStep5($request) {

        $value = 'Yes';
        if($request->input('criminal_conviction')=='3')
            $value = 'No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_conviction  = $value;
        $carerProfile->update();

        return;
    }

    private function saveStep5_1($request) {


        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_detail  = $request->input('criminal_detail');

        $carerProfile->update();

        return;
    }

    private function saveStep6($request) {

        //dd($request->all());

        $request->input('DBS')=='1' ? $DBS='Yes' : $DBS='No';

        $request->input('DBS_use')=='1' ? $DBS_use='Yes' : $DBS_use='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->DBS  = $DBS;
        $carerProfile->DBS_use  = $DBS_use;
        $carerProfile->DBS_identifier  = $request->input('DBS_identifier');
        $carerProfile->update();

        return;
    }
    private function saveStep8($request) {

        //dd($request->all());

        $request->input('driving_licence')=='1' ? $driving_licence='Yes' : $driving_licence='No';
        $request->input('have_car')=='1' ? $have_car='Yes' : $have_car='No';
        $request->input('use_car')=='1' ? $use_car='Yes' : $use_car='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->driving_licence  = $driving_licence;
        $carerProfile->have_car  = $have_car;
        $carerProfile->use_car  = $use_car;
        $carerProfile->DBS_number  = $request->input('DBS_number');

        $carerProfile->update();

        return;
    }

    private function saveStep9($request) {

        $serviceTypes = $request->input('serviceType');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        foreach ($serviceTypes as $k=>$v) {
            $carerProfile->ServicesTypes()->attach($k);
        }

        return;
    }

    private function saveStep10($request) {

        $assistanceType = $request->input('assistanceType');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        foreach ($assistanceType as $k=>$v) {
            $carerProfile->AssistantsTypes()->attach($k);
        }

        return;
    }
    private function saveStep11($request) {


        $request->input('work_at_holiday')=='1' ? $work_at_holiday='Yes' : $work_at_holiday='No';
        $workingTimes = $request->input('workingTime');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_at_holiday  = $work_at_holiday;
        $carerProfile->work_hours  = $request->input('work_hours');

        $carerProfile->update();

        foreach ($workingTimes as $k=>$v) {
            $carerProfile->WorkingTimes()->attach($k);
        }

        return;
    }

    private function saveStep12($request) {

        //dd($request->all());

        $request->input('work_with_pets')=='1' ? $work_with_pets='Yes' : $work_with_pets='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_with_pets  = $work_with_pets;
        $carerProfile->pets_description  = $request->input('pets_description');

        $carerProfile->update();

        return;
    }

    private function saveStep13($request) {

        //dd($request->all());


        $languages = $request->input('languages');

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->language_additional  = $request->input('language_additional');

        $carerProfile->update();

        foreach ($languages as $k=>$v) {
            $carerProfile->Languages()->attach($k);
        }

        return;
    }

    private function saveStep14($request) {

        //dd($request->all());

        $request->input('work_UK')=='1' ? $work_UK='Yes' : $work_UK='No';
        $request->input('work_UK_restriction')=='1' ? $work_UK_restriction='Yes' : $work_UK_restriction='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_UK  = $work_UK;
        $carerProfile->work_UK_restriction  = $work_UK_restriction;
        $carerProfile->pets_description  = $request->input('work_UK_description');

        $carerProfile->update();

        return;
    }
    private function saveStep15($request) {

        //dd($request->all());

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->work_UK_description  = $request->input('work_UK_description');
        $carerProfile->description_yourself  = $request->input('description_yourself');

        $carerProfile->update();

        return;
    }

    private function saveStep17($request) {

        //dd($request->all());

        $reference = new CarerReference();

        $reference->name = $request->input('name');
        $reference->job_title = $request->input('job_title');
        $reference->relationship = $request->input('relationship');
        $reference->phone = $request->input('phone');
        $reference->email = $request->input('email');

        $reference->save();

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));
        $carerProfile->CarerReferences()->attach($reference->id);

        return;
    }
    private function saveStep20($request) {

        //dd($request->all());

        $request->input('have_questions')=='1' ? $have_questions='Yes' : $have_questions='No';

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->have_questions  = $request->input('have_questions');
        $carerProfile->questions  = $request->input('questions');

        $carerProfile->update();

        return;
    }
}