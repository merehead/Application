
<div class="registration">
    <div class="registration__full">
        <div class="questionsBox">
            <span class="regIco regIco--success">
              <i class="fa fa-check" aria-hidden="true"></i>
            </span>
            <h2>APPLICATION COMPLETED </h2>
        </div>
        <div class="regFinish">
            <p class="info-p info-p--roboto">
                Thank you for taking the time to complete the questionnaire.

            </p>
            <p class="info-p info-p--roboto">We look forward to you joining us and helping elderly people receive the best care possible.</span>

            </p>

            <p class="info-p info-p--roboto">Completion of the application process does not automatically mean that you have been accepted by us. We reserve the right to not list a person.
            </p>

            <p class="info-p info-p--roboto">We may contact you to arrange an interview.
            </p>

            <p>
              <span class="accent-p">
                <span class="accent-p__underline">ONCE AGAIN. PLEASE REMEMBER TO MAKE SURE WE RECEIVE ANY MISSING INFORMATION BEFORE YOUR PROFILE CAN BE LISTED ON THE WEBSITE. </span>
              </span>
            </p>


            <p class="info-p info-p--roboto"> Press  <span class="accent-p">'SUBMIT'</span> to finish.
            </p>
        </div>



    </div>

</div>
<form id="step" method="GET" action="/im-carer">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '21'>
    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
</form>
<div class="registrationBtns registrationBtns--center">

    <a href="Carer_Private_profile_page.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        submit
    </a>
</div>

