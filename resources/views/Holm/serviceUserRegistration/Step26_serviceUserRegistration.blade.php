<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Hearing</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step26.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have serious impediments hearing? <span>*</span>         </h2>
                    <div class="inputWrap">
                        {!! Form::select('hearing',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('hearing'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('hearing') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give further details of what kind of help is needed. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('hearing_detail',null,['class'=>'formArea ','placeholder'=>'Details']) !!}
                        @if ($errors->has('hearing_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('hearing_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="step" value='26'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='26'>
    <input type="hidden" name="stepback" value='24'>
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