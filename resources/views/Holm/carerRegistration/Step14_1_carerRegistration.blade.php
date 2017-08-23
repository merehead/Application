<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Additional Documents</h2>



            <div class="questionsBox__img">
                <img src="./img/Signup_C_step14_1.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please upload photographic proof of your ID.
                    </h2>


                    <div class="inputWrap">
                        <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                            <div class="add__comment add__comment--smaller">
                                <p>Choose a File or Drag Here</p>
                                <span>Size limit: 10 MB</span>
                            </div>
                        </a>
                    </div>



                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please upload your CV.
                    </h2>
                    <div class="inputWrap">
                        <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                            <div class="add__comment add__comment--smaller">
                                <p>Choose a File or Drag Here</p>
                                <span>Size limit: 10 MB</span>
                            </div>
                        </a>
                    </div>


                </div>














                <!-- <div class="addContainer ">
                          <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                              <div class="add__comment add__comment--smaller">
                              <p>Choose a File or Drag Here</p>
                              <span>Size limit: 10 MB</span>
                            </div>
                          </a>
                        </div>
                -->





                <!--
                        <div class="formField formField--margin-top">
                          <div class="inputWrap">
                            <input type="text" class="formInput " placeholder="Further Details">
                          </div>
                        </div>
                     -->
            </form>

            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '14_1'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            </form>

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step14.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step15.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
