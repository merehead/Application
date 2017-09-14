<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Pets</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step12.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$serviceUserProfile->like_name}} own any pets? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('own_pets',['Yes'=>'Yes','No'=>'No'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}

                    @if ($errors->has('own_pets'))
                        <span class="help-block">
                                <strong>{{ $errors->first('own_pets') }}</strong>
                                    </span>
                    @endif
                    </div>
                </div>
                <div class="formField hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::text('pet_detail',null,['class'=>'formInput ','placeholder'=>'Details']) !!}
                        @if ($errors->has('pet_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('pet_detail') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="formField hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Are the pets friendly with strangers?  <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('pet_friendly',['Yes'=>'Yes','No'=>'No','Normally'=>'Normally','Sometimes'=>'Sometimes'],null,['class'=>'formSelect ','placeholder'=>'Please select']) !!}
                        @if ($errors->has('pet_friendly'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('pet_friendly') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='12'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='12'>
    <input type="hidden" name="stepback" value='10'>
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