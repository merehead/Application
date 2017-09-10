<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Health - Other</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step36.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have any other medical conditions we should be aware of? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('other_medical_conditions',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('other_medical_conditions'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('other_medical_conditions') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please give further details. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('other_medical_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('other_medical_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('other_medical_detail') }}</strong>
                                    </span>
                        @endif   </div>
                </div>
            <input type="hidden" name="step" value='36'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


{{--
<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='36'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>
--}}

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='36'>
    <input type="hidden" name="stepback" value='34'>
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