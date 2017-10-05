<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Flat information</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step9_1.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Is there a lift to the flat? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class'=>'formSelect'];
                        if (is_null($serviceUserProfile->lift_available))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('lift_available',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('lift_available'))
                            <span class="help-block"><strong>{{ $errors->first('lift_available') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="formField formField--margin-top">

                    <div class="formField">
                        <h2 class="formLabel questionForm__label">
                            What floor is the flat on? <span>*</span>
                        </h2>
                        <div class="inputWrap">
                            <?php
                            if (isset($atrr)) unset($atrr);
                            $atrr = ['class'=>'formSelect'];
                            if (is_null($serviceUserProfile->floor_id))
                                $atrr['placeholder'] = 'Please select';
                            ?>
                           {!! Form::select('floor_id',$floors,null,$atrr) !!}
                        </div>
                        @if ($errors->has('floor_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('floor_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='9_1'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9_1'>
    <input type="hidden" name="stepback" value='8'>
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