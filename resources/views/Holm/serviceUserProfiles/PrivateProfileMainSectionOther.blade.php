<div class="borderContainer">
    <div id="other-div" class="borderContainer">
        <div class="profileCategory">
            <h2 class="profileCategory__title">OTHER</h2>
            <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="other"></span> EDIT</a>
            <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
        </div>
    </div>
    {!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'other']) !!}
    {!! Form::hidden('id',null) !!}
    {!! Form::hidden('stage','other') !!}
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              {{($serviceUsersProfile->care_for=='Myself')?'Have':'Has'}} political, religious or other beliefs
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->religious_beliefs)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('religious_beliefs',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('religious_beliefs'))
                <span class="help-block"><strong>{{ $errors->first('religious_beliefs') }}</strong></span>
            @endif
        </div>



        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->religious_beliefs == 'No' || is_null($serviceUsersProfile->religious_beliefs) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::textarea('religious_beliefs_details',null,['class'=>'profileField__area','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('religious_beliefs_details'))
                <span class="help-block"><strong>{{ $errors->first('religious_beliefs_details') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              {{($serviceUsersProfile->care_for=='Myself')?'Have':'Has'}} particular likes or dislikes
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->particular_likes)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('particular_likes',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('particular_likes'))
                <span class="help-block"><strong>{{ $errors->first('particular_likes') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->particular_likes == 'No' || is_null($serviceUsersProfile->particular_likes) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::textarea('particular_likes_details',null,['class'=>'profileField__area','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('particular_likes_details'))
                <span class="help-block"><strong>{{ $errors->first('particular_likes_details') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              {{($serviceUsersProfile->care_for=='Myself')?'Need':'Needs'}} the assistance of more than one person at a time to achieve any particular task
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->multiple_carers)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('multiple_carers',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('multiple_carers'))
                <span class="help-block"><strong>{{ $errors->first('multiple_carers') }}</strong></span>
            @endif

        </div>
        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->multiple_carers == 'No' || is_null($serviceUsersProfile->multiple_carers) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::textarea('multiple_carers_details',null,['class'=>'profileField__area','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('multiple_carers_details'))
                <span class="help-block"><strong>{{ $errors->first('multiple_carers_details') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              {{($serviceUsersProfile->care_for=='Myself')?'Like':'Likes'}} socialising with other people / groups
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->socialising_with_other)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('socialising_with_other',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
            @if ($errors->has('socialising_with_other'))
                <span class="help-block"><strong>{{ $errors->first('socialising_with_other') }}</strong></span>
            @endif
        </div>
{{--        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->socialising_with_other == 'No' || is_null($serviceUsersProfile->socialising_with_other) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('socialising_with_other_details',null,['class'=>'profileField__input','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('socialising_with_other_details'))
                <span class="help-block"><strong>{{ $errors->first('socialising_with_other_details') }}</strong></span>
            @endif
        </div>--}}

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              {{($serviceUsersProfile->care_for=='Myself')?'Have':'Has'}} interests or hobbies which {{$userNameForSite}} enjoy
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->interests_hobbies)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('interests_hobbies',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('interests_hobbies'))
                <span class="help-block"><strong>{{ $errors->first('interests_hobbies') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->interests_hobbies == 'No' || is_null($serviceUsersProfile->interests_hobbies) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::textarea('interests_hobbies_details',null,['class'=>'profileField__area','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('interests_hobbies_details'))
                <span class="help-block"><strong>{{ $errors->first('interests_hobbies_details') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Are there any other medical conditions, disabilities, or other pieces of information not already covered which you feel may be of use?
              </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile'];
            if (is_null($serviceUsersProfile->we_missed)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('we_missed',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('we_missed'))
                <span class="help-block"><strong>{{ $errors->first('we_missed') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  ($serviceUsersProfile->we_missed == 'No' || is_null($serviceUsersProfile->we_missed) )? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::textarea('we_missed_details',null,['class'=>'profileField__area','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('we_missed_details'))
                <span class="help-block"><strong>{{ $errors->first('we_missed_details') }}</strong></span>
            @endif
        </div>

    </div>
</div>
{!! Form::close()!!}