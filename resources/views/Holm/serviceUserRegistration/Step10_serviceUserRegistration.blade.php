<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Home mobility safety</h2>

            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step10.jpg')}}" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Can {{$serviceUserProfile->like_name}} move around home safely by themselves? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('move_available',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('move_available'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_keeping') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$serviceUserProfile->like_name}}  require assistance moving around home?
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('assistance_moving',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('assistance_moving'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_moving') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='10'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='10'>
    <input type="hidden" name="stepback" value='9'>
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