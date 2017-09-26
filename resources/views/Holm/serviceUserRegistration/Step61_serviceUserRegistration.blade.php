<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Multiple Carers</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step61.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} need the assistance of more than one person at a time to achieve any particular task? - eg bathing, dressing etc. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('multiple_carers',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('multiple_carers'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('multiple_carers') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give further details. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('multiple_carers_details',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('multiple_carers_details'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('multiple_carers_details') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='61'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='61'>
    <input type="hidden" name="stepback" value='59'>
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