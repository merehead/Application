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

                        @if(!empty($purchasersProfileID))
                            <h2 class=" formLabel questionForm__label">
                                Please add a photo of {{$purchasersProfile->serviceUsers->first()->like_name}}. This will only be shared with
                                carers you choose to book and will be visible on {{$purchasersProfile->serviceUsers->first()->like_name}}'s
                                profile. You can upload a photo later if you don't have one handy. </h2>
                        @else
                            <h2 class=" formLabel questionForm__label">
                                Please add a photo of {{$purchasersProfile->serviceUsers->first()->like_name}}. This will only be shared with
                                carers you choose to book and will be visible on {{$serviceUserProfile->like_name}}'s
                                profile. You can upload a photo later if you don't have one handy. </h2>
                        @endif



                        <div class="addContainer">
                            <input class="pickfiles" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" type="file"/>
                            <div class="pickfiles_img"></div>
                            <a href="#" class="add add--moreHeight">
                                <i class="fa fa-plus-circle"></i>
                                <div class="add__comment">
                                    <p>Choose a File or Drag Here</p>
                                    <span>Size limit: 10 MB</span>
                                </div>
                            </a>
                        </div>
                        <div style="display: none" class="addInfo">
                            <input disabled type="text" name="personal_photo_2" class="addInfo__input"
                                   placeholder="Name">
                        </div>
                    </div>
                </div>

                <div style='text-align: center; margin-top: 20px'>
                    <a class="registrationBtns__item upload_files">
                        upload files
                    </a>
                </div>

            </form>

            @if(empty($purchasersProfileID))
                <form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id'=>$serviceUserProfileID]) }}">
                    @else
                        <form id="step" method="POST" action="{{ route('PurchaserRegistrationPost') }}">
                            @endif



                            {{ csrf_field() }}
                            <input type="hidden" name="step" value = '4_1_2'>
                            @if(empty($purchasersProfileID))
                                <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
                            @else
                                <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
                            @endif
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

    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '4_2'>
<input type="hidden" name="stepback" value = '4_2'>
@if(empty($purchasersProfileID))
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
@else
    <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
@endif
{!! Form::close()!!}
