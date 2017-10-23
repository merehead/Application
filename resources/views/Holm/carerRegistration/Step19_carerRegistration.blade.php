<div class="registration">
    <div class="registration__full">

        <p class="info-p info-p--roboto">
            <span class="accent-p">Upload documents</span>       </p>
        <p class="info-p info-p--roboto">

            Thank you for completing the online application process. Please could you upload photos of the following original documents (where applicable):

        </p>

        <p class="info-p info-p--roboto">- DBS certificate;</p>
        <p class="info-p info-p--roboto">- training certificates;</p>
        <p class="info-p info-p--roboto">- proof of ID (eg. Passport/Driving Licence);</p>
        <p class="info-p info-p--roboto">- driving Licence;</p>
        <p class="info-p info-p--roboto">- car Insurance;</p>
        <p class="info-p info-p--roboto">- your CV.</p>



        <p class="info-p info-p--roboto"s>
            If you have any problems uploading them, you can also email them to <a href="mailto:info@holm.care">info@holm.care</a>. Once we have received and checked all your documents, we will add your profile to the website for clients to book you.
        </p>




    </div>

</div>
<form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '19'>
    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
</form>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step18.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYou')}}" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step20.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '17'>
<input type="hidden" name="stepback" value = '17'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}