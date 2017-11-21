<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Continence</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step48.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}} have incontinence? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'step48sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->have_incontinence))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('have_incontinence',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('have_incontinence'))
                            <span class="help-block"><strong>{{ $errors->first('have_incontinence') }}</strong></span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding_step48" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please briefly describe what kind of incontinence. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('kind_of_incontinence',null,['class'=>'formArea','placeholder'=>'Detail','maxlength'=>"250",'style'=>'resize:none;overflow-x: hidden;']) !!}
                        @if ($errors->has('kind_of_incontinence'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('kind_of_incontinence') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding_step48" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}}  have   {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'your':'their'}} own supply of incontinence wear? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'step48sometimes-if2', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->incontinence_wear))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('incontinence_wear',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('incontinence_wear'))
                            <span class="help-block"><strong>{{ $errors->first('incontinence_wear') }}</strong></span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding2_step48-1" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Where are the incontinence products stored? <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('incontinence_products_stored',null,['class'=>'formArea ','placeholder'=>'Detail','maxlength'=>"250"]) !!}
                        @if ($errors->has('incontinence_products_stored'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('incontinence_products_stored') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="formField sometimes_hiding2_step48-2" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Would   {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'you':$userNameForSite}}  like help in choosing incontinence products?
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class' => 'formSelect'];
                        if (is_null($serviceUserProfile->choosing_incontinence_products))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('choosing_incontinence_products',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('choosing_incontinence_products'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('choosing_incontinence_products') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <input type="hidden" name="step" value='48'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='48'>
    <input type="hidden" name="stepback" value='46'>
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