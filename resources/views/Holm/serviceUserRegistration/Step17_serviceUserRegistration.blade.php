<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>[Service_user_name]'s Health</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_P_step17.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does [Service_user_name] have any of the following conditions?
                    </h2>
                    <div class="inputWrap">

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                            <label for="boxf1"> Blindness  / Serious visual impairment</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                            <label for="boxf2"> Deafness / Serious hearing impairment</label>
                        </div>

                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                            <label for="boxf3">Physical disabilities which require mobility aids </label>
                        </div>



                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                            <label for="boxf4"> Mental / Psychological conditions</label>
                        </div>




                        <div class="checkBox_item">
                            <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                            <label for="boxf5"> Long Term Medical Conditions</label>
                        </div>




                    </div>


                </div>


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please give details of all the conditions mentioned above (if any).
                    </h2>

                    <div class="inputWrap">
                        <textarea class="formArea" placeholder="Details"></textarea>
                    </div>


                </div>









            </form>
        </div>

    </div>
</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='17'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='17'>
    <input type="hidden" name="stepback" value='15'>
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