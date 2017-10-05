<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox questionsBox--text-left">
            <h2>How are you feeling? </h2>
            <h2>Don't worry. It'll be worth it.</h2>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="mood">
            <img src="{{asset('/img/Signup_P_step31.jpg')}}" alt="">
        </div>
    </div>
</div>



<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='31'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='31'>
    <input type="hidden" name="stepback" value='29'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouSrvUser',[$serviceUserProfileID])}}" class="registrationBtns__item registrationBtns__item--later">
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