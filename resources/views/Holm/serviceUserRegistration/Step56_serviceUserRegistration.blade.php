<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Beliefs</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step56.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have any political, religious or other beliefs we should be aware of? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                       {!! Form::select('religious_beliefs',['Yes'=>'Yes','No'=>'No'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                            @if ($errors->has('religious_beliefs'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('religious_beliefs') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('religious_beliefs_details',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('religious_beliefs_details'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('religious_beliefs_details') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='56'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='56'>
    <input type="hidden" name="stepback" value='54'>
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