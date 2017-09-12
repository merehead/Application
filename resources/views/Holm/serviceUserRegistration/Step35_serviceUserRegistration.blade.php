<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Wound care</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step35.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} need assistance with changing wound dressings?  <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('assistance_with_dressings',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('assistance_with_dressings'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_with_dressings') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of how many dressings, and frequency they need changing - (we will ask for more details at a later date).  <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('dressings_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('dressings_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('dressings_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <input type="hidden" name="step" value='35'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='35'>
    <input type="hidden" name="stepback" value='33'>
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