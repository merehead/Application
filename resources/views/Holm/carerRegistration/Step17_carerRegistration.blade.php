<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>PERSONAL REFERENCES</h2>
            <h3>Please could we have two work references. They must have worked with you.</h3>
            <h2>PERSON #1</h2>


            <div class="questionsBox__img">
                <img src="./dist/img/Signup_C_step17.jpg" alt="">
            </div>




        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">







                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Name <span>*</span>
                    </h2>
                    <input type="text" class="formInput " placeholder="Name">
                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Job title <span>*</span>
                    </h2>
                    <input type="text" class="formInput " placeholder="Job title">
                </div>


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Relationship <span>*</span>
                    </h2>
                    <input type="text" class="formInput " placeholder="Relationship">
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Phone <span>*</span>
                    </h2>
                    <input type="text" class="formInput " placeholder="Phone">
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Email <span>*</span>
                    </h2>
                    <input type="text" class="formInput " placeholder="Email">
                </div>

            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '17'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step16.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step18.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
