        <div class="registration">
            <div class="registration__full">

                <p class="info-p info-p--roboto">
                    <span class="accent-p">INTRODUCTION </span>       </p>
                <p class="info-p info-p--roboto">
                    Thank you for your interest in becoming a Care Partner at Holm.

                </p>

                <p class="info-p info-p--roboto">
                    Like you, we believe that every elderly person deserves the best care possible. That is why we want to ensure that only the best carers are listed at Holm.

                </p>
                <p class="info-p info-p--roboto"s>
                    We will take you through a short application process which shouldn't take more than 15 minutes. You will also need to upload proof of several documents afterwards before we can add your profile to our site, and clients can start booking you.

                </p>
                <p class="info-p info-p--roboto"s>
                    We may also contact you with further questions as part of our quality assurance process.
                </p>

                <p class="info-p info-p--roboto">
              <span class="accent-p">
PLEASE REMEMBER TO PRESS 'SUBMIT' AT THE END TO MAKE SURE WE RECEIVE ALL YOUR INFORMATION.
</span>
                </p>
                <p class="info-p info-p--roboto info-p--center">
                    We look forward to you joining us!
                </p>


            </div>

        </div>
        <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
            {{ csrf_field() }}
            <input type="hidden" name="step" value = '2'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
        </form>
        <div class="registrationBtns registrationBtns--center">

            <a href="Signup_C_step3.html" class="registrationBtns__item"
               onclick="event.preventDefault();document.getElementById('step').submit();"
            >
                start
            </a>
        </div>
