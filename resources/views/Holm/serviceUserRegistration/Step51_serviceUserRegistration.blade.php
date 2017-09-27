<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Consent</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step51.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have a doctor's note or court order saying that they are not able to give consent? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->consent))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('consent',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('consent'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('consent') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give further details. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('consent_details',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('consent_details'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('consent_details') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <input type="hidden" name="step" value='51'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='51'>
    <input type="hidden" name="stepback" value='49'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
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