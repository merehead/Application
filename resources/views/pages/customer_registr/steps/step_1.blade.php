@extends('pages.customer_registr.customer_registration')


@section('step')
    <div class="registration">
        <div class="registration__column registration__column--with-padding">
          <form class="registrationForm" >
            <p>Please enter your email & create a password.</p>

            <div class="formField">
              <h2 class="formLabel">
                Email Address <span>*</span>
              </h2>
              <div class="inputWrap">
                <input type="email" ng-model="user.email" class="formInput registrationForm__input" placeholder="yourname@email.com" required >
                <span class="inputIco registrationForm__ico">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="formRow">
              <div class="formColumn formColumn--half">
                <div class="formField">
                  <h2 class="formLabel">
                    password <span>*</span>
                  </h2>
                  <div class="inputWrap">
                    <input type="password" ng-model="user.pass.val" ng-change="checkPass()" class="formInput registrationForm__input" placeholder="*********" required>
                    <span class="inputIco registrationForm__ico">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <span class="inputIco registrationForm__ico registrationForm__ico--right <% user.pass.errorClass %>">
                     <i class="fa fa-<% user.pass.check %>" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="formColumn formColumn--half">
                <div class="formField">

                  <div class="inputWrap">
                    <input type="password" ng-model="user.confirmPass.val" ng-change="checkConfirmPass()" class="formInput registrationForm__input" placeholder="*********" required>
                    <span class="inputIco registrationForm__ico">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <span class="inputIco registrationForm__ico registrationForm__ico--right <% user.confirmPass.errorClass %>">
                     <i class="fa fa-<% user.confirmPass.check %>" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="passStrength">
            <div class="passStrength__head">
              <p class="">Password strength</p>
              <span class="passStrength__indicate">good</span>
            </div>
            <div class="passStrength__item">
              <div class="passStrength__bar" ng-style="passLength" ng-init="passLength = 0"></div>
            </div>
          </div>

          <div class="formField">
              <h2 class="formLabel">
              YOUR FRIEND REFERRAL CODE (IF YOU HAVE)

              </h2>
              <div class="inputWrap">
                <input type="text" class="formInput registrationForm__input" placeholder="">

              </div>
            </div>



        </div>
        <div class="registration__column registration__column--bg">
          <div class="personal">
            <h2 class="infoTitle">If you have difficulties with registration, please contact us and we will help you.</h2>
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

        <a href="javascript:void(0);" id="continue_later" ng-model="continue_later" ng-click="sendToServer('continue_later')" class="registrationBtns__item registrationBtns__item--later">
          continue later
        </a>

        <div class="registrationBtns__left">
          <a href="javascript:void(0);" id="step_2" class="registrationBtns__item">
            next step
            <i class="fa fa-arrow-right"></i>
          </a>
        </div>
    </div>
@endsection