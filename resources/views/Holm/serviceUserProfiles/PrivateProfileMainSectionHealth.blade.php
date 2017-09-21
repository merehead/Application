<div id="health-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Health</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="health"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'health']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','health') !!}

<div class="borderContainer">
    <h2 class="fieldCategory">
        Conditions
    </h2>
    <div class="profileRow">
                @foreach($serviceUserConditions as $serviceUserCondition)
                <div class="profileField profileField--c5">
                    <div class="checbox_wrap">


                        {!! Form::checkbox('serviceUserCondition['.$serviceUserCondition->id.']', null,
                        ($serviceUsersProfile->ServiceUserConditions->contains('id', $serviceUserCondition->id)? 1 : null),
                        array('placeholder'=>'1','class' => 'checkboxNew checkHealthCondition','id'=>'serviceUserCondition'.$serviceUserCondition->id)) !!}
                        <label for="serviceUserCondition{{$serviceUserCondition->id}}"><span>{{$serviceUserCondition->name}}</span></label>

                    </div>
                </div>
                @endforeach
    </div>

    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                PLEASE, GIVE DETAILS </span>
            </h2>

            {!! Form::text('other_behaviour',null,['class'=>'profileField__input','placeholder'=>'Type details','maxlength'=>"200"]) !!}
            @if ($errors->has('other_behaviour'))
                <span class="help-block"><strong>{{ $errors->first('other_behaviour') }}</strong></span>
            @endif
        </div>
    </div>

</div>


