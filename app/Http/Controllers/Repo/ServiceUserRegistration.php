<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Repo;


use App\CarerReference;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ServiceUserRegistration
{
    use   ValidatesRequests;

    protected $model = FALSE;
    protected $user;

    public function __construct(ServiceUsersProfile $serviceUsersProfile) {
        $this->model = $serviceUsersProfile;

    }

    public function getNextStep($serviceUserProfileId)
    {

        //$user = Auth::user();

        $currentStep = $this->model->FindOrFail($serviceUserProfileId)->registration_progress;


        $step = 'Step4_1_2_3_Thank__you_Sign_up1';

        switch ($currentStep) {

            case '4_1_2_1' : $step = 'Step4_1_2_3_Thank__you_Sign_up1';break;
            case '4_1_2_3' : $step = 'Step4_1_2_4_Thank__you_Sign_up1_1';break;
            case '4_1_2_4' : $step = 'Step5_serviceUserRegistration';break;
            case '5' : $step = 'Step5_1_serviceUserRegistration';break;

            case '5_1' : $step = 'Step6_serviceUserRegistration';break;
            case '6' : $step = 'Step7_serviceUserRegistration';break;
            case '7' : $step = 'Step8_serviceUserRegistration';break;
            case '8' : $step = 'Step9_serviceUserRegistration';break;
            case '9' : $step = 'Step9_1_serviceUserRegistration';break;
            case '9_1' : $step = 'Step10_serviceUserRegistration';break;

            case '10' : $step = 'Step11_serviceUserRegistration';break;
            case '11' : $step = 'Step12_serviceUserRegistration';break;
            case '12' : $step = 'Step13_serviceUserRegistration';break;
            case '13' : $step = 'Step14_serviceUserRegistration';break;
            case '14' : $step = 'Step15_serviceUserRegistration';break;
            case '15' : $step = 'Step16_serviceUserRegistration';break;
            case '16' : $step = 'Step17_serviceUserRegistration';break;


            case '17' : $step = 'Step17_serviceUserRegistration';break;

/*
            case '18' : $step = 'Step19_carerRegistration';break;
            case '19' : $step = 'Step20_carerRegistration';break;
            case '20' : $step = 'Step21_carerRegistration';break;
            //case '21' : $step = 'Step2_carerRegistration';break;*/
        }

        return $step;
    }

    public function setNextStep($request)
    {

        $array=$request->all();

        $serviceUserProfile = $this->model->findOrFail($array['serviceUserProfileID']);

        $nextStep = 0;

        switch ($array['step']) {

            case '4_1_2_1' : $nextStep = '4_1_2_1';break;
            case '4_1_2_3' : $nextStep = '4_1_2_3';break;
            case '4_1_2_4' : $nextStep = '4_1_2_4';break;
            case '5' : $nextStep = '5';break;
            case '5_1' : $nextStep = '5_1';break;
            case '6' : $nextStep = '6';break;
            case '7' : $nextStep = '7';break;
            case '8' : $nextStep = '8';break;
            case '9' : $nextStep = '9';break;
            case '9_1' : $nextStep = '9_1';break;
            case '10' : $nextStep = '10';break;
            case '11' : $nextStep = '11';break;
            case '12' : $nextStep = '12';break;
            case '13' : $nextStep = '13';break;
            case '14' : $nextStep = '14';break;
            case '15' : $nextStep = '15';break;
            case '16' : $nextStep = '16';break;
            case '17' : $nextStep = '17';break;


            case '18' : $nextStep = '18';break;
            case '19' : $nextStep = '19';break;
            case '20' : $nextStep = '20';break;
            case '21' : $nextStep = '21';break;
        }

        //dd($request->all());


        $serviceUserProfile->registration_progress = $nextStep;

/*        if ($request->input('step')==5 && $request->input('criminal_conviction')=="No") { // no a criminal backend
            $purchaserProfile->registration_progress = '5_2';
        }

        if (($request->input('step')=='5' && $request->input('criminal_conviction')=="Yes") // has the criminal backend
        ||($request->input('step')=='14' && $request->input('work_UK')=="No")) {            // restricted in UK
            $purchaserProfile->registration_progress = '5_1';
            //return redirect()->action('HomePageController@index');
        }

        if ($request->input('step')=='5_1' && $purchaserProfile->criminal_conviction=='Some') { // has some criminal backend
            $purchaserProfile->registration_progress = '5_2';
        }*/


        $serviceUserProfile->update();

        return;
    }

    public function saveStep($request) {


        //dd($request->all());


        $step = $request->input('step');

        switch ($step) {

            case '5'    : $this->saveStep5($request);break;
            case '5_1'    : $this->saveStep5_1($request);break;
            case '6'    : $this->saveStep6($request);break;
            case '7'    : $this->saveStep7($request);break;
            case '9'    : $this->saveStep9($request);break;
            case '9_1'    : $this->saveStep9_1($request);break;
            case '10'    : $this->saveStep10($request);break;
            case '11'    : $this->saveStep11($request);break;
            case '12'    : $this->saveStep12($request);break;
            case '13'    : $this->saveStep13($request);break;
            case '14'    : $this->saveStep14($request);break;
            case '15'    : $this->saveStep15($request);break;
        }

        $this->setNextStep($request);

        return;
    }


    private function saveStep5($request) {

        $this->validate($request,[
            'serviceType' => 'required|array',
            ]);

        $serviceTypes = $request->input('serviceType');

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->ServicesTypes()->sync(array_keys($serviceTypes));

        return;
    }

    private function saveStep5_1($request) {

        $this->validate($request,[
            'assistanceType' => 'required|array',
        ]);

        $assistanceType = $request->input('assistanceType');

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->AssistantsTypes()->sync(array_keys($assistanceType));


        return;
    }

    private function saveStep6($request) {

        $this->validate($request,[
            'workingTime' => 'required|array',
        ]);

        $workingTimes = $request->input('workingTime');

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->WorkingTimes()->sync(array_keys($workingTimes));

        return;
    }
    private function saveStep7($request) {

        $this->validate($request,[
            'start_date' => 'required',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->start_date  = $request->input('start_date');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep9($request) {


        //dd($request->all());

        $this->validate($request,[
            'kind_of_building' => 'required|string:16',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->kind_of_building  = $request->input('kind_of_building');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep9_1($request) {

        $this->validate($request,[
            'lift_available' => 'required|in:"Yes","No"',
            'floor_id' => 'required|integer',
        ]);
        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->lift_available  = $request->input('lift_available');
        $serviceUserProfile->floor_id  = $request->input('floor_id');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep10($request) {

        $this->validate($request,[
            'move_available' => 'required|in:"Yes","No","Sometimes"',
            'assistance_moving' => 'required|in:"Yes","No","Sometimes"',
        ]);
        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->move_available  = $request->input('move_available');
        $serviceUserProfile->assistance_moving  = $request->input('assistance_moving');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep11($request) {

        $this->validate($request,[
            'home_safe' => 'required|in:"Yes","No","Sometimes"',
            'assistance_keeping' => 'nullable|in:"Yes","No","Sometimes"',
        ]);
        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->home_safe  = $request->input('home_safe');
        $serviceUserProfile->assistance_keeping  = $request->input('assistance_keeping');

        $serviceUserProfile->update();


        return;
    }

    private function saveStep12($request) {

        $this->validate($request,[
            'own_pets' => 'required|in:"Yes","No","Sometimes"',
            'pet_detail' => 'required|String:128',
            'pet_friendly' => 'required|in:"Yes","No","Sometimes","Normally"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->own_pets  = $request->input('own_pets');
        $serviceUserProfile->pet_detail  = $request->input('pet_detail');
        $serviceUserProfile->pet_friendly  = $request->input('pet_friendly');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep13($request) {

        $this->validate($request,[
            'anyone_else_live' => 'required|in:"Yes","No","Sometimes"',
            'anyone_detail' => 'required|String:128',
            'anyone_friendly' => 'required|in:"Yes","No","Sometimes","Normally"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->anyone_else_live  = $request->input('anyone_else_live');
        $serviceUserProfile->anyone_detail  = $request->input('anyone_detail');
        $serviceUserProfile->anyone_friendly  = $request->input('anyone_friendly');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep14($request) {

        $this->validate($request,[
            'carer_enter' => 'nullable|String:512',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->carer_enter  = $request->input('carer_enter');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep15($request) {

        $this->validate($request,[
            'entering_aware' => 'required|in:"Yes","No","Sometimes"',
            'other_detail' => 'nullable|String:512',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->entering_aware  = $request->input('entering_aware');
        $serviceUserProfile->other_detail  = $request->input('other_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep20($request) {
        $this->validate($request,[
            'have_questions' => 'required|in:"Yes","No"',
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

        if ($step>=1)
            $activeStep=2;
        if ($step>=5||$step == '4_1_2_4')
            $activeStep=3;
        if ($step>17)
            $activeStep=4;
        if ($step>19)
            $activeStep=5;
        return $activeStep;
    }


    public function getActiveSubStep($id){

        $activeSubStep=0;

        $step = $this->model->find($id)->registration_progress;

        //dd($this->model->find($id)->registration_progress);

        if ($step == 3)
            $activeSubStep=1;
        if ($step == 4)
            $activeSubStep=2;
        if ($step == '4_2'||$step == '4_1')
            $activeSubStep=3;
        if ($step == '4_1_2_1'||'5')
            $activeSubStep=4;




        return $activeSubStep;
    }

}