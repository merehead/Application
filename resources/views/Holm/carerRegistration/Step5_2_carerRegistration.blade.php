<div class="registration">
    <div class="registration__full">
        <div class="questionsBox">

            <span class="regIco">
              <i class="fa fa-ban" aria-hidden="true"></i>
            </span>
            <h2>Sorry </h2>
        </div>
        <div class="sorryBox">
            <p class="info-p info-p--roboto">
                We are unable to process your application at this time, but thank you for your interest. Please do feel free to reapply in the future, when we may be able to reconsider your application.

            </p>
            <p class="info-p info-p--roboto">
                If you feel we should reconsider this decision, please do feel free to contact us via info@holm.care
            </p>
        </div>


    </div>

</div>
<form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '5_2'>
    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
</form>
<div class="registrationBtns registrationBtns--center">

    <a href="Signup_C_step4.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        OK
    </a>
</div>