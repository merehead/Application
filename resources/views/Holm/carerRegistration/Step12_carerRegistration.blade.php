<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Pets</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step12.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are you willing to work in homes with pets? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::select('work_with_pets',['1'=>'Yes','2'=>'No','3'=>'It depends'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                    </div>


                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        If it depends, what does it depend upon? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        {!! Form::text('pets_description',null,['class'=>'formInput','placeholder'=>'Details']) !!}
                       {{-- <input type="text" class="formInput " placeholder="Details">--}}
                    </div>
                </div>
                <input type="hidden" name="step" value = '12'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close() !!}
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step11.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step13.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
