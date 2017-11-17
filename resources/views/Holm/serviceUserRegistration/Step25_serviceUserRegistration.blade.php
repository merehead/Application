<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Vision</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step25.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'Do you':'Does '.$userNameForSite}}  have serious impediments seeing? <span>*</span></h2>
                <div class="inputWrap">
                    <?php
                    if (isset($atrr)) unset($atrr);
                    $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                    if (is_null($serviceUserProfile->vision))
                        $atrr['placeholder'] = 'Please select';
                    ?>
                    {!! Form::select('vision',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                    @if ($errors->has('vision'))
                        <span class="help-block"><strong>{{ $errors->first('vision') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="formField sometimes_hiding" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Please give further details of what kind of help is needed. <span>*</span>
                </h2>

                <div class="inputWrap">
                    {!! Form::textarea('vision_detail',null,['class'=>'formArea ','placeholder'=>'Details','maxlength'=>"500"]) !!}
                    @if ($errors->has('vision_detail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('vision_detail') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="step" value='25'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='25'>
    <input type="hidden" name="stepback" value='23'>
    <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
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