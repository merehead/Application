<?php

namespace App\Http\Controllers\Admin\User;

use App\CarersProfile;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Repo\Models\User\AdminUsers;
use App\MailError;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

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
    public function index(Request $request,$page = 1)
    {
        $this->title = 'Admin Profiles Management';
        $profileType = $this->siteUsers->getProfileType();
        $statusType = $this->siteUsers->getStatusType();
        $totalsByUserType = $this->siteUsers->getTotalsByUserType();
        $totals = $this->siteUsers->getTotals($totalsByUserType);

        $request->has('profileType')? $profileTypeFilter = $request->get('profileType') : $profileTypeFilter = null;
        $request->has('statusType')? $statusTypeFilter  = $request->get('statusType') : $statusTypeFilter = null;
        $request->has('userName')? $userNameFilter = $request->get('userName') : $userNameFilter = null;

        $userList = $this->siteUsers->getUserList($profileTypeFilter,$statusTypeFilter,$userNameFilter);
        $page = $request->get('page',1);
        $perPage = 9;
        $start = ($page - 1) * $perPage;
        if($page==1) $start = 0;
        $count = count($userList);
        if($count>0)
            $pages = ceil($count/$perPage);
        else
            $pages=0;
        $nextPage=$page+1;
        $previousPage = $page-1;

        $userList = $userList->slice($start,$perPage);
        $this->vars = array_add($this->vars, 'profileType', $profileType);
        $this->vars = array_add($this->vars, 'profileTypeFilter', $profileTypeFilter);
        $this->vars = array_add($this->vars, 'statusTypeFilter', $statusTypeFilter);
        $this->vars = array_add($this->vars, 'userName', $userNameFilter);
        $this->vars = array_add($this->vars, 'nextPage', $nextPage);
        $this->vars = array_add($this->vars, 'previousPage', $previousPage);
        $this->vars = array_add($this->vars, 'count', $count);
        $this->vars = array_add($this->vars, 'curr_page', $page);
        $this->vars = array_add($this->vars, 'pages', $pages);
        $this->vars = array_add($this->vars, 'statusType', $statusType);
        $this->vars = array_add($this->vars, 'totals', $totals);
        $this->vars = array_add($this->vars, 'totalsByUserType', $totalsByUserType);
        $this->vars = array_add($this->vars, 'userList', $userList);
        $this->vars = array_add($this->vars, 'link', '/admin/user');
        $this->vars = array_add($this->vars, 'request', $request);

        $pagination = view(config('settings.theme') . '.pagination2')->with($this->vars)->render();
        $this->vars = array_add($this->vars, 'pagination', $pagination);

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

        $previous = $profile->profiles_status_id;

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
                case 'recover':
                    $profile->profiles_status_id = 1;
            }
        } else {
            dd($request->all());
        }

        $profile->update();


        if ($profile) {
            switch ($request->get('action')) {
                case 'accept':{

                    if ($previous == 5) {
                        $user = User::findOrFail($profile->id);


                        $text = view(config('settings.frontTheme') . '.emails.unblock_account_by_admin')->with([
                            'user' => $user,
                            'like_name'=>$profile->like_name
                        ])->render();

                        DB::table('mails')
                            ->insert(
                                [
                                    'email' =>$user->email,
                                    'subject' =>'Unblock account by admin',
                                    'text' =>$text,
                                    'time_to_send' => Carbon::now(),
                                    'status'=>'new'
                                ]);

                    }
                    break;
                }
                case 'reject': {
                    $user = User::findOrFail($profile->id);

                    $text = view(config('settings.frontTheme') . '.emails.reject_account_by_admin')->with([
                        'user' => $user,
                        'like_name'=>$profile->like_name
                    ])->render();

                    DB::table('mails')
                        ->insert(
                            [
                                'email' =>$user->email,
                                'subject' =>'Reject account by admin',
                                'text' =>$text,
                                'time_to_send' => Carbon::now(),
                                'status'=>'new'
                            ]);

                }
                    break;
                case 'block':{
                    $user = User::findOrFail($profile->id);

                    $text = view(config('settings.frontTheme') . '.emails.block_account_by_admin')->with([
                        'user' => $user,
                        'like_name'=>$profile->like_name
                    ])->render();

                    DB::table('mails')
                        ->insert(
                            [
                                'email' =>$user->email,
                                'subject' =>'Block account by admin',
                                'text' =>$text,
                                'time_to_send' => Carbon::now(),
                                'status'=>'new'
                            ]);

                }
                    break;

            }
        } else {
            dd($request->all());
        }



        if ($request->get('user_type') == 'carer' && $request->get('action') == 'accept' && $previous==1) {

            $user = User::findOrFail($profile->id);


            $text = view(config('settings.frontTheme') . '.emails.confirm_account_by_admin')->with([
                'user' => $user,

            ])->render();

            DB::table('mails')
                ->insert(
                    [
                        'email' =>$user->email,
                        'subject' =>'HOLM account confirmation',
                        'text' =>$text,
                        'time_to_send' => Carbon::now(),
                        'status'=>'new'
                    ]);


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

    public function getCarerImage(Request $request,$id){

        $user = User::with('userCarerProfile')->with('documents')->find($id);
        $userCarerReferences=CarersProfile::with('CarerReferences')->find($id)->CarerReferences;

        $userProfileList = collect();
        $userProfileList->push($userCarerReferences);
        $userProfileList->push($user);
//        dd($userProfileList);
        $text = $this->content = view(config('settings.theme').'.profilesManagement.CarerAnswers')->with([
            'user' => $userProfileList,
        ])->render();
//        echo $text; die;
        $data = ['ansver'=>true,'form'=>$text];
        return response()->json($data);
    }
}
