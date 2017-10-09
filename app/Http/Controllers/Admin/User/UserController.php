<?php

namespace App\Http\Controllers\Admin\User;

use App\CarersProfile;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Repo\Models\User\AdminUsers;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use App\Http\Controllers\Controller;

class UserController extends AdminController
{
    private $siteUsers;

    public function __construct(AdminUsers $siteUsers)
    {
        parent::__construct();
        $this->siteUsers = $siteUsers;

        $this->template = config('settings.theme') . '.templates.adminBase';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->title = 'Admin Profiles Management';
        $profileType = $this->siteUsers->getProfileType();
        $statusType = $this->siteUsers->getStatusType();
        $totalsByUserType = $this->siteUsers->getTotalsByUserType();
        $totals = $this->siteUsers->getTotals($totalsByUserType);

        $request->has('profileType')? $profileTypeFilter = $request->get('profileType') : $profileTypeFilter = null;
        $request->has('statusType')? $statusTypeFilter  = $request->get('statusType') : $statusTypeFilter = null;
        $userList = $this->siteUsers->getUserList($profileTypeFilter,$statusTypeFilter);

        $this->vars = array_add($this->vars, 'profileType', $profileType);
        $this->vars = array_add($this->vars, 'statusType', $statusType);
        $this->vars = array_add($this->vars, 'totals', $totals);
        $this->vars = array_add($this->vars, 'totalsByUserType', $totalsByUserType);
        $this->vars = array_add($this->vars, 'userList', $userList);

        //dd($this->vars);

        $this->content = view(config('settings.theme') . '.profilesManagement.profilesManagement')->with($this->vars)->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        switch ($request->get('user_type')) {
            case 'carer':
                $profile = CarersProfile::findOrfail($id);
                break;
            case 'service':
                $profile = ServiceUsersProfile::findOrfail($id);
                break;
            case 'purchaser':
                $profile = PurchasersProfile::findOrfail($id);
                break;
        }

        if ($profile) {
            switch ($request->get('action')) {
                case 'accept':
                    $profile->profiles_status_id = 2;
                    break;
                case 'reject':
                    $profile->profiles_status_id = 3;
                    break;
                case 'block':
                    $profile->profiles_status_id = 5;
                    break;
            }
        } else {
            dd($request->all());
        }

        $profile->update();

        if ($request->get('user_type') == 'carer' && $request->get('action') == 'accept') {

            $user = User::findOrFail($profile->id);

            try {
                Mail::send(config('settings.frontTheme') . '.emails.confirm_account_by_admin',
                    ['user' => $user,
                    ],
                    function ($m) use ($user) {
                        $m->to($user->email)->subject('HOLM account confirmation');
                    });
            } catch (Swift_TransportException $STe) {

                $error = MailError::create([
                    'error_message' => $STe->getMessage(),
                    'function' => __METHOD__,
                    'action' => 'Try to sent accepting massage',
                    'user_id' => $user->id
                ]);
            }
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
