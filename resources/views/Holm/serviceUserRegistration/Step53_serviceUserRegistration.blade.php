<script>
    $(document).ready(function() {

        $('#time_to_night_helping').timepicker({
            change: function () {
                $(this).change();
            },
            timeFormat: 'h:mm p',
            interval: 30,
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    });
</script>
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Safety</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step53.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} need assistance keeping safe at night? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->keeping_safe_at_night))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('keeping_safe_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('keeping_safe_at_night'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('keeping_safe_at_night') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of what kind of assistance. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('keeping_safe_at_night_details',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('keeping_safe_at_night_details'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('keeping_safe_at_night_details') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        What time would {{$userNameForSite}} like someone to help?
                    </h2>


                    <div class="inputWrap">
                        @if(empty($serviceUserProfile->time_to_night_helping))

                            <input name="time_to_night_helping" id="time_to_night_helping" class="profileField__input" placeholder="Time" type="text">
                        @else
                            {!! Form::text('time_to_night_helping',null,['id'=>'time_to_night_helping','class'=>'profileField__input']) !!}
                        @endif
                        <span class="inputIco personalForm__ico centeredLink">
                  <i class="fa fa-clock-o"></i>
                </span>
                            @if ($errors->has('time_to_night_helping'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('time_to_night_helping') }}</strong>
                                    </span>
                            @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='53'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='53'>
    <input type="hidden" name="stepback" value='51'>
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