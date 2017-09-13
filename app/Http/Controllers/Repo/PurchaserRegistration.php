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
use App\PurchasersProfile;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PurchaserRegistration
{
    use  ValidatesRequests;

    protected $model = FALSE;

    public function __construct(PurchasersProfile $purchaserProfile) {
        $this->model = $purchaserProfile;
    }

    public function getNextStep()
    {

        $user = Auth::user();

        $currentStep = $this->model->find($user->id)->registration_progress;


        switch ($currentStep) {
            case '0' : $step = 'Step1_purchaserRegistration';break;
            case '1' : $step = 'Step2_purchaserRegistration';break;
            case '2' : $step = 'Step3_purchaserRegistration';break;
            case '3' : $step = 'Step4_purchaserRegistration';break;
            case '4' : $step = 'Step4_2_purchaserRegistration';break;
            case '4_2' : $step = 'Step4_1_purchaserRegistration';break;
/*            case '4_2' :
            {
                if($this->model->find($user->id)->purchasing_care_for == 'Myself')
                    $step = 'Step4_1_2_1_Thank__you_Sign_up';
                else
                    $step = 'Step4_1_purchaserRegistration';
                break;
            }*/
            case '4_1' : $step = 'Step4_1_2_purchaserRegistration';break;
            case '4_1_2_1' : $step = 'Step4_1_2_1_Thank__you_Sign_up';break;


            case '5' : $step = 'Step5_1_purchaserRegistration';break;
            case '5_1' : $step = 'Step5_2_purchaserRegistration';break;
            case '5_2' : $step = 'Step6_purchaserRegistration';break;

        }

        return $step;
    }

    public function setNextStep($request)
    {

        $array=$request->all();

        $user = Auth::user();

        $purchaserProfile = $this->model->findOrFail($user->id);



        $nextStep = 0;
        switch ($array['step']) {
            case '1' : $nextStep = '1';break;
            case '2' : $nextStep = '2';break;
            case '3' : $nextStep = '3';break;
            case '4' : $nextStep = '4';break;
            case '4_2' : $nextStep = '4_2';break;
            case '4_1' : $nextStep = '4_1';break;
            case '4_1_2' : $nextStep = '4_1_2_1';break;

        }


        $purchaserProfile->registration_progress = $nextStep;

        if ($request->input('step')==5 && $request->input('criminal_conviction')=="No") { // no a criminal backend
            $purchaserProfile->registration_progress = '5_2';
        }

        if (($request->input('step')=='5' && $request->input('criminal_conviction')=="Yes") // has the criminal backend
        ||($request->input('step')=='14' && $request->input('work_UK')=="No")) {            // restricted in UK
            $purchaserProfile->registration_progress = '5_1';
            //return redirect()->action('HomePageController@index');
        }

        if ($request->input('step')=='5_1' && $purchaserProfile->criminal_conviction=='Some') { // has some criminal backend
            $purchaserProfile->registration_progress = '5_2';
        }


        $purchaserProfile->update();

        return;
    }

    public function saveStep($request) {

        $step = $request->input('step');

        switch ($step) {
            case '1'      : $this->saveStep1($request);break;
            case '3'      : $this->saveStep3($request);break;
            case '4'      : $this->saveStep4($request);break;
            case '4_1'    : $this->saveStep4_1($request);break;

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
            'user_type_id' => 1,
        ]);


        if ($user) {

            $purchaserProfile = new PurchasersProfile();

            $purchaserProfile->id = $user->id;
            $purchaserProfile->registration_progress = 1;
            $purchaserProfile -> save();
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']],TRUE)) {
            Auth::login($user, true);

            Mail::send('errors.404', ['userName' => $user->email, 'password' => $request['password']],
                function ($m) use ($request) {$m->to($request['email'])->subject('Registration');});

        }

        return;
    }

    private function saveStep3($request) {

        $this->validate($request,[
            'purchasing_care_for' => 'required|in:"Someone else","Myself"',
        ]);

        $purchaserProfile = $this->model->findOrFail($request->input('purchasersProfileID'));

        $purchaserProfile->purchasing_care_for  = $request->input('purchasing_care_for');
        $purchaserProfile->update();

        return;
    }

    private function saveStep4($request) {

       // dd($request->all());

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
                    'regex:#^[BMOSWbmosw][LKANlkan0-9][0-9]{1,2} [0-9][A-Za-z]{1,2}$#'
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
            'postcode' => 'required|string|max:32|regex:#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([AZa-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))
[0-9][A-Za-z]{2})$#',
            'DoB'=>'required',
        ]);*/

        //dd($request->all());

        $purchaserProfile = $this->model->findOrFail($request->input('purchasersProfileID'));
        //dd($purchaserProfile);

        $purchaserProfile->title            = $request->input('title');
        $purchaserProfile->first_name       = $request->input('first_name');
        $purchaserProfile->family_name      = $request->input('family_name');
        $purchaserProfile->like_name        = $request->input('like_name');
        $purchaserProfile->gender           = $request->input('gender');
        $purchaserProfile->mobile_number    = $request->input('mobile_number');
        $purchaserProfile->address_line1    = $request->input('address_line1');
        $purchaserProfile->address_line2    = $request->input('address_line2');
        $purchaserProfile->address_line1    = $request->input('address_line1');
        $purchaserProfile->town             = $request->input('town');
        $purchaserProfile->postcode         = strtoupper($request->input('postcode'));
        $purchaserProfile->DoB              = $request->input('DoB');
        $purchaserProfile->update();
        //dd($request->all());

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
                    'regex:#^[BMOSWbmosw][LKANlkan0-9][0-9]{1,2} [0-9][A-Za-z]{1,2}$#'
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

        $purchaserProfile = $this->model->findOrFail($request->input('purchasersProfileID'));

        $serviceUsersProfile = $purchaserProfile->serviceUsers->first();


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