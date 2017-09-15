<div class="registration">
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
                            You can add a photo of yourself to be added to your personal profile. Don't worry. Other people won't see it!
                        </h2>
                        <div class="addContainer">
                          <input class="pickfiles" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" type="file" />
                          <span class="pickfiles-delete">X</span>
                          <div class="pickfiles_img"></div>
                          <div id="purchaser_personal_photo_2" class="pickfiles_img"></div>
                            <a href="#" class="add add--moreHeight">
                                <i class="fa fa-plus-circle"></i>
                                <div class="add__comment add__comment--smaller">
                                    <p>Choose a File or Drag Here</p>
                                    <span>Size limit: 10 MB</span>
                                </div>
                            </a>
                        </div>
                        <div style="display: none" class="addInfo">
                            <input disabled type="text" name="purchaser_personal_photo" class="addInfo__input" placeholder="Name" >
                        </div>
                    </div>
                </div>
            </form>

            <form id="step" method="POST" action="{{ route('PurchaserRegistrationPost') }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value = '4_2'>
                <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
            </form>

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();">
            <i class="fa fa-arrow-left "></i>back
        </a>
{{--        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>--}}
    </div>

    <a href="#" id="upload_files" class="registrationBtns__item upload_files">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '3'>
<input type="hidden" name="stepback" value = '3'>
<input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
{!! Form::close()!!}
