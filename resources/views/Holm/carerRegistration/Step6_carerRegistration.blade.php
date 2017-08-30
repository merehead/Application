<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>DBS - Formally called CRB</h2>
            <h3>We consider a DBS completed within the last 12 months to be up to date for now. We will ask you to
                reapply for a new one in future.</h3>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step6.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">

            {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Do you have an up to date DBS? <span>*</span>
                </h2>
                <div class="inputWrap">

                    {!! Form::select('DBS',['1'=>'Yes','2'=>'No'],null,['id'=>'main-if','class'=>'formSelect','placeholder'=>'Please select']) !!}
                </div>
                @if ($errors->has('DBS'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Have you used the new <a href="https://www.gov.uk/dbs-update-service" target="blank"
                                             class="underline">DBS update service</a>? <span>*</span>
                </h2>
                <div class="inputWrap">

                    {!! Form::select('DBS_use',['1'=>'Yes','2'=>'No'],null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                </div>
                @if ($errors->has('DBS_use'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS_use') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="formField hiding" style="display: none">
                <h2 class="formLabel questionForm__label">
                    If yes, please could we have your personal identifier.<span>*</span>
                </h2>

                <div class="inputWrap">

                    {!! Form::text('DBS_identifier',null,['class'=>'formInput','placeholder'=>'Details']) !!}
                </div>
                @if ($errors->has('DBS_identifier'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS_identifier') }}</strong>
                                    </span>
                @endif
            </div>
            <input type="hidden" name="step" value='6'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>

<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back3" class="registrationBtns__item registrationBtns__item--back"
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
<input type="hidden" name="step" value = '4'>
<input type="hidden" name="stepback" value = '4'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
