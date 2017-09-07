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

        }

        $this->setNextStep($request);

        return;
    }


    private function saveStep5($request) {

        //dd($request->all());
/*

        $this->validate($request,[
            'criminal_conviction' => 'required|in:"Yes","No","Some"',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_conviction  = $request->input('criminal_conviction');
        $carerProfile->update();*/

        return;
    }

    private function saveStep5_1($request) {

/*        $this->validate($request,[
            'criminal_detail' => 'required|string:512',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->criminal_detail  = $request->input('criminal_detail');

        $carerProfile->update();*/

        return;
    }

    private function saveStep6($request) {

/*        $this->validate($request,[
            'DBS' => 'required|in:"Yes","No"',
            'DBS_use' => 'required|in:"Yes","No"',
            'DBS_identifier' => 'required_if:DBS_use,"Yes"|string|nullable|max:128',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->DBS  = $request->input('DBS');
        $carerProfile->DBS_use  = $request->input('DBS_use');
        $carerProfile->DBS_identifier  = $request->input('DBS_identifier');

        $carerProfile->dbs_date  = $request->input('dbs_date');

        $carerProfile->update();*/

        return;
    }
    private function saveStep7($request) {

/*        $this->validate($request,[
            'driving_licence' => 'required|in:"Yes","No"',
            'DBS_number' => 'string|nullable|max:128',
            'have_car' => 'nullable|in:"Yes","No"',
            'use_car' => 'required_if:have_car,"Yes"|in:"Yes","No"',
        ]);

        $carerProfile = $this->model->findOrFail($request->input('carersProfileID'));

        $carerProfile->driving_licence  = $request->input('driving_licence');
        $carerProfile->have_car  = $request->input('have_car');
        $carerProfile->use_car  = $request->input('use_car');
        $carerProfile->DBS_number  = $request->input('DBS_number');

        $carerProfile->update();*/

        return;
    }

    private function saveStep9($request) {


/*        $this->validate($request,[
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
            'work_with_pets' => 'required|in:"Yes","No","It depends"',
            'pets_description' => 'required_if:work_with_pets,"It depends"|string:512|nullable',
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
            'work_UK_restriction' => 'required_if:work_UK,"Yes"|in:"Yes","No"',
            'work_UK_description' => 'nullable|string:512',
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
            'sentence_yourself' => 'required|string:512',
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
        if ($step>5)
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

        if ($step == 3)
            $activeSubStep=1;
        if ($step == 4)
            $activeSubStep=2;
        if ($step == '4_2'||$step == '4_1')
            $activeSubStep=3;
        if ($step == '4_1_2_1')
            $activeSubStep=4;




        return $activeSubStep;
    }

}