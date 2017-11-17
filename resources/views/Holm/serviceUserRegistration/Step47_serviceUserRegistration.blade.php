
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Toilet</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step47.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}}  need any assistance managing {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'your':'their'}} toilet needs? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->managing_toilet_needs))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('managing_toilet_needs',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('managing_toilet_needs'))
                            <span class="help-block"><strong>{{ $errors->first('managing_toilet_needs') }}</strong></span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}}  need help mobilising {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'yourself':'themselves'}} to the toilet? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class' => 'formSelect'];
                        if (is_null($serviceUserProfile->mobilising_to_toilet))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('mobilising_to_toilet',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('mobilising_to_toilet'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('mobilising_to_toilet') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}} need help cleaning {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'yourself':'themselves'}} when using the toilet? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class' => 'formSelect'];
                        if (is_null($serviceUserProfile->cleaning_themselves))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('cleaning_themselves',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('cleaning_themselves'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('cleaning_themselves') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='47'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='47'>
    <input type="hidden" name="stepback" value='45'>
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