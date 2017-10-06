<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Other inhabitants</h2>


            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step13.jpg')}}" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does anyone else live with {{$serviceUserProfile->like_name}}?  <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id'=>'sometimes-if','class'=>'formSelect'];
                        if (is_null($serviceUserProfile->anyone_else_live))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('anyone_else_live',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}

                        @if ($errors->has('anyone_else_live'))
                            <span class="help-block">
                                <strong>{{ $errors->first('anyone_else_live') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give their name and relationship to {{$serviceUserProfile->like_name}}. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::text('anyone_detail',null,['class'=>'formInput ','placeholder'=>'Details','maxlength'=>"200"]) !!}
                        @if ($errors->has('anyone_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('anyone_detail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Is the other person likely to be home during care visits? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class'=>'formSelect'];
                        if (is_null($serviceUserProfile->anyone_friendly))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('anyone_friendly',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,$atrr) !!}
                    @if ($errors->has('anyone_friendly'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('anyone_friendly') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>
            <input type="hidden" name="step" value='13'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='13'>
    <input type="hidden" name="stepback" value='11'>
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