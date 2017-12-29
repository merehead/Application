<div class="registration">
    <div class="registration__full">

        <p class="info-p info-p--roboto">
            <span class="accent-p">Upload documents</span> - <span style="color:red">You have not completed the application yet!</span> </p>
        <p class="info-p info-p--roboto">

            There is one more page.<br>
            After submitting your application, please remember to upload photos of the following original documents (where applicable):

        </p>

        <p class="info-p info-p--roboto info-p--less-padding">- DBS certificate;</p>
        <p class="info-p info-p--roboto info-p--less-padding">- training certificates;</p>
        <p class="info-p info-p--roboto info-p--less-padding">- proof of ID (eg. Passport/Driving Licence);</p>
        <p class="info-p info-p--roboto info-p--less-padding">- driving Licence;</p>
        <p class="info-p info-p--roboto info-p--less-padding">- car Insurance;</p>
        <p class="info-p info-p--roboto info-p--less-padding">- your CV.</p>

        <p class="info-p info-p--roboto">
        You do this by clicking on your name at the top right corner, going to your personal profile, pressing edit for the relevant section, uploading the image, and pressing save
        </p>

        <p class="info-p info-p--roboto">
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