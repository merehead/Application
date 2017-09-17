<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Social</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step30.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have regular social interaction with friends / family?
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('social_interaction',['Yes'=>'Yes','No'=>'No'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('social_interaction'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('social_interaction') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Would {{$userNameForSite}} like someone to visit regularly for companionship?
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('visit_for_companionship',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('visit_for_companionship'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('visit_for_companionship') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='30'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>

</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='30'>
    <input type="hidden" name="stepback" value='28'>
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