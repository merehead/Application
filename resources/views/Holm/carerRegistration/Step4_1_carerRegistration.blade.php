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
                Sorry, Holm is not yet available in your area.<br /><br />
                Please use <a href="{{route('ContactPage')}}">the contact form</a>
                to request us to come to your home town.<br />
                You can also use the form if you think we have made an error.
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

    <a href="\" class="registrationBtns__item"
{{--
       onclick="event.preventDefault();document.getElementById('step').submit();"
--}}
    >
        OK
    </a>
</div>