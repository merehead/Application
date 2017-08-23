<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>DBS - Formally called called CRB</h2>
            <h3>We consider a DBS completed within the last 12 months to be up to date for now. We will ask you to reapply for a new one in future.</h3>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step6.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
{{--            <form class="questionForm">--}}
                {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Do you have an up to date DBS? <span>*</span>
                    </h2>
                    <div class="inputWrap">
{{--                        <select class="formSelect">
                            <option value="select">Please select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>--}}
                        {!! Form::select('DBS',['1'=>'Yes','2'=>'No'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                    </div>
                </div>

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Have you used the new <a href="https://www.gov.uk/dbs-update-service" target="blank" class="underline">DBS update service</a>? <span>*</span>
                    </h2>
                    <div class="inputWrap">
{{--                        <select class="formSelect">
                            <option value="select">Please select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>--}}
                        {!! Form::select('DBS_use',['1'=>'Yes','2'=>'No'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                    </div>


                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        If yes, please could we have your personal identifier.<span>*</span>
                    </h2>

                    <div class="inputWrap">
                      {{--  <input type="text" class="formInput " placeholder="Details"></textarea>--}}
                        {!! Form::text('DBS_identifier',null,['class'=>'formInput','placeholder'=>'Details']) !!}
                    </div>


                </div>
            <input type="hidden" name="step" value = '6'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}
                <!--
                        <div class="formField formField--margin-top">
                          <div class="inputWrap">
                            <input type="text" class="formInput " placeholder="Further Details">
                          </div>
                        </div>
                     -->
           {{-- </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}

            </form>--}}
        </div>

    </div>
</div>

<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step5_2.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step7.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

