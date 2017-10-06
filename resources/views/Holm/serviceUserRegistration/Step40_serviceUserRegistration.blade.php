<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Nutrition - Food Preparation</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step40.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Can {{$userNameForSite}} prepare food for themselves? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-noif', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->prepare_food))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('prepare_food',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('prepare_food'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('prepare_food') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimesNo_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Would {{$userNameForSite}} like assistance with preparing meals? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'main-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->assistance_with_preparing_food))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('assistance_with_preparing_food',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('assistance_with_preparing_food'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('assistance_with_preparing_food') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>
            <input type="hidden" name="step" value='40'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='40'>
    <input type="hidden" name="stepback" value='38'>
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