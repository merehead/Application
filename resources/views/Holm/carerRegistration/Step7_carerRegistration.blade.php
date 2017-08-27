<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox ">
            <h2>QUALIFICATIONS</h2>
            <h3>These include NVQs, Care Certificates, additional training courses and any other relevant qualifications.</h3>
            <h3>Please upload photographic proof of the certificates along with the titles.</h3>
            <h3>Don't worry if you don't have the certificates to hand, you can complete this later.</h3>

            <div class="questionsBox__img">
                <img src="./img/Signup_C_step7.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <h2 class=" formLabel questionForm__label">
                Please list what qualifications you have. Please give full title of qualification and type eg NVQ etc.
                </h2>
                <div class="addRow ">
                    <div class="addColumn">
                        <div class="formField">

                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                </div>

                <div class="addRow ">
                    <div class="addColumn">
                        <div class="formField">

                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                </div>

                <div class="addRow ">
                    <div class="addColumn">
                        <div class="formField">

                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer ">
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input type="text" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                </div>


            </form>
        </div>

    </div>
</div>
<form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value = '7'>
    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
</form>
<div class="registrationBtns">
    <div class="registrationBtns__left">
{{--        <a href="Signup_C_step6.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>--}}
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step8.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
