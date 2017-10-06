<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Nutrition - Food Preparation</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step17.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have any preferences of food? eg. Are there any do's and don'ts? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->preferences_of_food))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('preferences_of_food',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('preferences_of_food'))
                            <span class="help-block"><strong>{{ $errors->first('preferences_of_food') }}</strong></span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please mention what requirements (we will contact you for greater detail at a later date). <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('preferences_of_food_requirements',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('preferences_of_food_requirements'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('preferences_of_food_requirements') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="step" value='40_1'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='40_1'>
    <input type="hidden" name="stepback" value='39'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouSrvUser',[$serviceUserProfileID])}}" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>


    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>