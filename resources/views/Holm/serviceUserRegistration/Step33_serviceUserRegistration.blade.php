<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Medication</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step33.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} require any assistance in taking medication / treatments? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('assistance_in_medication',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('assistance_in_medication'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_in_medication') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of how many medications / treatments, and frequency - (No need to give a full account of all the treatments now, we will contact you for more information at a later date). <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('in_medication_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('in_medication_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('in_medication_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='33'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='33'>
    <input type="hidden" name="stepback" value='31'>
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