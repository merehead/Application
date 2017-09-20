<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox ">
            <h2> profile photo </h2>
            <h3> Please ensure you look professional!  </h3>

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
                          Please upload a photo of yourself to use as part of your profile.
                        </h2>
                        <div class="addContainer">
                          <input class="pickfiles_profile_photo" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
                          <div class="pickfiles_img"></div>

                          <div id="profile_photo" class="pickfiles_img" name='img/profile_photos/{{$carersProfileID}}.png'
                            style="background-image: url(img/profile_photos/{{$carersProfile->id}}.png)"></div>

                          <a href="#" class="add add--moreHeight">
                              <i class="fa fa-plus-circle"></i>
                              <div class="add__comment add__comment--smaller">
                                  <p>Choose a File or Drag Here</p>
                                  <span>Size limit: 10 MB</span>
                              </div>
                          </a>
                        </div>
                        <div style="display: none" class="addInfo">
                            <input disabled type="text" name="profile_photo" class="addInfo__input" placeholder="Name">
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
        <a href="Signup_C_step15.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="#" id="upload_files" class="registrationBtns__item upload_files_profile_photo">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '14_1'>
<input type="hidden" name="stepback" value = '14_1'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
