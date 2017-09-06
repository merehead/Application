<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2> Assistance</h2>

            <div class="questionsBox__img">
                <img src="./img/Signup_P_step5_1.jpg" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of assistance is [Service_user_name] looking to purchase? (you can select as many as you like)<span>*</span>
                    </h2>
                    <!--
                                <div class="checkBox_item">
                                  <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                                  <label for="boxf1"> Single / Regular visits</label>
                                </div>
                                <div class="checkBox_item">
                                  <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                                  <label for="boxf2"> Live in care</label>
                                </div>
                                <div class="checkBox_item">
                                  <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                                  <label for="boxf3"> Respite care</label>
                                </div>
                -->
                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                        <label for="boxf3">PERSONAL CARE </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                        <label for="boxf4"> DEMENTIA CARE</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                        <label for="boxf5">HOUSEKEEPING </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf6">
                        <label for="boxf6"> FOOD / NUTRITION</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf8">
                        <label for="boxf8">DRESSINGS AND WOUND MANAGEMENT
                        </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf9">
                        <label for="boxf9"> COMPANIONSHIP</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf10">
                        <label for="boxf10"> TRAVEL / VISITS / EXCURSIONS</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf11">
                        <label for="boxf11">MEDICATION / TREATMENTS </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf12">
                        <label for="boxf12"> MOBILITY</label>
                    </div>



                </div>

            </form>
        </div>

    </div>
</div>



<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='5_1'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='5_1'>
    <input type="hidden" name="stepback" value='4_1_2_4'>
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