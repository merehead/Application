<div class="thank">
    <h2 class="thank__title">
        You only have to fill in this information once
    </h2>
    <p class="info-p">
        It is so the carer has all the information to provide great care. Your information will be saved, and you can carry on later from where you left off if you have to stop. Please press 'submit' at the end to finish.

    </p>
    <p >
        WE ARE WORKING HARD TO HELP OLDER PEOPLE TO RECEIVE THE BEST CARE POSSIBLE.

    </p>
    <p >
        Press 'Start' to proceed'

    </p>

</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '4_1_2_4'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>
<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='4_1_2_4'>
    <input type="hidden" name="stepback" value='4_1_2_1'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();">
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

