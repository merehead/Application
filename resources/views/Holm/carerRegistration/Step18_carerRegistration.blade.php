<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>PERSONAL REFERENCES</h2>
            <h3>Please could we have two work references. They must have worked with you.</h3>
            <h2>PERSON #2</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_C_step18.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Name <span>*</span>
                </h2>
                {!! Form::text('name',null,['class'=>'formInput','placeholder'=>'Name']) !!}
            </div>


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Job title <span>*</span>
                </h2>
                {!! Form::text('job_title',null,['class'=>'formInput','placeholder'=>'Job title']) !!}
            </div>


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Relationship <span>*</span>
                </h2>
                {!! Form::text('relationship',null,['class'=>'formInput','placeholder'=>'Relationship']) !!}
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Phone <span>*</span>
                </h2>
                {!! Form::text('phone',null,['class'=>'formInput','placeholder'=>'Phone']) !!}
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Email <span>*</span>
                </h2>

                {!! Form::text('email',null,['class'=>'formInput','placeholder'=>'Email']) !!}
            </div>
            <input type="hidden" name="step" value='18'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step17.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step19.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>