<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Pets</h2>


            <div class="questionsBox__img">
                <img src="./dist/img/Signup_C_step12.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">





                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are you willing to work in homes with pets? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">


                            <option value="select">Please select</option>



                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="it_depends">It depends</option>
                        </select>
                    </div>


                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        If it depends, what does it depend upon? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <input type="text" class="formInput " placeholder="Details">
                    </div>
                </div>

            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '12'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>
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
