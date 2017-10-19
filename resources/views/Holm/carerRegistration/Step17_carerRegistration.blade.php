<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>PERSONAL REFERENCES</h2>
            <h3>Please could we have two work references. They must have worked with you.</h3>
            <h2>PERSON #1</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step17.jpg" alt="">
            </div>


        </div>

    </div>


{{--    {{dd($carersProfile->CarerReferences->shift())}}--}}

    <div class="registration__column  registration__column--bg">
        <div class="personal">

            <?php $carerReference = $carersProfile->CarerReferences->shift(); ?>

            {!! Form::model($carerReference,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <input type="hidden" name="id" value='{{isset($carerReference->id) ? $carerReference->id : '0'}}'>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Name <span>*</span>
                </h2>
                {!! Form::text('name',null,['class'=>'formInput','placeholder'=>'Name','maxlength'=>"60"]) !!}
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Job title <span>*</span>
                </h2>
                {!! Form::text('job_title',null,['class'=>'formInput','placeholder'=>'Job title','maxlength'=>"60"]) !!}
                @if ($errors->has('job_title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Relationship <span>*</span>
                </h2>
                {!! Form::text('relationship',null,['class'=>'formInput','placeholder'=>'Relationship','maxlength'=>"60"]) !!}
                @if ($errors->has('relationship'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('relationship') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Phone number<span>*</span>
                </h2>
                {!! Form::text('phone',null,['class'=>'formInput digitFilter0','placeholder'=>'Phone number','maxlength'=>"11"]) !!}
                @if ($errors->has('phone'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Email <span>*</span>
                </h2>

                {!! Form::text('email',null,['class'=>'formInput','placeholder'=>'Email','maxlength'=>"60"]) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <input type="hidden" name="step" value='17'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step16.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYou')}}" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step18.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '15'>
<input type="hidden" name="stepback" value = '15'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
