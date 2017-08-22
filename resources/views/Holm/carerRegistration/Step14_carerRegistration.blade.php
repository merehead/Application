
<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Work</h2>


            <div class="questionsBox__img">
                <img src="./dist/img/Signup_C_step14.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">





                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are you able to work legally in the UK?<span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">


                            <option value="select">Please select</option>



                            <option value="yes">Yes</option>
                            <option value="no">No</option>

                        </select>
                    </div>


                </div>

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are there any restrictions on you working in the UK?<span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">


                            <option value="select">Please select</option>



                            <option value="yes">Yes</option>
                            <option value="no">No</option>

                        </select>
                    </div>


                </div>




                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        If yes, what restrictions are there? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <input type="text" class="formInput " placeholder="Details">
                    </div>
                </div>

            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '14'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step13.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step14_1.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

