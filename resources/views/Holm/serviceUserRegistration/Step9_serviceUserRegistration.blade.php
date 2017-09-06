<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>The Home</h2>



            <div class="questionsBox__img">
                <img src="./img/Signup_P_step9.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of building does [Service_user_name]  live in? <span>*</span>
                    </h2>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                        <label for="boxf1">Flat</label>
                    </div>
                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                        <label for="boxf2"> House</label>
                    </div>
                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                        <label for="boxf3"> Bungalow</label>
                    </div>





                </div>

            </form>
        </div>

    </div>
</div>
<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9'>
    <input type="hidden" name="stepback" value='7'>
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