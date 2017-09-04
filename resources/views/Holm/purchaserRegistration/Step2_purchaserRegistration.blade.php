        <div class="registration">
            <div class="registration__full">

                <p class="info-p info-p--roboto">
                    <span class="accent-p">THANK YOU FOR YOUR INTEREST IN HOLM.  </span>       </p>
                <p class="info-p info-p--roboto">
                    <span class="accent-p"> THIS QUESTIONNAIRE SHOULD TAKE NO MORE THAN 30 MINUTES TO COMPLETE, PROBABLY LESS.</span>
                </p>

                <p class="info-p info-p--roboto">
                    This isn't a test, so don't worry and relax. Fill in the questions the best you can. You can always change information later in your new profile.

                </p>
                <p class="info-p info-p--roboto"s>
                    Some of the questions may seem detailed, or personal. We guarantee privacy and confidentiality, but the information will help provide the best care possible.
                </p>
                <p class="info-p info-p--roboto"s>
                    Please fill in your details to register. It only takes a couple of minutes.</p>

                <p class="info-p info-p--roboto">
                    <span class="accent-p">WE ARE WORKING HARD TO HELP OLDER PEOPLE TO RECEIVE THE BEST CARE POSSIBLE. </span>
                </p>
                <p class="info-p info-p--roboto info-p--center">
                    Press 'Start' to proceed
                </p>

            </div>

        </div>
        <form id="step" method="POST" action="{{ route('PurchaserRegistrationPost') }}">
            {{ csrf_field() }}
            <input type="hidden" name="step" value = '2'>
            <input type="hidden" name="carersProfileID" value = {{$purchasersProfileID}}>
        </form>
        <div class="registrationBtns registrationBtns--center">

            <a href="next" class="registrationBtns__item"
               onclick="event.preventDefault();document.getElementById('step').submit();"
            >
                start
            </a>
        </div>
