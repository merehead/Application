<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Repo;


use App\CarersProfile;

class CarerRegistration
{
    protected $model = FALSE;

    public function __construct(CarersProfile $carersProfile) {
        $this->model = $carersProfile;
    }

    public function getID()
    {
        return $this->model->find(1)->id;;
    }

    public function getNextStep()
    {

        $currentStep = $this->model->find(1)->registration_progress;

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

        $carersProfile = $this->model->find($array['carersProfileID']);

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

            case '4' : $this->saveStep4($request);break;

        }
        $this->setNextStep($request);
        return;
    }

    private function saveStep4($request) {

        $carerProfile = $this->model->find($request->input('carersProfileID'));

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
}