<div class="borderContainer">
    <h2 class="fieldCategory">
        Communication
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has problems understanding other people
              </span>
            </h2>
            {!! Form::select('comprehension',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('comprehension'))
                <span class="help-block"><strong>{{ $errors->first('comprehension') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->comprehension == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('comprehension_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('comprehension_detail'))
                <span class="help-block"><strong>{{ $errors->first('comprehension_detail') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has difficulties understanding or  communicating with other
              </span>
            </h2>
            {!! Form::select('communication',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('communication'))
                <span class="help-block"><strong>{{ $errors->first('communication') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->communication == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('common_communication_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('common_communication_details'))
                <span class="help-block"><strong>{{ $errors->first('common_communication_details') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help with speech
              </span>
            </h2>
            {!! Form::select('speech',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('speech'))
                <span class="help-block"><strong>{{ $errors->first('speech') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->speech == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('speech_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('speech_detail'))
                <span class="help-block"><strong>{{ $errors->first('speech_detail') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has serious impediments seeing
              </span>
            </h2>
            {!! Form::select('vision',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('vision'))
                <span class="help-block"><strong>{{ $errors->first('vision') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->vision == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('vision_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('vision_detail'))
                <span class="help-block"><strong>{{ $errors->first('vision_detail') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has serious impediments hearing
              </span>
            </h2>
            {!! Form::select('hearing',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('hearing_detail'))
                <span class="help-block"><strong>{{ $errors->first('hearing_detail') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->hearing == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('hearing_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('hearing_detail'))
                <span class="help-block"><strong>{{ $errors->first('hearing_detail') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Medication
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance in taking medication / treatments
              </span>
            </h2>
            {!! Form::select('assistance_in_medication',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_in_medication'))
                <span class="help-block"><strong>{{ $errors->first('assistance_in_medication') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_in_medication == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('in_medication_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('in_medication_detail'))
                <span class="help-block"><strong>{{ $errors->first('in_medication_detail') }}</strong></span>
            @endif
        </div>

    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Allergies
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has allergies to food / medication / anything else
              </span>
            </h2>
            {!! Form::select('have_any_allergies',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('have_any_allergies'))
                <span class="help-block"><strong>{{ $errors->first('assistance_in_medication') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->have_any_allergies == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('allergies_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('allergies_detail'))
                <span class="help-block"><strong>{{ $errors->first('allergies_detail') }}</strong></span>
            @endif
        </div>
    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        skin
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has  risk of developing pressure sores on their skin
              </span>
            </h2>
            {!! Form::select('skin_scores',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('skin_scores'))
                <span class="help-block"><strong>{{ $errors->first('skin_scores') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->skin_scores == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('skin_scores_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('skin_scores_detail'))
                <span class="help-block"><strong>{{ $errors->first('skin_scores_detail') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance with changing wound dressings
              </span>
            </h2>
            {!! Form::select('assistance_with_dressings',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_with_dressings'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_dressings') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_with_dressings == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('dressings_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('dressings_detail'))
                <span class="help-block"><strong>{{ $errors->first('dressings_detail') }}</strong></span>
            @endif
        </div>
    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        mobility
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires help with mobility  
              </span>
            </h2>

            {!! Form::select('help_with_mobility',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('help_with_mobility'))
                <span class="help-block"><strong>{{ $errors->first('help_with_mobility') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->help_with_mobility == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('common_mobility_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('common_mobility_details'))
                <span class="help-block"><strong>{{ $errors->first('common_mobility_details') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help moving around home
              </span>
            </h2>
            {!! Form::select('mobility_home',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_home'))
                <span class="help-block"><strong>{{ $errors->first('mobility_home') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->mobility_home == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('mobility_home_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_home_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_home_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help getting in / out of bed
              </span>
            </h2>

            {!! Form::select('mobility_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_bed'))
                <span class="help-block"><strong>{{ $errors->first('mobility_bed') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->mobility_bed == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('mobility_bed_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_bed_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_bed_detail') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has  a history of falls
              </span>
            </h2>
            {!! Form::select('history_of_falls',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('history_of_falls'))
                <span class="help-block"><strong>{{ $errors->first('history_of_falls') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->history_of_falls == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('falls_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('falls_detail'))
                <span class="help-block"><strong>{{ $errors->first('falls_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help going shopping, or to other local facilities / events
              </span>
            </h2>
            {!! Form::select('mobility_shopping',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_shopping'))
                <span class="help-block"><strong>{{ $errors->first('mobility_shopping') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->mobility_shopping == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('mobility_shopping_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_shopping_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_shopping_detail') }}</strong></span>
            @endif
        </div>

    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Nutrition
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance with eating / drinking
              </span>
            </h2>
            {!! Form::select('assistance_with_eating',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_with_eating'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_eating') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_with_eating == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_with_eating_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_with_eating_detail'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_eating_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Can prepare food for themselves
              </span>
            </h2>
            {!! Form::select('prepare_food',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('prepare_food'))
                <span class="help-block"><strong>{{ $errors->first('prepare_food') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->prepare_food == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('prepare_food_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('prepare_food_details'))
                <span class="help-block"><strong>{{ $errors->first('prepare_food_details') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Would  like assistance with preparing meals
              </span>
            </h2>
            {!! Form::select('assistance_with_preparing_food',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_with_preparing_food'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_preparing_food') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_with_preparing_food == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_prepare_food_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_prepare_food_details'))
                <span class="help-block"><strong>{{ $errors->first('assistance_prepare_food_details') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has special nutritional or belief based dietary requirements
              </span>
            </h2>
            {!! Form::select('dietary_requirements',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('dietary_requirements'))
                <span class="help-block"><strong>{{ $errors->first('dietary_requirements') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->dietary_requirements == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('dietary_requirements_interaction',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('dietary_requirements_interaction'))
                <span class="help-block"><strong>{{ $errors->first('dietary_requirements_interaction') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has other special dietary requirements
              </span>
            </h2>
            {!! Form::select('special_dietary_requirements',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('special_dietary_requirements'))
                <span class="help-block"><strong>{{ $errors->first('special_dietary_requirements') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->special_dietary_requirements == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('special_dietary_requirements_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('special_dietary_requirements_detail'))
                <span class="help-block"><strong>{{ $errors->first('special_dietary_requirements_detail') }}</strong></span>
            @endif
        </div>

    </div>


</div>


<div class="borderContainer">
    <h2 class="fieldCategory">
        Personal Hygiene
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance in getting dressed / bathing or toileting
              </span>
            </h2>
            {!! Form::select('assistance_with_personal_hygiene',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_with_personal_hygiene'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_personal_hygiene') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_with_personal_hygiene == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_with_personal_hygiene_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_with_personal_hygiene_detail'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_personal_hygiene_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance in choosing appropriate clothes
              </span>
            </h2>
            {!! Form::select('appropriate_clothes',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('appropriate_clothes'))
                <span class="help-block"><strong>{{ $errors->first('appropriate_clothes') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->appropriate_clothes == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('appropriate_clothes_assistance_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('appropriate_clothes_assistance_detail'))
                <span class="help-block"><strong>{{ $errors->first('appropriate_clothes_assistance_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance getting dressed / undressed
              </span>
            </h2>
            {!! Form::select('assistance_getting_dressed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_getting_dressed'))
                <span class="help-block"><strong>{{ $errors->first('assistance_getting_dressed') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_getting_dressed == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_getting_dressed_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_getting_dressed_detail'))
                <span class="help-block"><strong>{{ $errors->first('assistance_getting_dressed_detail') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance with bathing / showering
              </span>
            </h2>
            {!! Form::select('assistance_with_bathing',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('assistance_with_bathing'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_bathing') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->assistance_with_bathing == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('assistance_with_bathing_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('assistance_with_bathing_detail'))
                <span class="help-block"><strong>{{ $errors->first('assistance_with_bathing_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs  assistance managing their toilet needs
              </span>
            </h2>
            {!! Form::select('managing_toilet_needs',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('managing_toilet_needs'))
                <span class="help-block"><strong>{{ $errors->first('managing_toilet_needs') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->managing_toilet_needs == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('managing_toilet_needs_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('managing_toilet_needs_detail'))
                <span class="help-block"><strong>{{ $errors->first('managing_toilet_needs_detail') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help mobilising themselves to the toilet
              </span>
            </h2>
            {!! Form::select('mobilising_to_toilet',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobilising_to_toilet'))
                <span class="help-block"><strong>{{ $errors->first('mobilising_to_toilet') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->mobilising_to_toilet == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('mobilising_to_toilet_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('mobilising_to_toilet_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobilising_to_toilet_detail') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help cleaning themselves when using the toilet
              </span>
            </h2>
            {!! Form::select('cleaning_themselves',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('cleaning_themselves'))
                <span class="help-block"><strong>{{ $errors->first('cleaning_themselves') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->cleaning_themselves == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('cleaning_themselves_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('cleaning_themselves_detail'))
                <span class="help-block"><strong>{{ $errors->first('cleaning_themselves_detail') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has incontinence
              </span>
            </h2>
            {!! Form::select('have_incontinence',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('have_incontinence'))
                <span class="help-block"><strong>{{ $errors->first('have_incontinence') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->have_incontinence == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('kind_of_incontinence',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('kind_of_incontinence'))
                <span class="help-block"><strong>{{ $errors->first('kind_of_incontinence') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help in choosing incontinence products
              </span>
            </h2>
            {!! Form::select('choosing_incontinence_products',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('choosing_incontinence_products'))
                <span class="help-block"><strong>{{ $errors->first('choosing_incontinence_products') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->choosing_incontinence_products == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('choosing_incontinence_products_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('choosing_incontinence_products_detail'))
                <span class="help-block"><strong>{{ $errors->first('choosing_incontinence_products_detail') }}</strong></span>
            @endif
        </div>

    </div>



    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                The incontinence products are stored...    </span>
            </h2>
            {!! Form::textarea('incontinence_products_stored',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('incontinence_products_stored'))
                <span class="help-block"><strong>{{ $errors->first('incontinence_products_stored') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has own supply of incontinence wear
              </span>
            </h2>
            {!! Form::select('incontinence_wear',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select serviceUserProfile','placeholder'=>'Please select']) !!}
            @if ($errors->has('incontinence_wear'))
                <span class="help-block"><strong>{{ $errors->first('incontinence_wear') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds"{!!  $serviceUsersProfile->incontinence_wear == 'No' ? ' style="display:none"' : ''!!}>
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('incontinence_wear_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('incontinence_wear_detail'))
                <span class="help-block"><strong>{{ $errors->first('incontinence_wear_detail') }}</strong></span>
            @endif
        </div>

    </div>


</div>

{{Form::close()}}