<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Falls</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step20.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does [Service_user_name] have a history of falls? - i.e. falls more than once a week, or has been in hospital as a consequence of a fall.  <span>*</span>

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
                        Please give details of what measures are taken to prevent future falls, and any known past injuries.  <span>*</span>
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
    <input type="hidden" name="step" value='20'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='20'>
    <input type="hidden" name="stepback" value='18'>
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