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

            case '4_2' : $step = 'Step4_1_purchaserRegistration';break;
            case '4_1' : $step = 'Step4_1_2_purchaserRegistration';break;


            //case '4_1_2_1' : $step = 'Step4_1_2_1_Thank__you_Sign_up';break;




            case '4_1_2_1' : $step = 'Step4_1_2_3_Thank__you_Sign_up1';break;
            case '4_1_2_3' : $step = 'Step4_1_2_4_Thank__you_Sign_up1_1';break;
            case '4_1_2_4' : $step = 'Step5_serviceUserRegistration';break;
            case '5' : $step = 'Step5_1_serviceUserRegistration';break;

            case '5_1' : $step = 'Step6_serviceUserRegistration';break;
            case '6' : $step = 'Step7_serviceUserRegistration';break;
            case '7' : $step = 'Step8_serviceUserRegistration';break;
            case '8' : $step = 'Step9_serviceUserRegistration';break;
            //case '9' : $step = 'Step9_1_serviceUserRegistration';break;


            case '9'    :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->kind_of_building == 'FLAT')
                    $step = 'Step9_1_serviceUserRegistration';
                else {
                    $this->model->where('id',$serviceUserProfileId)->update(['lift_available' => null,'floor_id' => null]);
                    $step = 'Step10_serviceUserRegistration';
                }
                break;

            }


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
            //case '19' : $step = 'Step20_serviceUserRegistration';break;
            case '19' :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->help_with_mobility == 'Yes'||
                    $this->model->FindOrFail($serviceUserProfileId)->help_with_mobility == 'Sometimes')
                    $step = 'Step20_serviceUserRegistration';
                else {
                    $this->model->where('id',$serviceUserProfileId)->update(['history_of_falls' => null,'falls_detail' => null,'mobility_bed' => null,'mobility_bed_detail' => null,'mobility_home' => null,'mobility_home_detail' => null,'mobility_shopping' => null,'mobility_shopping_detail' => null]);
                    $step = 'Step24_serviceUserRegistration';
                }
                break;
            }

            case '20' : $step = 'Step21_serviceUserRegistration';break;
            case '21' : $step = 'Step22_serviceUserRegistration';break;
            case '22' : $step = 'Step23_serviceUserRegistration';break;
            case '23' : $step = 'Step24_serviceUserRegistration';break;
            //case '24' : $step = 'Step25_serviceUserRegistration';break;
            case '24' :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->communication == 'Yes'||
                    $this->model->FindOrFail($serviceUserProfileId)->communication == 'Sometimes')
                    $step = 'Step25_serviceUserRegistration';
                else {
                    $this->model->where('id', $serviceUserProfileId)->update(['vision' => null, 'vision_detail' => null, 'hearing' => null, 'hearing_detail' => null, 'speech' => null, 'speech_detail' => null, 'comprehension' => null, 'comprehension_detail' => null]);
                    $step = 'Step29_serviceUserRegistration';
                }
                break;
            }

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
            //case '43' : $step = 'Step44_serviceUserRegistration';break;
            case '43' : {
                if ($this->model->FindOrFail($serviceUserProfileId)->assistance_with_personal_hygiene == 'Yes' ||
                    $this->model->FindOrFail($serviceUserProfileId)->assistance_with_personal_hygiene == 'Sometimes')
                    $step = 'Step44_serviceUserRegistration';
                else {
                    $this->model->where('id', $serviceUserProfileId)->update(['appropriate_clothes' => null, 'assistance_getting_dressed' => null,
                        'assistance_getting_dressed_detail' => null, 'assistance_with_bathing' => null, 'bathing_times_per_week' => null,
                        'managing_toilet_needs' => null, 'mobilising_to_toilet' => null, 'cleaning_themselves' => null,
                        'have_incontinence' => null, 'kind_of_incontinence' => null, 'incontinence_wear' => null,
                        'incontinence_products_stored' => null, 'choosing_incontinence_products' => null]);
                    $step = 'Step49_serviceUserRegistration';
                }
                break;
            }
