<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Nutrition - Allergies</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step37.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Does {{$userNameForSite}} have any food / drink allergies? <span>*</span>
                </h2>
                <div class="inputWrap">
                    {!! Form::select('food_allergies',['Yes'=>'Yes','No'=>'No'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                    @if ($errors->has('food_allergies'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('food_allergies') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="formField sometimes_hiding" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Please give details. <span>*</span>
                </h2>

                <div class="inputWrap">
                    {!! Form::textarea('food_allergies_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                    @if ($errors->has('food_allergies_detail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('food_allergies_detail') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="step" value='37'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='37'>
    <input type="hidden" name="stepback" value='35'>
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