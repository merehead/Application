<div class="registration">
    <div class="registration__full" style="text-align: center">
        <div class="questionsBox">

            <span class="regIco">
              <i class="fa fa-ban" aria-hidden="true"></i>
            </span>
            <h2>Sorry </h2>
        </div>
        <div class="sorryBox">
            <p class="info-p info-p--roboto">
                Sorry, Holm is not yet available in your area. Please use <a href="{{route('ContactPage')}}">the contact form</a> to request us to come to your home town. You can also use the form if you think we have made an error.
            </p>
        </div>


    </div>

</div>
<form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '4_3'>
    <input type="hidden" name="carersProfileID" value = {{$purchasersProfileID}}>
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