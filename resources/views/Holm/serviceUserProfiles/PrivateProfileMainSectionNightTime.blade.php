<div class="borderContainer">
    <div id="nightTime-div" class="borderContainer">
        <div class="profileCategory">
            <h2 class="profileCategory__title">Night-time</h2>
            <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="nightTime"></span> EDIT</a>
            <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
        </div>
    </div>
    {!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'nightTime']) !!}
    {!! Form::hidden('id',null) !!}
    {!! Form::hidden('stage','nightTime') !!}

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle "><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Has problems getting dressed for bed</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile getting_dressed_for_bed_selector'];
            if (is_null($serviceUsersProfile->getting_dressed_for_bed)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('getting_dressed_for_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('getting_dressed_for_bed'))
                <span class="help-block"><strong>{{ $errors->first('getting_dressed_for_bed') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow getting_dressed_for_bed_depend" {!!  ($serviceUsersProfile->getting_dressed_for_bed != 'Yes' || is_null($serviceUsersProfile->getting_dressed_for_bed) )? ' style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle "><span class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Need':'Needs'}}  help getting ready for bed?</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->getting_ready_for_bed)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('getting_ready_for_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('getting_ready_for_bed'))
                <span class="help-block"><strong>{{ $errors->first('getting_ready_for_bed') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow getting_dressed_for_bed_depend" {!!  ($serviceUsersProfile->getting_dressed_for_bed != 'Yes' || is_null($serviceUsersProfile->getting_dressed_for_bed) )? ' style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">What time would {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'you':'they'}}  like someone to come and help?<span class="requireIco">*</span></span></h2>
            <div class="profileField__input-wrap">
                @if(empty($serviceUsersProfile->time_to_bed))
                    <input name="time_to_bed" id="time_to_bed" class="profileField__input" placeholder="Time" type="text">
                @else
                    {!! Form::text('time_to_bed',null,['id'=>'time_to_bed','class'=>'profileField__input','maxlength'=>"50"]) !!}
                @endif
                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </span>
            </div>
        </div>
    </div>
    <div class="profileRow" >
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Need':'Needs'}} assistance keeping safe at night</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile keeping_safe_at_night_selector'];
            if (is_null($serviceUsersProfile->keeping_safe_at_night)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('keeping_safe_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('keeping_safe_at_night'))
                <span class="help-block"><strong>{{ $errors->first('keeping_safe_at_night') }}</strong></span>
            @endif
        </div>
        <div class="profileField  profileField--two-thirds"{!!  ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night) )? 'style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">Please, give details  </span></h2>
            {!! Form::textarea('keeping_safe_at_night_details',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('keeping_safe_at_night_details'))
                <span class="help-block"><strong>{{ $errors->first('keeping_safe_at_night_details') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow keeping_safe_at_night_depend" {!!  ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night) )? 'style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">What time would {{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'you':'they'}} like someone to help?<span class="requireIco">*</span></span></h2>
            <div class="profileField__input-wrap">
                @if(empty($serviceUsersProfile->time_to_night_helping))

                    <input name="time_to_night_helping" id="time_to_night_helping" class="profileField__input" placeholder="Time" type="text">
                @else
                    {!! Form::text('time_to_night_helping',null,['id'=>'time_to_night_helping','class'=>'profileField__input','maxlength'=>"250"]) !!}
                @endif
                <span class="profileField__input-ico centeredLink"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>


    <div class="profileRow keeping_safe_at_night_depend" {!!
    ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night)
        )? 'style="display:none"' : '' !!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Need':'Needs'}} help going to the toilet at night</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile toilet_at_night_selector'];
            if (is_null($serviceUsersProfile->toilet_at_night)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('toilet_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('toilet_at_night'))
                <span class="help-block"><strong>{{ $errors->first('toilet_at_night') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="profileRow   toilet_at_night_depend" {!!
    ($serviceUsersProfile->toilet_at_night == 'No' || is_null($serviceUsersProfile->toilet_at_night)
    || $serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night)
    )? 'style="display:none"' : '' !!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ordinaryTitle__text--smaller">{{($serviceUsersProfile->purchaser->purchasing_care_for=='Myself')?'Need':'Needs'}} someone to help at night?</span></h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->helping_toilet_at_night)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('helping_toilet_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('helping_toilet_at_night'))
                <span class="help-block"><strong>{{ $errors->first('helping_toilet_at_night') }}</strong></span>
            @endif
        </div>
    </div>
</div>
{!! Form::close()!!}