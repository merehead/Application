<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Nutrition - Food Preparation</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step17.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does [Service_user_name] have any preferences of food? eg. Are there any do's and don'ts? <span>*</span>
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
                        Please mention what requirements (we will contact you for greater detail at a later date). <span>*</span>
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
    <input type="hidden" name="step" value='40_1'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='40_1'>
    <input type="hidden" name="stepback" value='39'>
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