<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Mobility - Home</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step22.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Does {{$userNameForSite}} need help moving around home? <span>*</span>
                </h2>
                <div class="inputWrap">
                    <div class="inputWrap">
                        {!! Form::select('mobility_home',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('mobility_home'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('mobility_home') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Please give details of what type of help is needed. <span>*</span>
                </h2>

                <div class="inputWrap">
                    {!! Form::textarea('mobility_home_detail',null,['class'=>'formArea ','placeholder'=>'Details']) !!}
                    @if ($errors->has('mobility_home_detail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('mobility_home_detail') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="step" value='22'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


{{--<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='22'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>--}}

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='22'>
    <input type="hidden" name="stepback" value='20'>
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