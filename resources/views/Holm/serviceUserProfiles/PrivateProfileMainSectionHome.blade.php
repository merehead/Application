<div id="serviceGeneral" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">HOME</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="home"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'home']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','home') !!}

<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Home is a ... </span>
            </h2>

                {!! Form::select('kind_of_building',['FLAT'=>'FLAT','HOUSE'=>'HOUSE','BUNGALOW'=>'BUNGALOW'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
                @if ($errors->has('kind_of_building'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('kind_of_building') }}</strong>
                                    </span>
                @endif

        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                There is a lift to the flat </span>
            </h2>

            {!! Form::select('lift_available',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('lift_available'))
                <span class="help-block">
                                        <strong>{{ $errors->first('lift_available') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                The flat is  on floor</span>
            </h2>
            {!! Form::select('floor_id',$floors,null,['class'=>'profileField__input','placeholder'=>'Floor number']) !!}
         @if ($errors->has('floor_id'))
            <span class="help-block"><strong>{{ $errors->first('floor_id') }}</strong></span>
        @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Can keep the home safe and clean by themself
              </span>
            </h2>

            {!! Form::select('home_safe',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('home_safe'))
                <span class="help-block">
                                        <strong>{{ $errors->first('home_safe') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance keeping the home safe and clean
              </span>
            </h2>
            {!! Form::select('assistance_keeping',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_keeping'))
                <span class="help-block"> <strong>{{ $errors->first('assistance_keeping') }}</strong> </span>
            @endif
        </div>
{{--    </div>

    <div class="profileRow">--}}

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Requires assistance moving around home
              </span>
            </h2>

            {!! Form::select('move_available',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('move_available'))
                <span class="help-block">
                                        <strong>{{ $errors->first('assistance_keeping') }}</strong>
                                    </span>
            @endif
        </div>


    </div>

    <div class="profileRow">

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Can move around home safely by themself
              </span>
            </h2>
            {!! Form::select('assistance_moving',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_moving'))
                <span class="help-block">
                                        <strong>{{ $errors->first('assistance_moving') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_moving == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_moving_details',null,['class'=>'profileField__input','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_moving_details'))
                <span class="help-block"><strong>{{ $errors->first('assistance_moving_details') }}</strong></span>
            @endif
        </div>

    </div>

</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Entry
    </h2>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                How should the carer enter the {{$userNameForSite}}’s home?    </span>
            </h2>
            {!! Form::textarea('carer_enter',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('carer_enter'))
                <span class="help-block">
                                        <strong>{{ $errors->first('carer_enter') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Other home information
    </h2>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Is there anything else the Carer should be aware of when entering the home?    </span>
            </h2>

            {!! Form::textarea('other_detail',null,['class'=>'formArea ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('other_detail'))
                <span class="help-block">
                                        <strong>{{ $errors->first('other_detail') }}</strong>
                                    </span>
            @endif

        </div>
    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">
        Other inhabitants
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Somebody lives with  {{$userNameForSite}}
              </span>
            </h2>
            {!! Form::select('anyone_else_live',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}

            @if ($errors->has('anyone_else_live'))
                <span class="help-block">
                                <strong>{{ $errors->first('anyone_else_live') }}</strong>
                                    </span>
            @endif
        </div>




        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->anyone_else_live == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                please give their name and relationship to {{$userNameForSite}}   </span>
            </h2>

            {!! Form::text('anyone_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('anyone_detail'))
                <span class="help-block">
                                        <strong>{{ $errors->first('anyone_detail') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Is the other person likely to be home during care visits?
              </span>
            </h2>

            {!! Form::select('anyone_friendly',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('anyone_friendly'))
                <span class="help-block">
                                        <strong>{{ $errors->first('anyone_friendly') }}</strong>
                                    </span>
            @endif
        </div>

    </div>
</div>


<div class="borderContainer">
    <h2 class="fieldCategory">
        Pets
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Owns pets
              </span>
            </h2>

            {!! Form::select('own_pets',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select serviceUserProfilePet','placeholder'=>'Please select']) !!}

            @if ($errors->has('own_pets'))
                <span class="help-block">
                                <strong>{{ $errors->first('own_pets') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="profileField serviceUserProfilePetHide profileField--two-thirds"{!!  $serviceUsersProfile->own_pets == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Please, give details   </span>
            </h2>

            {!! Form::text('pet_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('pet_detail'))
                <span class="help-block">
                                        <strong>{{ $errors->first('pet_detail') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="profileRow serviceUserProfilePetHide"{!!  $serviceUsersProfile->own_pets == 'No' ? ' style="display:none"' : ''!!}>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Pets friendly with strangers
              </span>
            </h2>

            {!! Form::select('pet_friendly',['Yes'=>'Yes','No'=>'No','Normally'=>'Normally'],null,['class'=>'profileField__select ','placeholder'=>'Please select']) !!}
            @if ($errors->has('pet_friendly'))
                <span class="help-block">
                                        <strong>{{ $errors->first('pet_friendly') }}</strong>
                                    </span>
            @endif
        </div>

    </div>
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Companionship
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Has regular social interaction with friends / family
              </span>
            </h2>

            {!! Form::select('social_interaction',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('social_interaction'))
                <span class="help-block">
                                        <strong>{{ $errors->first('social_interaction') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->social_interaction == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('companionship_interaction_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('companionship_interaction_details'))
                <span class="help-block">
                                        <strong>{{ $errors->first('companionship_interaction_details') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Would {{$userNameForSite}} like someone to visit regularly for companionship?
              </span>
            </h2>

            {!! Form::select('visit_for_companionship',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('visit_for_companionship'))
                <span class="help-block">
                                        <strong>{{ $errors->first('visit_for_companionship') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds" {!!  $serviceUsersProfile->visit_for_companionship == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('companionship_visit_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('companionship_visit_details'))
                <span class="help-block">
                                        <strong>{{ $errors->first('companionship_visit_details') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

</div>

{{ Form::close() }}