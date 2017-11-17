<div class="registration">
    <div class="registration__full">
        <div class="thank thank--full">
            <h2 class="thank__title">
                Thank you for registering
            </h2>
            <span class="successIco">
            <i class="fa fa-check" aria-hidden="true"></i>
          </span>
            <p class="info-p thank__text">
                You will need to fill in a care and health questionnaire about {{($purchasersProfile->purchasing_care_for=='Myself')?'yourself':$purchasersProfile->serviceUsers->first()->like_name}} before booking a carer.
                You can do that later, or you can press 'Next step' and do that now.

            </p>
        </div>
    </div>

</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration', ['id' => $purchasersProfile->serviceUsers->first()->id]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '4_1_2_1'>
    <input type="hidden" name="serviceUserProfileID" value = {{$purchasersProfile->serviceUsers->first()->id}}>
</form>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouUser')}}" class="registrationBtns__item registrationBtns__item--later">
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
<input type="hidden" name="step" value = '4_1'>
<input type="hidden" name="stepback" value = '4_1'>
<input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
{!! Form::close()!!}