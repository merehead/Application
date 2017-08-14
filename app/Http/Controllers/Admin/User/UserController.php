<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Repo\Models\User\AdminUsers;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class UserController extends AdminController
{
    private $siteUsers;

    public function __construct(AdminUsers $siteUsers) {
        parent::__construct();
        $this->siteUsers = $siteUsers;

        $this->template = config('settings.theme').'.templates.adminBase';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->title = 'Admin Profiles Management';

        // getProfileType
        $profileType = $this->siteUsers->getProfileType();
        // getStatusType
        $statusType = $this->siteUsers->getStatusType();
        // getTotals
        $totals = $this->siteUsers->getTotals();
        // getTotalsByUserType
        $totalsByUserType = $this->siteUsers->getTotalsByUserType();

        // getUserRecords
        $userList = $this->siteUsers->getUserList();

        $this->vars = array_add($this->vars,'profileType',$profileType);
        $this->vars = array_add($this->vars,'statusType',$statusType);
        $this->vars = array_add($this->vars,'totals',$totals);
        $this->vars = array_add($this->vars,'totalsByUserType',$totalsByUserType);
        $this->vars = array_add($this->vars,'userList',$userList);

        //dd($this->vars);

        $this->content = view(config('settings.theme').'.profilesManagement.profilesManagement')->with($this->vars)->render();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch ($request->get('action')){

            case 'accept':
                return $id.' - accept';
            case 'reject':
                return $id.' - reject';
            case 'block':
                return $id.' - block';
        }

        dd($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
