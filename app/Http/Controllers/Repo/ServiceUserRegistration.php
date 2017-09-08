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


            case '17' : $step = 'Step18_serviceUserRegistration';break;
            case '18' : $step = 'Step19_serviceUserRegistration';break;
            case '19' : $step = 'Step20_serviceUserRegistration';break;
            case '20' : $step = 'Step21_serviceUserRegistration';break;
            case '21' : $step = 'Step22_serviceUserRegistration';break;
            case '22' : $step = 'Step23_serviceUserRegistration';break;
            case '23' : $step = 'Step24_serviceUserRegistration';break;
            case '24' : $step = 'Step25_serviceUserRegistration';break;
            case '25' : $step = 'Step26_serviceUserRegistration';break;
            case '26' : $step = 'Step27_serviceUserRegistration';break;
            case '27' : $step = 'Step28_serviceUserRegistration';break;
            case '28' : $step = 'Step29_serviceUserRegistration';break;
            case '29' : $step = 'Step30_serviceUserRegistration';break;
            case '30' : $step = 'Step31_serviceUserRegistration';break;
            case '31' : $step = 'Step32_serviceUserRegistration';break;
            case '32' : $step = 'Step33_serviceUserRegistration';break;
            case '33' : $step = 'Step34_serviceUserRegistration';break;
            case '34' : $step = 'Step35_serviceUserRegistration';break;
            case '35' : $step = 'Step36_serviceUserRegistration';break;
            case '36' : $step = 'Step37_serviceUserRegistration';break;
            case '37' : $step = 'Step38_serviceUserRegistration';break;
            case '38' : $step = 'Step39_serviceUserRegistration';break;
            case '39' : $step = 'Step40_serviceUserRegistration';break;
            case '40' : $step = 'Step40_1_serviceUserRegistration';break;
            case '40_1' : $step = 'Step41_serviceUserRegistration';break;
            case '41' : $step = 'Step42_serviceUserRegistration';break;
            case '42' : $step = 'Step43_serviceUserRegistration';break;
            case '43' : $step = 'Step44_serviceUserRegistration';break;
            case '44' : $step = 'Step45_serviceUserRegistration';break;
            case '45' : $step = 'Step46_serviceUserRegistration';break;
            case '46' : $step = 'Step47_serviceUserRegistration';break;
            case '47' : $step = 'Step48_serviceUserRegistration';break;
            case '48' : $step = 'Step49_serviceUserRegistration';break;
            case '49' : $step = 'Step50_serviceUserRegistration';break;
            case '50' : $step = 'Step51_serviceUserRegistration';break;
            case '51' : $step = 'Step52_serviceUserRegistration';break;
            case '52' : $step = 'Step53_serviceUserRegistration';break;
            case '53' : $step = 'Step54_serviceUserRegistration';break;
            case '54' : $step = 'Step55_serviceUserRegistration';break;
            case '55' : $step = 'Step56_serviceUserRegistration';break;
            case '56' : $step = 'Step57_serviceUserRegistration';break;
            case '57' : $step = 'Step58_serviceUserRegistration';break;
            case '58' : $step = 'Step59_serviceUserRegistration';break;
            case '59' : $step = 'Step60_serviceUserRegistration';break;
            case '60' : $step = 'Step61_serviceUserRegistration';break;
            case '61' : $step = 'Step62_serviceUserRegistration';break;

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
            case '22' : $nextStep = '22';break;
            case '23' : $nextStep = '23';break;
            case '24' : $nextStep = '24';break;
            case '25' : $nextStep = '25';break;
            case '26' : $nextStep = '26';break;
            case '27' : $nextStep = '27';break;
            case '28' : $nextStep = '28';break;
            case '29' : $nextStep = '29';break;
            case '30' : $nextStep = '30';break;
            case '31' : $nextStep = '31';break;
            case '32' : $nextStep = '32';break;
            case '33' : $nextStep = '33';break;
            case '34' : $nextStep = '34';break;
            case '35' : $nextStep = '35';break;
            case '36' : $nextStep = '36';break;
            case '37' : $nextStep = '37';break;
            case '38' : $nextStep = '38';break;
            case '39' : $nextStep = '39';break;
            case '40' : $nextStep = '40';break;
            case '40_1' : $nextStep = '40_1';break;
            case '41' : $nextStep = '41';break;
            case '42' : $nextStep = '42';break;
            case '43' : $nextStep = '43';break;
            case '44' : $nextStep = '44';break;
            case '45' : $nextStep = '45';break;
            case '46' : $nextStep = '46';break;
            case '47' : $nextStep = '47';break;
            case '48' : $nextStep = '48';break;
            case '49' : $nextStep = '49';break;
            case '50' : $nextStep = '50';break;
            case '51' : $nextStep = '51';break;
            case '52' : $nextStep = '52';break;
            case '53' : $nextStep = '53';break;
            case '54' : $nextStep = '54';break;
            case '55' : $nextStep = '55';break;
            case '56' : $nextStep = '56';break;
            case '57' : $nextStep = '57';break;
            case '58' : $nextStep = '58';break;
            case '59' : $nextStep = '59';break;
            case '60' : $nextStep = '60';break;
            case '61' : $nextStep = '61';break;
            case '62' : $nextStep = '62';break;

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
            case '17'    : $this->saveStep17($request);break;
            case '18'    : $this->saveStep18($request);break;
            case '19'    : $this->saveStep19($request);break;
            case '20'    : $this->saveStep20($request);break;
            case '21'    : $this->saveStep21($request);break;
            case '22'    : $this->saveStep22($request);break;
            case '23'    : $this->saveStep23($request);break;
            case '24'    : $this->saveStep24($request);break;
            case '25'    : $this->saveStep25($request);break;
            case '26'    : $this->saveStep26($request);break;
            case '27'    : $this->saveStep27($request);break;

            case '28'    : $this->saveStep28($request);break;
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

    private function saveStep17($request) {

        $this->validate($request,[
            'conditions_detail' => 'nullable|string:256',
            'workingTime' => 'nullable|array',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->ServiceUserConditions()->sync(array_keys($request->input('workingTime')));

        $serviceUserProfile->conditions_detail  = $request->input('conditions_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep18($request) {

        $this->validate($request,[
            'have_dementia' => 'required|in:"Yes","No","Sometimes"',
            'dementia_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->have_dementia  = $request->input('have_dementia');
        $serviceUserProfile->dementia_detail  = $request->input('dementia_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep19($request) {

        $this->validate($request,[
            'help_with_mobility' => 'required|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->help_with_mobility  = $request->input('help_with_mobility');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep20($request) {

        $this->validate($request,[
            'history_of_falls' => 'required|in:"Yes","No","Sometimes"',
            'falls_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->history_of_falls  = $request->input('history_of_falls');
        $serviceUserProfile->falls_detail  = $request->input('falls_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep21($request) {

        $this->validate($request,[
            'mobility_bed' => 'required|in:"Yes","No","Sometimes"',
            'mobility_bed_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->mobility_bed  = $request->input('mobility_bed');
        $serviceUserProfile->mobility_bed_detail  = $request->input('mobility_bed_detail');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep22($request) {

        $this->validate($request,[
            'mobility_home' => 'required|in:"Yes","No","Sometimes"',
            'mobility_home_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->mobility_home  = $request->input('mobility_home');
        $serviceUserProfile->mobility_home_detail  = $request->input('mobility_home_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep23($request) {

        $this->validate($request,[
            'mobility_shopping' => 'required|in:"Yes","No","Sometimes"',
            'mobility_shopping_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->mobility_shopping  = $request->input('mobility_shopping');
        $serviceUserProfile->mobility_shopping_detail  = $request->input('mobility_shopping_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep24($request) {

        $this->validate($request,[
            'communication' => 'required|in:"Yes","No","Sometimes"',

        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->communication  = $request->input('communication');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep25($request) {

        $this->validate($request,[
            'vision' => 'required|in:"Yes","No","Sometimes"',
            'vision_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->vision  = $request->input('vision');
        $serviceUserProfile->vision_detail  = $request->input('vision_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep26($request) {

        $this->validate($request,[
            'hearing' => 'required|in:"Yes","No","Sometimes"',
            'hearing_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->hearing  = $request->input('hearing');
        $serviceUserProfile->hearing_detail  = $request->input('hearing_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep27($request) {

        $this->validate($request,[
            'speech' => 'required|in:"Yes","No","Sometimes"',
            'speech_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->speech  = $request->input('speech');
        $serviceUserProfile->speech_detail  = $request->input('speech_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep28($request) {

        $this->validate($request,[
            'comprehension' => 'required|in:"Yes","No","Sometimes"',
            'comprehension_detail' => 'required|String:256',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->comprehension  = $request->input('comprehension');
        $serviceUserProfile->comprehension_detail  = $request->input('comprehension_detail');

        $serviceUserProfile->update();

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