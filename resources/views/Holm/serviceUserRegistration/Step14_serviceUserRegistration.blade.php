<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Entry</h2>


            <h3>This information will only be given to a carer after you have confirmed a booking with them.</h3>




            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step14.jpg')}}" alt="">
            </div>




        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        How should the carer enter {{$serviceUserProfile->like_name}}’s home? Eg knock/ring and {{$serviceUserProfile->like_name}} will allow them in, need to collect keys from another location, keys kept in a safe place outside the home.
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('carer_enter',null,['class'=>'formArea ','placeholder'=>'Details']) !!}
                        @if ($errors->has('carer_enter'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('carer_enter') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>
            <input type="hidden" name="step" value='14'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

{{--
<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='14'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>--}}

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='14'>
    <input type="hidden" name="stepback" value='12'>
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