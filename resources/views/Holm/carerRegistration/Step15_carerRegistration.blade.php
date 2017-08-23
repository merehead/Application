
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Personal Profile</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step15.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please write a couple of sentences about yourself and your experience. This will be used as part of your profile which clients will see. No more than 150 words. <span>*</span>
                    </h2>
                    {!! Form::textarea('work_UK_description',null,['class'=>'formArea','placeholder'=>'Your text']) !!}
                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please write a short sentence about yourself which sums you up. This will be the first thing clients see. <span>*</span>
                    </h2>
                    {!! Form::text('description_yourself',null,['class'=>'formInput','placeholder'=>'Details']) !!}
                </div>


                <input type="hidden" name="step" value = '15'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>

                {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step14_1.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
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