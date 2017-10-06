<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>The Home</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step9.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of building does {{$serviceUserProfile->like_name}}  live in? <span>*</span>
                    </h2>

                    <div class="checkBox_item">
                    {{ Form::radio('kind_of_building', 'FLAT',false,['class'=>'radio','id'=>'radio1']) }}
                        <label for="radio1"><span> FLAT</span></label>
                    </div>
                    <div class="checkBox_item">
                        {{ Form::radio('kind_of_building', 'HOUSE',false,['class'=>'radio','id'=>'radio2']) }}
                        <label for="radio2"><span> HOUSE </span></label>
                    </div>
                    <div class="checkBox_item">
                        {{ Form::radio('kind_of_building', 'BUNGALOW',false,['class'=>'radio','id'=>'radio3']) }}
                        <label for="radio3"><span> BUNGALOW </span></label>
                    </div>
                    @if ($errors->has('kind_of_building'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('kind_of_building') }}</strong>
                                    </span>
                    @endif
                </div>
            <input type="hidden" name="step" value='9'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9'>
    <input type="hidden" name="stepback" value='7'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouSrvUser',[$serviceUserProfileID])}}" class="registrationBtns__item registrationBtns__item--later">
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