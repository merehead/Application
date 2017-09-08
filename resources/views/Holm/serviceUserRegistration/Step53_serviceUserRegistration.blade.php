<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Safety</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step53.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does [Service_user_name] need assistance keeping safe at night? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">

                            <option value="select">Please select</option>

                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="normally">Sometimes</option>
                        </select>
                    </div>
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please give details of what kind of assistance. <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <textarea class="formArea" placeholder="Details"></textarea>
                    </div>
                </div>

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What time would [Service_user_name] like someone to help?
                    </h2>


                    <div class="inputWrap">
                        <input type="text" disabled="" class="formInput personalForm__input" placeholder="Time">
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
    <input type="hidden" name="step" value='53'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='53'>
    <input type="hidden" name="stepback" value='51'>
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