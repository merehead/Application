<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Languages</h2>

            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step29.jpg')}}" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What languages does [Service_user_name] speak? <span>*</span>
                    </h2>
                    <div class="inputWrap">

                        <div class="registrationCheckboxes">
                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf1">
                                <label for="boxf1"> English</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf2">
                                <label for="boxf2"> Welsh</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                                <label for="boxf3">Sign </label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                                <label for="boxf4"> Polish</label>
                            </div>


                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                                <label for="boxf5"> Urdu</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf6">
                                <label for="boxf6"> Hindi</label>
                            </div>
                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf7">
                                <label for="boxf7"> Punjabi</label>
                            </div>
                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf8">
                                <label for="boxf8"> Bengali</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf9">
                                <label for="boxf9"> Arabic</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf10">
                                <label for="boxf10"> Mandarin</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf11">
                                <label for="boxf11"> Cantonese</label>
                            </div>

                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf12">
                                <label for="boxf12"> Other</label>
                            </div>
                        </div>





                        <div class="formField">
                            <h2 class="formLabel questionForm__label">
                                If other, please state
                            </h2>
                            <div class="inputWrap">
                                <input type="text" class="formInput " placeholder="Other">
                            </div>
                        </div>


                    </div>


                </div>












            </form>
        </div>

    </div>

</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='29'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='29'>
    <input type="hidden" name="stepback" value='27'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
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