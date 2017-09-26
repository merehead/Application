
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Personal Profile</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step15.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please write a couple of sentences about yourself and your experience. This will be used as part of your profile which clients will see. No more than 600 symbols. <span>*</span>
                    </h2>
                    {!! Form::textarea('description_yourself',null,['class'=>'formArea','placeholder'=>'Your text','maxlength'=>'600']) !!}
                    @if ($errors->has('description_yourself'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description_yourself') }}</strong>
                                    </span>
                    @endif
                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please write a short sentence about yourself which sums you up. This will be the first thing clients see. <span>*</span>
                    </h2>
                    {!! Form::text('sentence_yourself',null,['class'=>'formInput','placeholder'=>'Details','maxlength'=>"200"]) !!}
                    @if ($errors->has('sentence_yourself'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('sentence_yourself') }}</strong>
                                    </span>
                    @endif
                </div>


                <input type="hidden" name="step" value = '15'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>

                {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step14_1.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step16.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '14'>
<input type="hidden" name="stepback" value = '14'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}