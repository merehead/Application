<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Dementia</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step18.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} have Dementia?  <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['id'=>'sometimes-if','class'=>'formSelect'];
                        if (is_null($serviceUserProfile->have_dementia))
                            $atrr['placeholder'] = 'Please select';
                        ?>
                        {!! Form::select('have_dementia',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                        @if ($errors->has('have_dementia'))
                            <span class="help-block"><strong>{{ $errors->first('have_dementia') }}</strong></span>
                        @endif

                    </div>
                </div>

                <div class="formField sometimes_hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please give more information.  <span>*</span>
                    </h2>

                    <div class="inputWrap">
                        {!! Form::textarea('dementia_detail',null,['class'=>'formArea ','placeholder'=>'Details','maxlength'=>"500"]) !!}
                        @if ($errors->has('dementia_detail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('dementia_detail') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

            <input type="hidden" name="step" value='18'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='18'>
    <input type="hidden" name="stepback" value='16'>
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