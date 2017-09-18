<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Night-time</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step52.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have problems getting dressed for bed? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('getting_dressed_for_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('getting_dressed_for_bed'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('getting_dressed_for_bed') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Would {{$userNameForSite}} like help getting ready for bed?
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('getting_ready_for_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('getting_ready_for_bed'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('getting_ready_for_bed') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        What time would {{$userNameForSite}} like someone to come and help?
                    </h2>


                    <div class="inputWrap">
                        @if(empty($serviceUserProfile->time_to_bed))
                            <input name="time_to_bed" id="timepicker" class="profileField__input" placeholder="Time" type="text">
                        @else
                            {!! Form::text('time_to_bed',null,['id'=>'timepicker','class'=>'profileField__input']) !!}
                        @endif
                        {{--<input type="text" disabled="" class="formInput personalForm__input" placeholder="Time">--}}
                        <span class="inputIco personalForm__ico centeredLink">
                  <i class="fa fa-calendar"></i>
                </span>

                    </div>

                @if ($errors->has('time_to_bed'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('time_to_bed') }}</strong>
                                    </span>
                @endif
                </div>

            <input type="hidden" name="step" value='52'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='52'>
    <input type="hidden" name="stepback" value='50'>
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