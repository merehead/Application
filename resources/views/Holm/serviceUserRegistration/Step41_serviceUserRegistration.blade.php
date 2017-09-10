<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Nutrition - Eating / Drinking</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step41.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} require assistance with eating / drinking? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('assistance_with_eating',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('assistance_with_eating'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_with_eating') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please briefly explain what assistance is needed - (we will contact you for greater detail at a later date). <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('assistance_with_eating_detail',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('assistance_with_eating_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_with_eating_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='41'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

{{--

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='41'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>
--}}

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='41'>
    <input type="hidden" name="stepback" value='40'>
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