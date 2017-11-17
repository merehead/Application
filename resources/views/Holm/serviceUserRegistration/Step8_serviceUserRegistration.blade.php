<div class="registration">
    <div class="registration__full">
        <div class="questionsBox">


            <h2>Registration Questionnaire </h2>
        </div>
        <div class="sorryBox">

            <p class="info-p info-p--roboto">
                Your answers will help the Carer better understand {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'are you':$userNameForSite."'s'"}} needs, in order to provide better care.<br> </br>
                You will only need to answer these questions once {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'':"about ".$userNameForSite}}. You can edit {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'your':"their "}} details in {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'your':"their "}} private profile page if you need to later.
            </p>
        </div>


    </div>

</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='8'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='8'>
    <input type="hidden" name="stepback" value='6'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouSrvUser',[$serviceUserProfileID])}}" class="registrationBtns__item registrationBtns__item--later">
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