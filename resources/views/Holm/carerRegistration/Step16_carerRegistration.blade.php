<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox ">
            <h2> profile photo </h2>
            <h3> Please ensure you look professional!  </h3>

            <div class="questionsBox__img">
                <img src="./img/Signup_C_step16.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <div class="addRow addRow__for-single">
                    <div class="formField">
                        <h2 class=" formLabel questionForm__label"">
                        Please upload a photo of yourse lf to use as part of your profile.

                        </h2>
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

            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '16'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
{{--        <a href="Signup_C_step15.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>--}}
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step17.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
