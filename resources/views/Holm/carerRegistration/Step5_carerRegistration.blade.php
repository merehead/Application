<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Criminal record check</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step5.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">

                {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Do you have any criminal convictions?<span>*</span>
                    </h2>



                    <div class="inputWrap">
{{--                        <select class="formSelect">
                            <option value="select">Please select</option>
                            <option value="yes1">Yes, but they are very old, and for a minor offence.</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>--}}
                        {!! Form::select('criminal_conviction',['Some'=>'Yes, but they are very old, and for a minor offence.','Yes'=>'Yes','No'=>'No'],
null,['class'=>'formInput personalForm__input','placeholder'=>'Please select']) !!}
                    </div>

                    @if ($errors->has('criminal_conviction'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('criminal_conviction') }}</strong>
                                    </span>
                    @endif
                </div>
                <!--
                        <div class="formField formField--margin-top">
                          <div class="inputWrap">
                            <input type="text" class="formInput " placeholder="Further Details">
                          </div>
                        </div>
                     -->
            <input type="hidden" name="step" value = '5'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
                {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="\" class="registrationBtns__item registrationBtns__item--later">
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

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '3'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}