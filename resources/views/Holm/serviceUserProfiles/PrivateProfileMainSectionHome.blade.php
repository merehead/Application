<div id="serviceGeneral" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">HOME</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="home"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i> Save
        </button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'home']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','home') !!}
<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">Home is a ... </span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select home-is-flat'];
            if (is_null($serviceUsersProfile->kind_of_building)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('kind_of_building',['FLAT'=>'FLAT','HOUSE'=>'HOUSE','BUNGALOW'=>'BUNGALOW'],null,$atrr) !!}
            @if ($errors->has('kind_of_building'))
                <span class="help-block"><strong>{{ $errors->first('kind_of_building') }}</strong></span>
            @endif
        </div>
        <div class="profileField home-is-flat" {!!  $serviceUsersProfile->kind_of_building != 'FLAT' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">There is a lift to the flat </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select'];
            if (is_null($serviceUsersProfile->lift_available)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('lift_available',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('lift_available'))
                <span class="help-block"><strong>{{ $errors->first('lift_available') }}</strong></span>
            @endif
        </div>
        <div class="profileField home-is-flat" {!!  $serviceUsersProfile->kind_of_building != 'FLAT' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">The flat is  on floor</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__input'];
            if (is_null($serviceUsersProfile->floor_id)) $atrr['placeholder'] = 'Floor number';?>
            {!! Form::select('floor_id',$floors,null,$atrr) !!}
            @if ($errors->has('floor_id'))
                <span class="help-block"><strong>{{ $errors->first('floor_id') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">Can keep the home safe and clean by {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'yourself':'themself'}}</span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select assistance_keeping_switcher'];
            if (is_null($serviceUsersProfile->home_safe)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('home_safe',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('home_safe'))
                <span class="help-block"><strong>{{ $errors->first('home_safe') }}</strong></span>
            @endif
        </div>
        <div class="profileField depend_from_home_safe" {!!  ($serviceUsersProfile->home_safe == 'Yes' || is_null($serviceUsersProfile->home_safe) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Require':'Requires'}} assistance keeping the home safe and clean</span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select'];
            if (is_null($serviceUsersProfile->assistance_keeping)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('assistance_keeping',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('assistance_keeping'))
                <span class="help-block"> <strong>{{ $errors->first('assistance_keeping') }}</strong> </span>
            @endif
        </div>

    </div>
    <div class="profileRow " >
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">Can move around home safely by {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'yourself':'themself'}}</span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select  move_available_switcher'];
            if (is_null($serviceUsersProfile->assistance_moving)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('assistance_moving',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('assistance_moving'))
                <span class="help-block"><strong>{{ $errors->first('assistance_moving') }}</strong></span>
            @endif
        </div>
        <div class="profileField depend_from_move_available" {!!  ($serviceUsersProfile->move_available == 'Yes' || is_null($serviceUsersProfile->move_available) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Require':'Requires'}} assistance moving around home</span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select move_available_switcher'];
            if (is_null($serviceUsersProfile->move_available)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('move_available',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('move_available'))
                <span class="help-block"><strong>{{ $errors->first('assistance_keeping') }}</strong></span>
            @endif
        </div>
    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">Entry</h2>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">How should the carer enter {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'your':'the '.$userNameForSite.'’s'}} home?</span></h2>
            {!! Form::textarea('carer_enter',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('carer_enter'))
                <span class="help-block"><strong>{{ $errors->first('carer_enter') }}</strong></span>
            @endif
        </div>
    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">Other home information</h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Is there anything else the Carer should be aware of when entering the home?</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile other_detail_switcher'];
            if (is_null($serviceUsersProfile->entering_aware)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('entering_aware',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('entering_aware'))
                <span class="help-block"><strong>{{ $errors->first('entering_aware') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow depend_from_entering_aware" {!!  ($serviceUsersProfile->entering_aware == 'No' || is_null($serviceUsersProfile->entering_aware) )? ' style="display:none"' : ''!!}>
        <div class="profileField profileField--full-width ">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">PLEASE, GIVE DETAILS </span></h2>
            {!! Form::textarea('other_detail',null,['class'=>'profileField__area','placeholder'=>'Type details',
            'maxlength'=>"250"]) !!}
            @if ($errors->has('other_detail'))
                <span class="help-block"><strong>{{ $errors->first('other_detail') }}</strong></span>
            @endif
        </div>
    </div>

</div>
<div class="borderContainer">
    <h2 class="fieldCategory">Other inhabitants</h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Somebody lives with {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'you':$userNameForSite}}</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfileInhabitants'];
            if (is_null($serviceUsersProfile->anyone_else_live)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('anyone_else_live',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('anyone_else_live'))
                <span class="help-block"><strong>{{ $errors->first('anyone_else_live') }}</strong></span>
            @endif
        </div>
        <div class="inhabitantsDepend profileField profileField--two-thirds"{!!  $serviceUsersProfile->anyone_else_live == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">please give their name and relationship to {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'you':$userNameForSite}}</span></h2>
            {!! Form::text('anyone_detail',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('anyone_detail'))
                <span class="help-block"><strong>{{ $errors->first('anyone_detail') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="inhabitantsDepend profileRow" {!!  ($serviceUsersProfile->anyone_else_live == 'No' || is_null($serviceUsersProfile->anyone_else_live) )? ' style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Is the other person likely to be home during care visits?</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select'];
            if (is_null($serviceUsersProfile->anyone_else_live)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('anyone_friendly',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('anyone_friendly'))
                <span class="help-block"><strong>{{ $errors->first('anyone_friendly') }}</strong></span>
            @endif
        </div>
    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">Pets</h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Owns pets</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfilePet'];
            if (is_null($serviceUsersProfile->own_pets)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('own_pets',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('own_pets'))
                <span class="help-block"><strong>{{ $errors->first('own_pets') }}</strong></span>
            @endif
        </div>
        <div class="profileField serviceUserProfilePetHide profileField--two-thirds"{!!  ($serviceUsersProfile->own_pets == 'No' || is_null($serviceUsersProfile->own_pets) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Please, give details</span></h2>
            {!! Form::textarea('pet_detail',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('pet_detail'))
                <span class="help-block"><strong>{{ $errors->first('pet_detail') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow serviceUserProfilePetHide"{!!  ($serviceUsersProfile->own_pets == 'No' || is_null($serviceUsersProfile->own_pets) )? ' style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Pets friendly with strangers</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select'];
            if (is_null($serviceUsersProfile->pet_friendly)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('pet_friendly',['Yes'=>'Yes','No'=>'No','Normally'=>'Normally'],null,$atrr) !!}
            @if ($errors->has('pet_friendly'))
                <span class="help-block"><strong>{{ $errors->first('pet_friendly') }}</strong></span>
            @endif
        </div>

    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">Companionship</h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text
            ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Have':'Has'}} regular social interaction with friends / family</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->anyone_else_live)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('social_interaction',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('social_interaction'))
                <span class="help-block"><strong>{{ $errors->first('social_interaction') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Would {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'you':$userNameForSite}} like someone to visit regularly for companionship?</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->anyone_else_live)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('visit_for_companionship',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('visit_for_companionship'))
                <span class="help-block"><strong>{{ $errors->first('visit_for_companionship') }}</strong></span>
            @endif
        </div>

    </div>

</div>

{{ Form::close() }}