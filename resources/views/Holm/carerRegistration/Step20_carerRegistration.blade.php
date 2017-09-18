<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Other questions</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step20.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Do you have any other questions?
                </h2>
                <div class="inputWrap">
                    {!! Form::select('have_questions',['Yes'=>'Yes','No'=>'No'],
null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                </div>
                @if ($errors->has('have_questions'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('have_questions') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="hiding formField" style="display: none">
                <h2 class="formLabel questionForm__label">
                    What questions do you have? We will get back to you as soon as possible with answers.
                </h2>
                <div class="inputWrap">
                    {!! Form::textarea('questions',null,['class'=>'formArea','placeholder'=>'Your text']) !!}
                </div>
                @if ($errors->has('questions'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('questions') }}</strong>
                                    </span>
                @endif
            </div>
            <input type="hidden" name="step" value='20'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
            {!! Form::close()!!}


        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step19.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step21.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '18'>
<input type="hidden" name="stepback" value = '18'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}