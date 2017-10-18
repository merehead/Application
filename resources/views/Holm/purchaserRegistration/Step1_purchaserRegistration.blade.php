<div class="registration">
    <div class="registration__column registration__column--with-padding">

        {!! Form::open(['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'step','class'=>'registrationForm']) !!}


        <p>Please enter your email & create a password.</p>

        <div class="formField">
            <h2 class="formLabel">
                Email Address <span>*</span>
            </h2>
            <div class="inputWrap">
                <input type="email" name="email" class="formInput registrationForm__input"
                       placeholder="yourname@email.com" value="{{old('email')}}">
                <span class="inputIco registrationForm__ico">
                  <i class="fa fa-envelope"></i>
                </span>


            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif


        </div>
        <div class="formRow">
            <div class="formColumn formColumn--half">
                <div class="formField">
                    <h2 class="formLabel">
                        password <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <input type="password" name="password" class="formInput registrationForm__input"
                               placeholder="*********">
                        <span class="inputIco registrationForm__ico">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                        <span class="inputIco registrationForm__ico registrationForm__ico--right">
                     <i class="fa fa-check" aria-hidden="true"></i>
                    </span>
                    </div>


                </div>
            </div>
            <div class="formColumn formColumn--half">
                <div class="formField">

                    <div class="inputWrap">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="formInput registrationForm__input"
                               placeholder="*********">
                        <span class="inputIco registrationForm__ico">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                        <span class="inputIco registrationForm__ico registrationForm__ico--right registrationForm__ico--wrong">
                     <i class="fa fa-times " aria-hidden="true"></i>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
        <div class="passStrength">
            <div class="passStrength__head">
                <p class="">Password strength</p>
                <span id="result" class="passStrength__indicate">good</span>
            </div>
            <div class="passStrength__item">
                <div class="passStrength__bar"></div>
            </div>
        </div>
        <div class="formField">
            <h2 class="formLabel">
                Please enter your bonus referral code (if someone has given you one)

            </h2>
            <div class="inputWrap">
                <input type="text" name="referral_code" value="{{(!empty($ref_code))? $ref_code : old('referral_code') }}"
                class="formInput registrationForm__input" placeholder="">

            </div>
            @if ($errors->has('referral_code'))
                <span class="help-block">
                                        <strong>{{ $errors->first('referral_code') }}</strong>
                                    </span>
            @endif
        </div>

        <input type="hidden" name="step" value='1'>
        <input type="hidden" name="carersProfileID" value='0'>
        {!! Form::close()!!}

    </div>

    <div class="registration__column registration__column--bg">
        <div class="personal">
            <h2 class="infoTitle">If you have difficulties with registration, please contact us and we will help
                you.</h2>
            <ul class="contactList">

                <li class="contactList__item">
              <span class="contactList__ico">
               <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
                    <span class="contactList__text">
               <a href="tel: 0161 706 0288 "> 0161 706 0288  </a>    (9:00 AM - 5:00 PM)
              </span>
                </li>


                <li class="contactList__item">
              <span class="contactList__ico">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
                    <span class="contactList__text contactList__text--email">
                <a href="mailto:info@holm.care">info@holm.care</a></p>
              </span>
                </li>
            </ul>
        </div>
    </div>


</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
    </div>


    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >next step
        <i class="fa fa-arrow-right"></i>
    </a>


</div>



