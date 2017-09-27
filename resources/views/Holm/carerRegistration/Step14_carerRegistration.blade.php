<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Work</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step14.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Are you able to work legally in the UK?<span>*</span>
                </h2>
                <div class="inputWrap">
                    <?php
                    if (isset($atrr)) unset($atrr);
                    $atrr = ['class'=>'formSelect','id'=>'main-if2'];
                    if (is_null($carersProfile->work_UK))
                        $atrr['placeholder'] = 'Please select';
                    ?>
                    {!! Form::select('work_UK',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                </div>

                @if ($errors->has('work_UK'))
                    <span class="help-block"><strong>{{ $errors->first('work_UK') }}</strong></span>
                @endif
            </div>

            <div class="formField hiding2" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Are there any restrictions on you working in the UK?<span>*</span>
                </h2>
                <div class="inputWrap">
                    <?php
                    if (isset($atrr)) unset($atrr);
                    $atrr = ['class'=>'formSelect','id'=>'main-if'];
                    if (is_null($carersProfile->work_UK_restriction))
                        $atrr['placeholder'] = 'Please select';
                    ?>
                    {!! Form::select('work_UK_restriction',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                </div>
                @if ($errors->has('work_UK_restriction'))
                    <span class="help-block">
                        <strong>{{ $errors->first('work_UK_restriction') }}</strong>
                    </span>
                @endif

            </div>


            <div class="hiding formField" style="display: none">
                <h2 class="formLabel questionForm__label">
                    What restrictions are there? <span>*</span>
                </h2>
                <div class="inputWrap">
                    {!! Form::text('work_UK_description',null,['class'=>'formInput','placeholder'=>'Details','maxlength'=>"250"]) !!}
                </div>
                @if ($errors->has('work_UK_description'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('work_UK_description') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="formField hiding2" style="display: none">
                <h2 class="formLabel questionForm__label">
                    What is your National Insurance Number?
                </h2>
                <div class="inputWrap">
                    {!! Form::text('national_insurance_number',null,['class'=>'formInput','placeholder'=>'Insurance number','maxlength'=>"120"]) !!}
                </div>
                @if ($errors->has('national_insurance_number'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('national_insurance_number') }}</strong>
                                    </span>
                @endif

            </div>


            <input type="hidden" name="step" value='14'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>

            {!! Form::close()!!}
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step13.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step14_1.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value='12'>
<input type="hidden" name="stepback" value='12'>
<input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
{!! Form::close()!!}

