
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>What have we missed?</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step60.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are there any other medical conditions, disabilities, or other pieces of information not already covered which you feel may be of use? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('we_missed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('we_missed'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('we_missed') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give further details. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::textarea('we_missed_details',null,['class'=>'formArea ','placeholder'=>'Detail']) !!}
                        @if ($errors->has('we_missed_details'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('we_missed_details') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='60'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='60'>
    <input type="hidden" name="stepback" value='58'>
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