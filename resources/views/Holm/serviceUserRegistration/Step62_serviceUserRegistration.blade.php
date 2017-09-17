<div class="registration">
    <div class="registration__full">
        <div class="questionsBox">
            <span class="regIco regIco--success">
              <i class="fa fa-check" aria-hidden="true"></i>
            </span>
            <h2>Application Completed </h2>
        </div>
        <div class="regFinish">
            <p class="info-p info-p--roboto">
                Thank you for taking the time to complete the questionnaire.

            </p>
            <p>
              <span class="accent-p">
                <span class="accent-p__underline">Please remember to press submit before finishing! </span>
              </span>
            </p>

            <p class="info-p info-p--roboto">We'll now review all the information you have given. We may contact you to get further information if necessary, to ensure only the best carers in your area are recommended.
            </p>

            <p class="info-p info-p--roboto">We aim to help provide the best care possible, and will ask for your regular feedback to guarantee standards.  </p>
            <p class="info-p info-p--roboto">
                Press  <span class="accent-p">'Submit'</span> to finish.
            </p>
        </div>
    </div>

</div>
<div class="registrationBtns registrationBtns--center">

    <a href="{{route('ServiceUserSetting',['id'=>$serviceUserProfileID])}}" class="registrationBtns__item">
        submit
    </a>
</div>




<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='62'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='62'>
    <input type="hidden" name="stepback" value='60'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


{{--

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
--}}
