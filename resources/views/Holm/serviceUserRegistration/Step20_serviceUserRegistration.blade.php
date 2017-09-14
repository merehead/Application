<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Falls</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step20.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}}  have a history of falls? - i.e. falls more than once a week, or has been in hospital as a consequence of a fall.  <span>*</span>

                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('history_of_falls',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['id'=>'sometimes-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                        @if ($errors->has('history_of_falls'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('history_of_falls') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of what measures are taken to prevent future falls, and any known past injuries.  <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('falls_detail',null,['class'=>'formArea ','placeholder'=>'Details']) !!}
                        @if ($errors->has('falls_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('falls_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='20'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='20'>
    <input type="hidden" name="stepback" value='18'>
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