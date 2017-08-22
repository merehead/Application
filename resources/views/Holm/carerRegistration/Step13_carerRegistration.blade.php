<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Languages</h2>

            <div class="questionsBox__img">
                <img src="./dist/img/Signup_C_step13.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Which languages can you speak confidently? <span>*</span>
                    </h2>
                    <div class="registrationCheckboxes registrationCheckboxes--half">

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                            <label for="boxf1"> English</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                            <label for="boxf2"> Welsh</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                            <label for="boxf3">Sign </label>
                        </div>



                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                            <label for="boxf4"> Polish</label>
                        </div>




                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                            <label for="boxf5"> Urdu</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf6">
                            <label for="boxf6"> Hindi</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf7">
                            <label for="boxf7"> Punjabi</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf8">
                            <label for="boxf8"> Bengali</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf9">
                            <label for="boxf9"> Arabic</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf10">
                            <label for="boxf10"> Mandarin</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf11">
                            <label for="boxf11"> Cantonese</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf12">
                            <label for="boxf12"> Other</label>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel questionForm__label">
                                If other, please state
                            </h2>
                            <div class="inputWrap">
                                <input type="text" class="formInput " placeholder="Other">
                            </div>
                        </div>


                    </div>


                </div>












            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '13'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step12.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step14.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
