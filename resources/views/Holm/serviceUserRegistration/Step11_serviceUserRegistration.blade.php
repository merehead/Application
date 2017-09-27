<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Home safety</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step11.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Can {{$serviceUserProfile->like_name}} keep the home safe and clean by themself? <span>*</span>

                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id'=>'sometimes-noif','class'=>'formSelect'];
                        if (is_null($serviceUserProfile->home_safe))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('home_safe',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('home_safe'))
                            <span class="help-block"><strong>{{ $errors->first('home_safe') }}</strong></span>
                        @endif
                    </div>

                </div>

            <div class="formField sometimesNo_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Does {{$serviceUserProfile->like_name}} require assistance keeping the home safe and clean?
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class'=>'formSelect'];
                        if (is_null($serviceUserProfile->assistance_keeping))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('assistance_keeping',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('assistance_keeping'))
                            <span class="help-block"><strong>{{ $errors->first('assistance_keeping') }}</strong></span>
                        @endif
                    </div>

                </div>
            <input type="hidden" name="step" value='11'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='11'>
    <input type="hidden" name="stepback" value='9_1'>
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