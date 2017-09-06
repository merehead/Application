<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Start when?</h2>

            <div class="questionsBox__img">
                <img src="./dist/img/Signup_P_step7.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">

        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        When would [Service_user_name] like someone to start? (Must be a minimum of 3 days notice)
                        <span>*</span>
                    </h2>


                    <div class="inputWrap">
                        <input type="text" disabled="" class="formInput personalForm__input"
                               placeholder="Start date">
                        <span class="inputIco personalForm__ico centeredLink">
                  <i class="fa fa-calendar"></i>
                </span>
                    </div>
                </div>


            </form>


        </div>


    </div>
</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='7'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='7'>
    <input type="hidden" name="stepback" value='5_1'>
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
