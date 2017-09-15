<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Health and Wellbeing</h2>
            <h3>We need to understand some matters about {{$userNameForSite}}’s health and wellbeing.</h3>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step32.jpg')}}" alt="">
            </div>
        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What long term health conditions does {{$userNameForSite}} have? - (There is no need to give long descriptions. We will ask for more information at a later date.)
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('long_term_conditions',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('long_term_conditions'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('long_term_conditions') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have any allergies to food / medication / anything else? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('have_any_allergies',['Yes'=>'Yes','No'=>'No'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('have_any_allergies'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('have_any_allergies') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of any allergies. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('allergies_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('allergies_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('allergies_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='32'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='32'>
    <input type="hidden" name="stepback" value='30'>
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