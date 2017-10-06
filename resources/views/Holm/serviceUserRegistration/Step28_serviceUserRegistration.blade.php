<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Comprehension</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step28.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

            <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} sometimes have problems understanding other people? <span>*</span>       </h2>
                    <div class="inputWrap">
                        <?php if (isset($atrr)) unset($atrr);
                        $atrr = ['id' => 'sometimes-if', 'class' => 'formSelect'];
                        if (is_null($serviceUserProfile->comprehension)) $atrr['placeholder'] = 'Please select';?>
                        {!! Form::select('comprehension',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                        @if ($errors->has('comprehension'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('comprehension') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give further details of what kind of help is needed. <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('comprehension_detail',null,['class'=>'formArea ','placeholder'=>'Details','maxlength'=>"500"]) !!}
                        @if ($errors->has('comprehension_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('comprehension_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="step" value='28'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='28'>
    <input type="hidden" name="stepback" value='26'>
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