<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Additional Documents</h2>



            <div class="questionsBox__img">
                <img src="/img/Signup_C_step14_1.jpg" alt="">
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


                    <div class="inputWrap addContainer">
                      <input class="pickfiles" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" type="file" />
                      <span class="pickfiles-delete">X</span>
                      <div class="pickfiles_img"></div>

                      <div id="passport" class="pickfiles_img"></div>
                        <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                            <div class="add__comment add__comment--smaller">
                                <p>Choose a File or Drag Here</p>
                                <span>Size limit: 10 MB</span>
                            </div>
                        </a>
                    </div>
                    <div style="display: none" class="addInfo">
                        <input disabled type="text" name="passport" class="addInfo__input" placeholder="Name">
                    </div>
                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please upload your CV.
                    </h2>
                    <div class="inputWrap addContainer">
                      <input class="pickfiles" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" type="file" />
                      <span class="pickfiles-delete">X</span>
                      <div class="pickfiles_img"></div>

                      <div id="additional_documents_cv" class="pickfiles_img"></div>
                        <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                            <div class="add__comment add__comment--smaller">
                                <p>Choose a File or Drag Here</p>
                                <span>Size limit: 10 MB</span>
                            </div>
                        </a>
                    </div>
                    <div style="display: none" class="addInfo">
                        <input disabled type="text" name="additional_documents_cv" class="addInfo__input" placeholder="Name">
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
        <a href="Signup_C_step14.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="#" id="upload_files" class="registrationBtns__item upload_files">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '13'>
<input type="hidden" name="stepback" value = '13'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
