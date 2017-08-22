<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Criminal record check</h2>


            <div class="questionsBox__img">
                <img src="./dist/img/Signup_C_step5.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Do you have any criminal convictions?<span>*</span>
                    </h2>



                    <div class="inputWrap">
                        <select class="formSelect">
                            <option value="select">Please select</option>
                            <option value="yes1">Yes, but they are very old, and for a minor offence.</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>


                </div>
                <!--
                        <div class="formField formField--margin-top">
                          <div class="inputWrap">
                            <input type="text" class="formInput " placeholder="Further Details">
                          </div>
                        </div>
                     -->
            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '5'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step4.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step5_1.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>