/*            case '44' :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->appropriate_clothes == 'Yes'||
                    $this->model->FindOrFail($serviceUserProfileId)->appropriate_clothes == 'Sometimes')
                    $step = 'Step45_serviceUserRegistration';
                else {
                    $this->model->where('id', $serviceUserProfileId)->update(['appropriate_clothes' => null, 'assistance_getting_dressed' => null, 'assistance_getting_dressed_detail' => null, 'assistance_with_bathing' => null, 'bathing_times_per_week' => null, 'managing_toilet_needs' => null, 'mobilising_to_toilet' => null, 'cleaning_themselves' => null]);
                    $step = 'Step49_serviceUserRegistration';
                }
                break;
            }*/
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

    public function getBackStep($serviceUserProfileId,$stepback){

        //$currentStep = $this->model->FindOrFail($serviceUserProfileId)->registration_progress;

//dd($stepback);
        switch ($stepback) {

            case '9'    :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->kind_of_building != 'FLAT')
                    $stepback = '8';
                break;
            }

            case '22'    :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->help_with_mobility == 'No')
                    $stepback = '18';
                break;
            }
            case '27'    :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->communication == 'No')
                    $stepback = '23';
                break;
            }
            case '47'    :
            {
                if($this->model->FindOrFail($serviceUserProfileId)->assistance_with_personal_hygiene == 'No')
                    $stepback = '42';
                break;
            }
        }
        //dd($serviceUserProfileId,$stepback);
        return $stepback;
    }

    public function setNextStep($request)
    {

        $array=$request->all();

        $serviceUserProfile = $this->model->findOrFail($array['serviceUserProfileID']);

        $nextStep = 0;

        switch ($array['step']) {

            case '4_2' : $nextStep = '4_2';break;
            case '4_1' : $nextStep = '4_1';break;
            case '4_1_2' : $nextStep = '4_1_2_1';break;

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





        $step = $request->input('step');

        switch ($step) {
            case '4_1'    : $this->saveStep4_1($request);break;

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
            case '29'    : $this->saveStep29($request);break;
            case '30'    : $this->saveStep30($request);break;
            case '32'    : $this->saveStep32($request);break;
            case '33'    : $this->saveStep33($request);break;
            case '34'    : $this->saveStep34($request);break;

            case '35'    : $this->saveStep35($request);break;
            case '36'    : $this->saveStep36($request);break;
            case '37'    : $this->saveStep37($request);break;
            case '38'    : $this->saveStep38($request);break;
            case '39'    : $this->saveStep39($request);break;
            case '40'    : $this->saveStep40($request);break;
            case '40_1'    : $this->saveStep40_1($request);break;
            case '41'    : $this->saveStep41($request);break;
            case '43'    : $this->saveStep43($request);break;
            case '44'    : $this->saveStep44($request);break;
            case '45'    : $this->saveStep45($request);break;
            case '46'    : $this->saveStep46($request);break;
            case '47'    : $this->saveStep47($request);break;
            case '48'    : $this->saveStep48($request);break;
            case '50'    : $this->saveStep50($request);break;
            case '51'    : $this->saveStep51($request);break;
            case '52'    : $this->saveStep52($request);break;
            case '53'    : $this->saveStep53($request);break;
            case '54'    : $this->saveStep54($request);break;
            case '56'    : $this->saveStep56($request);break;
            case '57'    : $this->saveStep57($request);break;
            case '58'    : $this->saveStep58($request);break;
            case '59'    : $this->saveStep59($request);break;
            case '60'    : $this->saveStep60($request);break;
            case '61'    : $this->saveStep61($request);break;
        }

        $this->setNextStep($request);

        return;
    }

    private function saveStep4_1($request) {

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
//                    'regex:#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([AZa-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))
//[0-9][A-Za-z]{2})$#',
                )
        ]);



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
                ]);*/

        //dd($request->all());

        $serviceUsersProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        //$serviceUsersProfile = $purchaserProfile->serviceUsers->first();


        //dd($purchaserProfile);

        if ($serviceUsersProfile) {
            $serviceUsersProfile->title = $request->input('title');
            $serviceUsersProfile->first_name = $request->input('first_name');
            $serviceUsersProfile->family_name = $request->input('family_name');
            $serviceUsersProfile->like_name = $request->input('like_name');
            $serviceUsersProfile->gender = $request->input('gender');
            $serviceUsersProfile->mobile_number = $request->input('mobile_number');
            $serviceUsersProfile->address_line1 = $request->input('address_line1');
            $serviceUsersProfile->address_line2 = $request->input('address_line2');
            $serviceUsersProfile->address_line1 = $request->input('address_line1');
            $serviceUsersProfile->town = $request->input('town');
            $serviceUsersProfile->postcode = strtoupper($request->input('postcode'));
            $serviceUsersProfile->DoB = $request->input('DoB');
            $serviceUsersProfile->update();
            //dd($request->all());
        }
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
            'assistance_moving' => 'nullable|in:"Yes","No","Sometimes"',
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
            'pet_detail' => 'required_if:own_pets,"Yes","Sometimes"|string|max:250|nullable',
            'pet_friendly' => 'required_if:own_pets,"Yes","Sometimes"|in:"Yes","No","Sometimes","Normally"|nullable',
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
            'anyone_detail' => 'required_if:anyone_else_live,"Yes","Sometimes"|nullable|string|max:250',
            'anyone_friendly' => 'required_if:anyone_else_live,"Yes","Sometimes"|nullable|in:"Yes","No","Sometimes","Normally"',
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
            'carer_enter' => 'nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->carer_enter  = $request->input('carer_enter');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep15($request) {

        $this->validate($request,[
            'entering_aware' => 'required|in:"Yes","No","Sometimes"',
            'other_detail' => 'required_if:entering_aware,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->entering_aware  = $request->input('entering_aware');
        $serviceUserProfile->other_detail  = $request->input('other_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep17($request) {

        $this->validate($request,[
            'conditions_detail' => 'nullable|string|max:500',
            'workingTime' => 'nullable|array',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        if (count($request->input('workingTime')))
            $serviceUserProfile->ServiceUserConditions()->sync(array_keys($request->input('workingTime')));
        else
            $serviceUserProfile->ServiceUserConditions()->detach();

        $serviceUserProfile->conditions_detail  = $request->input('conditions_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep18($request) {

        $this->validate($request,[
            'have_dementia' => 'required|in:"Yes","No","Sometimes"',
            'dementia_detail' => 'required_if:have_dementia,"Yes","Sometimes"|nullable|string|max:500',
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
            'falls_detail' => 'required_if:history_of_falls,"Yes","Sometimes"|nullable|string|max:500',
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
            'mobility_bed_detail' => 'required_if:mobility_bed,"Yes","Sometimes"|nullable|string|max:500',
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
            'mobility_home_detail' => 'required_if:mobility_home,"Yes","Sometimes"|nullable|string|max:500',
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
            'mobility_shopping_detail' => 'required_if:mobility_shopping,"Yes","Sometimes"|nullable|string|max:500',
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
            'vision_detail' => 'required_if:vision,"Yes","Sometimes"|nullable|string|max:500',
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
            'hearing_detail' => 'required_if:hearing,"Yes","Sometimes"|nullable|string|max:500',
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
            'speech_detail' => 'required_if:speech,"Yes","Sometimes"|nullable|string|max:500',
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
            'comprehension_detail' => 'required_if:comprehension,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->comprehension  = $request->input('comprehension');
        $serviceUserProfile->comprehension_detail  = $request->input('comprehension_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep29($request) {

        $this->validate($request,[
            'languages' => 'required|array',
            'other_languages' => 'nullable|string|max:200',
        ]);


        $languages = $request->input('languages');

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->Languages()->sync(array_keys($languages));

        $serviceUserProfile->other_languages  = $request->input('other_languages');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep30($request) {

        $this->validate($request,[
            'social_interaction' => 'nullable|in:"Yes","No","Sometimes"',
            'visit_for_companionship' => 'nullable|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->social_interaction  = $request->input('social_interaction');
        $serviceUserProfile->visit_for_companionship  = $request->input('visit_for_companionship');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep32($request) {

        $this->validate($request,[
            'long_term_conditions' => 'nullable|string|max:500',
            'have_any_allergies' => 'required|in:"Yes","No","Sometimes"',
            'allergies_detail' => 'required_if:have_any_allergies,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->long_term_conditions  = $request->input('long_term_conditions');
        $serviceUserProfile->have_any_allergies  = $request->input('have_any_allergies');
        $serviceUserProfile->allergies_detail  = $request->input('allergies_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep33($request) {

        $this->validate($request,[
            'assistance_in_medication' => 'required|in:"Yes","No","Sometimes"',
            'in_medication_detail' => 'required_if:assistance_in_medication,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_in_medication  = $request->input('assistance_in_medication');
        $serviceUserProfile->in_medication_detail  = $request->input('in_medication_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep34($request) {

        $this->validate($request,[
            'skin_scores' => 'required|in:"Yes","No","Sometimes"',
            'skin_scores_detail' => 'required_if:skin_scores,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->skin_scores  = $request->input('skin_scores');
        $serviceUserProfile->skin_scores_detail  = $request->input('skin_scores_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep35($request) {

        $this->validate($request,[
            'assistance_with_dressings' => 'required|in:"Yes","No","Sometimes"',
            'dressings_detail' => 'required_if:assistance_with_dressings,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_with_dressings  = $request->input('assistance_with_dressings');
        $serviceUserProfile->dressings_detail  = $request->input('dressings_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep36($request) {

        $this->validate($request,[
            'other_medical_conditions' => 'required|in:"Yes","No","Sometimes"',
            'other_medical_detail' => 'required_if:other_medical_conditions,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->other_medical_conditions  = $request->input('other_medical_conditions');
        $serviceUserProfile->other_medical_detail  = $request->input('other_medical_detail');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep37($request) {

        $this->validate($request,[
            'food_allergies' => 'required|in:"Yes","No","Sometimes"',
            'food_allergies_detail' => 'required_if:food_allergies,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->food_allergies  = $request->input('food_allergies');
        $serviceUserProfile->food_allergies_detail  = $request->input('food_allergies_detail');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep38($request) {

        $this->validate($request,[
            'dietary_requirements' => 'required|in:"Yes","No","Sometimes"',
            'dietary_requirements_interaction' => 'required_if:dietary_requirements,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->dietary_requirements  = $request->input('dietary_requirements');
        $serviceUserProfile->dietary_requirements_interaction  = $request->input('dietary_requirements_interaction');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep39($request) {

        $this->validate($request,[
            'special_dietary_requirements' => 'required|in:"Yes","No","Sometimes"',
            'special_dietary_requirements_detail' => 'required_if:special_dietary_requirements,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->special_dietary_requirements  = $request->input('special_dietary_requirements');
        $serviceUserProfile->special_dietary_requirements_detail  = $request->input('special_dietary_requirements_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep40($request) {

        $this->validate($request,[
            'prepare_food' => 'required|in:"Yes","No","Sometimes"',
            'assistance_with_preparing_food' => 'required_if:prepare_food,"Yes","Sometimes"|nullable||in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->prepare_food  = $request->input('prepare_food');
        $serviceUserProfile->assistance_with_preparing_food  = $request->input('assistance_with_preparing_food');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep40_1($request) {

        $this->validate($request,[
            'preferences_of_food' => 'required|in:"Yes","No","Sometimes"',
            'preferences_of_food_requirements' => 'required_if:preferences_of_food,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->preferences_of_food  = $request->input('preferences_of_food');
        $serviceUserProfile->preferences_of_food_requirements  = $request->input('preferences_of_food_requirements');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep41($request) {

        $this->validate($request,[
            'assistance_with_eating' => 'required|in:"Yes","No","Sometimes"',
            'assistance_with_eating_detail' => 'required_if:assistance_with_eating,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_with_eating  = $request->input('assistance_with_eating');
        $serviceUserProfile->assistance_with_eating_detail  = $request->input('assistance_with_eating_detail');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep43($request) {

        $this->validate($request,[
            'assistance_with_personal_hygiene' => 'required|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_with_personal_hygiene  = $request->input('assistance_with_personal_hygiene');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep44($request) {

        $this->validate($request,[
            'appropriate_clothes' => 'required|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->appropriate_clothes  = $request->input('appropriate_clothes');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep45($request) {

        $this->validate($request,[
            'assistance_getting_dressed' => 'required|in:"Yes","No","Sometimes"',
            'assistance_getting_dressed_detail' => 'required_if:assistance_getting_dressed,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_getting_dressed  = $request->input('assistance_getting_dressed');
        $serviceUserProfile->assistance_getting_dressed_detail  = $request->input('assistance_getting_dressed_detail');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep46($request) {

        $this->validate($request,[
            'assistance_with_bathing' => 'required|in:"Yes","No","Sometimes"',
            'bathing_times_per_week' => 'required_if:assistance_with_bathing,"Yes","Sometimes"|nullable|in:"1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->assistance_with_bathing  = $request->input('assistance_with_bathing');
        $serviceUserProfile->bathing_times_per_week  = $request->input('bathing_times_per_week');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep47($request) {

        $this->validate($request,[
            'managing_toilet_needs' => 'required|in:"Yes","No","Sometimes"',
            'mobilising_to_toilet' => 'required_if:managing_toilet_needs,"Yes","Sometimes"|nullable|in:"Yes","No","Sometimes"',
            'cleaning_themselves' => 'required_if:managing_toilet_needs,"Yes","Sometimes"|nullable|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->managing_toilet_needs  = $request->input('managing_toilet_needs');
        $serviceUserProfile->mobilising_to_toilet  = $request->input('mobilising_to_toilet');
        $serviceUserProfile->cleaning_themselves  = $request->input('cleaning_themselves');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep48($request) {

        $this->validate($request,[
            'have_incontinence' => 'required|in:"Yes","No","Sometimes"',
            'kind_of_incontinence' => 'required_if:have_incontinence,"Yes","Sometimes"|nullable|string|max:250',
            'incontinence_wear' => 'required_if:have_incontinence,"Yes","Sometimes"|nullable|in:"Yes","No","Sometimes"',
            'incontinence_products_stored' => 'required_if:have_incontinence,"Yes","Sometimes"|nullable|string|max:250',
            'choosing_incontinence_products' => 'nullable|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->have_incontinence  = $request->input('have_incontinence');
        $serviceUserProfile->kind_of_incontinence  = $request->input('kind_of_incontinence');
        $serviceUserProfile->incontinence_wear  = $request->input('incontinence_wear');
        $serviceUserProfile->incontinence_products_stored  = $request->input('incontinence_products_stored');
        $serviceUserProfile->choosing_incontinence_products  = $request->input('choosing_incontinence_products');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep50($request) {

        $this->validate($request,[
            'behaviour' => 'required|array',
            'other_behaviour' => 'nullable|string|max:200',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->Behaviours()->sync(array_keys($request->input('behaviour')));

        $serviceUserProfile->other_behaviour  = $request->input('other_behaviour');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep51($request) {

        $this->validate($request,[
            'consent' => 'required|in:"Yes","No","Sometimes"',
            'consent_details' => 'required_if:consent,"Yes","Sometimes"|nullable|string|max:250',

        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->consent  = $request->input('consent');
        $serviceUserProfile->consent_details  = $request->input('consent_details');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep52($request) {

        $this->validate($request,[
            'getting_dressed_for_bed' => 'required|in:"Yes","No","Sometimes"',
            'getting_ready_for_bed' => 'nullable|in:"Yes","No","Sometimes"',
            'time_to_bed' => 'nullable|string|max:16',

        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->getting_dressed_for_bed  = $request->input('getting_dressed_for_bed');
        $serviceUserProfile->getting_ready_for_bed  = $request->input('getting_ready_for_bed');
        $serviceUserProfile->time_to_bed  = $request->input('time_to_bed');


        $serviceUserProfile->update();

        return;
    }
    private function saveStep53($request) {

        $this->validate($request,[
            'keeping_safe_at_night' => 'required|in:"Yes","No","Sometimes"',
            'keeping_safe_at_night_details' => 'required_if:keeping_safe_at_night,"Yes","Sometimes"|nullable|string|max:250',
            'time_to_night_helping' => 'nullable|string|max:16',

        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->keeping_safe_at_night  = $request->input('keeping_safe_at_night');
        $serviceUserProfile->keeping_safe_at_night_details  = $request->input('keeping_safe_at_night_details');
        $serviceUserProfile->time_to_night_helping  = $request->input('time_to_night_helping');


        $serviceUserProfile->update();

        return;
    }

    private function saveStep54($request) {

        $this->validate($request,[
            'toilet_at_night' => 'required|in:"Yes","No","Sometimes"',
            'helping_toilet_at_night' => 'nullable|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->toilet_at_night  = $request->input('toilet_at_night');
        $serviceUserProfile->helping_toilet_at_night  = $request->input('helping_toilet_at_night');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep56($request) {

        $this->validate($request,[
            'religious_beliefs' => 'required|in:"Yes","No","Sometimes"',
            'religious_beliefs_details' => 'required_if:religious_beliefs,"Yes","Sometimes"|nullable|string|max:250',
         ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->religious_beliefs  = $request->input('religious_beliefs');
        $serviceUserProfile->religious_beliefs_details  = $request->input('religious_beliefs_details');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep57($request) {

        $this->validate($request,[
            'particular_likes' => 'required|in:"Yes","No","Sometimes"',
            'particular_likes_details' => 'required_if:particular_likes,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->particular_likes  = $request->input('particular_likes');
        $serviceUserProfile->particular_likes_details  = $request->input('particular_likes_details');

        $serviceUserProfile->update();

        return;
    }


    private function saveStep58($request) {

        $this->validate($request,[
            'socialising_with_other' => 'required|in:"Yes","No","Sometimes"',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->socialising_with_other  = $request->input('socialising_with_other');

        $serviceUserProfile->update();

        return;
    }
    private function saveStep59($request) {

        $this->validate($request,[
            'interests_hobbies' => 'required|in:"Yes","No","Sometimes"',
            'interests_hobbies_details' => 'required_if:interests_hobbies,"Yes","Sometimes"|nullable|string|max:250',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->interests_hobbies  = $request->input('interests_hobbies');
        $serviceUserProfile->interests_hobbies_details  = $request->input('interests_hobbies_details');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep60($request) {

        $this->validate($request,[
            'we_missed' => 'required|in:"Yes","No","Sometimes"',
            'we_missed_details' => 'required_if:we_missed,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->we_missed  = $request->input('we_missed');
        $serviceUserProfile->we_missed_details  = $request->input('we_missed_details');

        $serviceUserProfile->update();

        return;
    }

    private function saveStep61($request) {

        $this->validate($request,[
            'multiple_carers' => 'required|in:"Yes","No","Sometimes"',
            'multiple_carers_details' => 'required_if:multiple_carers,"Yes","Sometimes"|nullable|string|max:500',
        ]);

        $serviceUserProfile = $this->model->findOrFail($request->input('serviceUserProfileID'));

        $serviceUserProfile->multiple_carers  = $request->input('multiple_carers');
        $serviceUserProfile->multiple_carers_details  = $request->input('multiple_carers_details');

        $serviceUserProfile->update();

        return;
    }

    public function getActiveStep($id){

        $activeStep=1;

        $step = $this->model->find($id)->registration_progress;

        //dd($this->model->find($id)->registration_progress);

        if ($step>=1)
            $activeStep=2;
        if ($step>=5||$step == '4_1_2_4')
            $activeStep=3;
        if ($step>58)
            $activeStep=4;
/*        if ($step>19)
            $activeStep=5;*/
   /*     if ($step>59)
            $activeStep=6;*/
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
        if ($step == '4_1_2_1'||$step == '5')
            $activeSubStep=4;
        if ($step >=6||$step == '5_1')
            $activeSubStep=5;
        if ($step >=7)
            $activeSubStep=6;
        if ($step >=15)
            $activeSubStep=7;
        if ($step >=59)
            $activeSubStep=8;
        if ($step >=61)
            $activeSubStep=9;
        return $activeSubStep;
    }
/*
    private function DoEmpty($serviceUserProfileId,$fields){

        if (count($fields)){
            foreach ($fields as $field) {

            }
        }

    }*/

}