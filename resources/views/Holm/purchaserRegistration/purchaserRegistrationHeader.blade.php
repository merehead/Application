<div class="breadcrumbs">
    <a href="index.html" class="breadcrumbs__item">
        Home
    </a>
    <span class="breadcrumbs__arrow">></span>
    <a href="Signup_P_step1.html" class="breadcrumbs__item">
        Customer Registration
    </a>

</div>

<div class="signBox">
    <div class="signSteps ">
        <p href="#" class="signSteps__item {{$activeStep == 1 ? "signSteps__item--active"  : ""}}">
            <span class="signSteps__name">Email & Password</span>
            <span class="signSteps__info">Enter your account information</span>
        </p>
        <p href="#" class="signSteps__item {{$activeStep == 2 ? "signSteps__item--active"  : ""}}">
            <span class="signSteps__name">Personal Details</span>
            <span class="signSteps__info">Enter your personal information</span>
        </p>
        <p href="#" class="signSteps__item {{$activeStep == 3 ? "signSteps__item--active"  : ""}}">
            <span class="signSteps__name">Health Questionnaire </span>
            <span class="signSteps__info">Information to help carers</span>
        </p>
        <p href="#" class="signSteps__item {{$activeStep == 4 ? "signSteps__item--active"  : ""}}">
            <span class="signSteps__name">Finish</span>
            <span class="signSteps__info">Complete the process</span>
        </p>
        <div class="signProgress ">
            <div class="signStep signStep--step1 {{$activeStep > 1 ? "signStep--active"  : ""}}">
                <div class="signStep__item">

                </div>
                <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
            </div>
            <!--<div class="signStep signStep--step2 ">
              <div class="signStep__item">

              </div>
              <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
            </div>
			-->

            <div class="signStep signStep--step2 signStep--haveSubsteps">
                <div class="signStep__item">
                    <div class="signSubstep signSubstep--step1  {{$activeSubStep > 0 ? "signSubstep--active"  : ""}}">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step2 {{$activeSubStep > 1 ? "signSubstep--active"  : ""}}">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step3 {{$activeSubStep > 2 ? "signSubstep--active"  : ""}}">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step4 {{$activeSubStep > 3 ? "signSubstep--active"  : ""}}">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                </div>

            </div>



            <div class="signStep signStep--step3 signStep--haveSubsteps">
                <div class="signStep__item">
                    <div class="signSubstep signSubstep--step1  ">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step2">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step3">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                    <div class="signSubstep signSubstep--step4">
                        <div class="signSubstep__item">
                        </div>
                        <span class="signSubstep__ico">
                    <i class="fa fa-check-circle"></i>
                  </span>
                    </div>
                </div>

            </div>


            <div class="signStep signStep--step4">
                <div class="signStep__item">

                </div>
                <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
            </div>

        </div>
    </div>

</div>

{{--

        <div class="breadcrumbs">
            <a href="\" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="" class="breadcrumbs__item">
                Carer REGISTRATION
            </a>

        </div>

        <div class="signBox">
            <div class="signSteps ">
                <p href="#" class="signSteps__item {{$activeStep == 1 ? "signSteps__item--active"  : ""}}">
                    <span class="signSteps__name">Email & Password</span>
                    <span class="signSteps__info">Enter your account information</span>
                </p>
                <p href="#" class="signSteps__item {{$activeStep == 2 ? "signSteps__item--active"  : ""}}">
                    <span class="signSteps__name">Personal Details</span>
                    <span class="signSteps__info">Enter your personal information</span>
                </p>
                <p href="#" class="signSteps__item {{$activeStep == 3 ? "signSteps__item--active"  : ""}}">
                    <span class="signSteps__name">Online Recruitment</span>
                    <span class="signSteps__info">Enter your working information</span>
                </p>
                <p href="#" class="signSteps__item {{$activeStep == 4 ? "signSteps__item--active"  : ""}}">
                    <span class="signSteps__name">Finish</span>
                    <span class="signSteps__info">Complete the process</span>
                </p>
                <div class="signProgress ">
                    <div class="signStep signStep--step1 {{$activeStep > 1 ? "signStep--active"  : ""}}">
                        <div class="signStep__item">

                        </div>
                        <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
                    </div>
                    <div class="signStep signStep--step2 {{$activeStep > 2 ? "signStep--active"  : ""}}">
                        <div class="signStep__item">

                        </div>
                        <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
                    </div>
                    <div class="signStep signStep--step3 {{$activeStep > 3 ? "signStep--active"  : ""}}">
                        <div class="signStep__item">
                        </div>
                        <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>

                    </div>
                    <div class="signStep signStep--step4 {{$activeStep > 4 ? "signStep--active"  : ""}}">
                        <div class="signStep__item">

                        </div>
                        <span class="signStep__ico">
                <i class="fa fa-check-circle"></i>
              </span>
                    </div>

                </div>
            </div>

        </div>
--}}
