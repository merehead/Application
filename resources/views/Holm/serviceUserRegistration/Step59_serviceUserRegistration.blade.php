<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Interests</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step59.jpg')}}" alt="">
            </div>
        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Does {{$userNameForSite}} have any interests or hobbies which they enjoy? <span>*</span>
                </h2>
                <div class="inputWrap">
                    {!! Form::select('interests_hobbies',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                    @if ($errors->has('interests_hobbies'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('interests_hobbies') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Please give further details. <span>*</span>
                </h2>
                <div class="inputWrap">
                {!! Form::textarea('interests_hobbies_details',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                @if ($errors->has('interests_hobbies_details'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('interests_hobbies_details') }}</strong>
                                    </span>
                @endif
                </div>
            </div>
        </div>
        <input type="hidden" name="step" value='59'>
        <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
        {!! Form::close()!!}
    </div>

</div>
{{--
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='59'>
    <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
</form>
--}}

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='59'>
    <input type="hidden" name="stepback" value='57'>
    <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
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