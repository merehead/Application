<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Mobility - Bed</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step21.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}}  need help getting in / out of bed?  <span>*</span>
                    </h2>
                    <div class="inputWrap">

                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id'=>'sometimes-if','class'=>'formSelect'];
                        if (is_null($serviceUserProfile->mobility_bed))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('mobility_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('mobility_bed'))
                            <span class="help-block"><strong>{{ $errors->first('mobility_bed') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give details of what kind of help is needed.  <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('mobility_bed_detail',null,['class'=>'formArea ','placeholder'=>'Details','maxlength'=>"500"]) !!}
                        @if ($errors->has('mobility_bed_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('mobility_bed_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="step" value='21'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>
    </div>
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='21'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='21'>
    <input type="hidden" name="stepback" value='19'>
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