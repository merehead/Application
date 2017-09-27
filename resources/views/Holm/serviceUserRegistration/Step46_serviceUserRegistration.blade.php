<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Bathing</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step46.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} need assistance with bathing / showering? <span>*</span>
                    </h2>
                    <div class="inputWrap">

                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->assistance_with_bathing))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('assistance_with_bathing',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('assistance_with_bathing'))
                            <span class="help-block"><strong>{{ $errors->first('assistance_with_bathing') }}</strong></span>
                        @endif
                    </div>

                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        How many times a week? <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'main-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->bathing_times_per_week))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('bathing_times_per_week',
                        ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
                        '12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20'],
                        null,$atrr) !!}
                        @if ($errors->has('bathing_times_per_week'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bathing_times_per_week') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
            <input type="hidden" name="step" value='46'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>



<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='46'>
    <input type="hidden" name="stepback" value='44'>
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