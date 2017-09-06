<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Times</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_P_step6.jpg" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        When would [Service_user_name] like someone to help?  <span>*</span>
                    </h2>
                    <div class="registrationCheckboxes registrationCheckboxes--single">
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf25">
                            <label for="boxf25"> ALL THE TIME</label>
                        </div>
                    </div>
                    <div class="registrationCheckboxes">

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                            <label for="boxf1"> EVERY MORNING</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                            <label for="boxf2"> EVERY AFTERNOON</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                            <label for="boxf3"> EVERY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                            <label for="boxf4"> MONDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                            <label for="boxf5">MONDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf6">
                            <label for="boxf6">MONDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf7">
                            <label for="boxf7">TUESDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf8">
                            <label for="boxf8">TUESDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf9">
                            <label for="boxf9">TUESDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf10">
                            <label for="boxf10">WEDNESDAY MORNING</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf11">
                            <label for="boxf11">WEDNESDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf12">
                            <label for="boxf12">WEDNESDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf13">
                            <label for="boxf13">THURSDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf14">
                            <label for="boxf14">THURSDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf15">
                            <label for="boxf15">THURSDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf16">
                            <label for="boxf16">FRIDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf17">
                            <label for="boxf17">FRIDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf18">
                            <label for="boxf18">FRIDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf19">
                            <label for="boxf19">SATURDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf20">
                            <label for="boxf20">SATURDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf21">
                            <label for="boxf21">SATURDAY NIGHT</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf22">
                            <label for="boxf22">SUNDAY MORNING</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf23">
                            <label for="boxf23">SUNDAY AFTERNOON</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf24">
                            <label for="boxf24">SUNDAY NIGHT</label>
                        </div>
                    </div>





                </div>

            </form>
        </div>

    </div>
</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='6'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='6'>
    <input type="hidden" name="stepback" value='5'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
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