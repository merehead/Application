<div class="registration" id="qualifications-page">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>QUALIFICATIONS</h2>
            <h3>These include NVQs, Care Certificates, additional training courses and any other relevant qualifications.</h3>
            <h3>Please upload photographic proof of the certificates along with the titles.</h3>
            <h3>Don't worry if you don't have the certificates to hand, you can complete this later.</h3>

            <div class="questionsBox__img">
                <img src="/img/Signup_C_step7.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">
                <h2 class=" formLabel questionForm__label">
                    Please give full description of each qualification, including type eg NVQ, Care Certificate etc, and level / grade.
                </h2>
                <div class="addRow">
                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 1</span>
                              </div>

                              <input class="pickfiles" type="file" />
                              <span class="pickfiles-delete">X</span>

                              <div id="nvq" class="pickfiles_img"></div>
                                <a class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="nvq" class="addInfo__input" placeholder="Name">
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 2</span>
                              </div>

                              <input class="pickfiles"  type="file" />
                              <span class="pickfiles-delete">X</span>

                              <div id="care_certificate" class="pickfiles_img"></div>
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="care_certificate" class="addInfo__input" placeholder="Name">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="addRow ">
                    <div class="addColumn">
                        <div class="formField">

                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 3</span>
                              </div>

                                <input class="pickfiles"  type="file" />
                                <span class="pickfiles-delete">X</span>

                                <div id="health_and_social" class="pickfiles_img"></div>
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="health_and_social" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 4</span>
                              </div>

                              <input class="pickfiles"  type="file" />
                              <span class="pickfiles-delete">X</span>

                              <div id="training_certificate" class="pickfiles_img"></div>
                              <a href="#" class="add add--moreHeight">
                                  <i class="fa fa-plus-circle"></i>
                                  <div class="add__comment add__comment--smaller">
                                      <p>Choose a File or Drag Here</p>
                                      <span>Size limit: 10 MB</span>
                                  </div>
                              </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="training_certificate" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                </div>

                <div class="addRow ">
                    <div class="addColumn">
                        <div class="formField">

                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 5</span>
                              </div>

                              <input class="pickfiles"  type="file" />
                              <span class="pickfiles-delete">X</span>

                              <div id="additional_training_course" class="pickfiles_img"></div>
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="additional_training_course" class="addInfo__input" placeholder="Name" >
                            </div>
                        </div>
                    </div>

                    <div class="addColumn">
                        <div class="formField">
                            <div class="addContainer">
                              <div class="addContainer_load-header">
                                <span>Certificate 6</span> 
                              </div>

                              <input class="pickfiles"  type="file" />
                              <span class="pickfiles-delete">X</span>

                              <div id="other_relevant_qualification" class="pickfiles_img"></div>
                                <a href="#" class="add add--moreHeight">
                                    <i class="fa fa-plus-circle"></i>
                                    <div class="add__comment add__comment--smaller">
                                        <p>Choose a File or Drag Here</p>
                                        <span>Size limit: 10 MB</span>
                                    </div>
                                </a>
                            </div>
                            <div class="addInfo">
                                <input disabled type="text" name="other_relevant_qualification" class="addInfo__input" placeholder="Name" >
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
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYou')}}" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="#" id="upload_files" class="registrationBtns__item upload_files">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '5_2'>
<input type="hidden" name="stepback" value = '5_2'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
