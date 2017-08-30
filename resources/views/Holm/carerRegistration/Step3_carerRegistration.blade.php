<div class="registration">
    <div class="registration__full">

        <p class="info-p info-p--roboto">
            <span class="accent-p">Requirements</span>       </p>
        <p class="info-p info-p--roboto">
            You must meet the following criteria:

        </p>

        <p class="info-p info-p--roboto">- be eligible to work in the UK;</p>
        <p class="info-p info-p--roboto">- have a minimum relevant qualification of NVQ Level 2 in Health and Social Care or a Care Certificate;</p>
        <p class="info-p info-p--roboto">- a clean DBS record;</p>
        <p class="info-p info-p--roboto">- valid proof of ID (such as a passport or driving licence);</p>
        <p class="info-p info-p--roboto">- a current CV;</p>
        <p class="info-p info-p--roboto">- two work references.</p>

        <p class="info-p info-p--roboto"s>
            It may prove useful to have all relevant documents to hand, in order to make the application process as quick and easy as possible.
        </p>
        <p class="info-p info-p--roboto"s>
            Do not worry if you don't have everything. You can submit some information later.   </p>




    </div>

</div>
<form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '3'>
    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
</form>
<div class="registrationBtns registrationBtns--center">

    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        OK
    </a>
</div>

