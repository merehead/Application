<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Pets</h2>


            <div class="questionsBox__img">
                <img src="./dist/img/Signup_P_step12.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does [Service_user_name] own any pets? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">



                            <option value="select">Please select</option>



                            <option value="yes">Yes</option>
                            <option value="no">Sometimes</option>
                        </select>
                    </div>


                </div>





                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please give details <span>*</span>
                    </h2>
                    <div class="inputWrap">

                        <input type="text" class="formInput " placeholder="Details">

                    </div>


                </div>




                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are the pets friendly with strangers?  <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">



                            <option value="select">Please select</option>



                            <option value="yes">Yes</option>
                            <option value="no">No</option>

                            <option value="normally">Normally</option>
                            <option value="no">Sometimes</option>
                        </select>
                    </div>


                </div>



            </form>
        </div>

    </div>
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='12'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='12'>
    <input type="hidden" name="stepback" value='10'>
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