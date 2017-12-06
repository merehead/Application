<div class="registration">
    <div class="registration__full">
        <div class="questionsBox">


            <h2>Health </h2>
        </div>
        <div class="sorryBox">
            <p class="info-p info-p--roboto">
                We are now going to ask some questions about {{(App\ServiceUsersProfile::find($serviceUserProfileID)->purchasing_care_for=='Myself')?'your':$serviceUserProfile->like_name."'s"}}  health.

                We apologise once again if the questions feel invasive, but they are essential to provide excellent care.

            </p>
            <p class="info-p info-p--roboto">


                All information will be treated with the greatest respect and confidentiality.

                Don't worry too much about your answers. We will contact you later if we need to discuss any details further.
            </p>
        </div>


    </div>

</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='16'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='16'>
    <input type="hidden" name="stepback" value='14'>
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