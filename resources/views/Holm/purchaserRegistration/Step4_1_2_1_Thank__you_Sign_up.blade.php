
{{--<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox ">
            <h2> profile photo </h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step16.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <div class="addRow addRow__for-single">
                    <div class="formField">
                        <h2 class=" formLabel questionForm__label">
                            Please add a photo of [Service User Name]. This will only be shared with carers you choose to book and will be visible on [service user name]'s profile. You can upload a photo later if you don't have one handy.                        </h2>
                        <div class="addContainer ">
                            <a href="#" class="add add--moreHeight">
                                <i class="fa fa-plus-circle"></i>
                                <div class="add__comment">
                                    <p>Choose a File or Drag Here</p>
                                    <span>Size limit: 10 MB</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>


            </form>

            <form id="step" method="POST" action="{{ route('PurchaserRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '4_1_2'>
                <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
            </form>

        </div>

    </div>
</div>--}}


<div class="thank">
    <h2 class="thank__title">
        Thank you for registering
    </h2>
    <span class="successIco">
          <i class="fa fa-check" aria-hidden="true"></i>
        </span>
    <p class="info-p">
        You will need to fill in a care and health questionnaire about {{$purchasersProfile->serviceUsers->first()->like_name}} before booking a carer.
    </p>
    <p >
        You can do that later, or you can press 'Next step' and do that now.

    </p>
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
<input type="hidden" name="step" value = '4_1'>
<input type="hidden" name="stepback" value = '4_1'>
<input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
{!! Form::close()!!}