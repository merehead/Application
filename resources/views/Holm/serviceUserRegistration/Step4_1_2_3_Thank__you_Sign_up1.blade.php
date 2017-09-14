<div class="thank">
    <h2 class="thank__title">
        PLEASE ANSWER THESE QUESTIONS BEFORE BOOKING A CARER
    </h2>
    <p class="info-p">
        THIS QUESTIONNAIRE NORMALLY TAKES ABOUT 15 MINUTES TO COMPLETE, PROBABLY LESS.
    </p>

    <p> This isn't a test, so don't worry and relax. Fill in the questions the best you can. You can always change information later in your new profile.
    </p>
    <p>
        Some of the questions may seem detailed, or personal. We guarantee privacy and confidentiality, but the information will help provide the best care possible.
    </p>
</div>

<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '4_1_2_3'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
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

{!! Form::open(['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '4_1_2_3'>
<input type="hidden" name="stepback" value = '4_1_2_1'>
<input type="hidden" name="purchasersProfileID" value = {{$serviceUserProfile->purchaser_id}}>
{!! Form::close()!!}