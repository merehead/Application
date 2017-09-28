<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>DBS - Formally called CRB</h2>
            <h3>We consider a DBS completed within the last 24 months to be up to date for now. We will ask you to
                reapply for a new one in future.</h3>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step6.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">

            {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Do you have an up to date DBS? <span>*</span>
                </h2>
                <div class="inputWrap">
                    <?php
                        if (isset($atrr)) unset($atrr);
                        $atrr = ['class'=>'formSelect','id'=>'main-if2'];
                        if (is_null($carersProfile->DBS))
                            $atrr['placeholder'] = 'Please select';
                    ?>
                    {!! Form::select('DBS',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                </div>
                @if ($errors->has('DBS'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="formField hiding2" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Upload copy of DBS certificate.
                </h2>
                <div class="inputWrap addContainer">
                  <input class="pickfiles" type="file" />
                  <span class="pickfiles-delete">X</span>

                  <div id="dbs_certificate_photo" class="pickfiles_img"></div>
                    <a href="#" class="add add--moreHeight">
                        <i class="fa fa-plus-circle"></i>
                        <div class="add__comment add__comment--smaller">
                            <p>Choose a File or Drag Here</p>
                            <span>Size limit: 10 MB</span>
                        </div>
                    </a>
                </div>
                <div style="display: none" class="addInfo">
                    <input disabled type="text" name="dbs_certificate_photo" class="addInfo__input" placeholder="Name" >
                </div>


            </div>
            <div class="formField hiding2" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Date of certificate.
                </h2>

                <div class="inputWrap">

                    @if($carersProfile->dbs_date === "01/01/1970")
                        <input name="dbs_date" id="datepicker15" class="profileField__input" placeholder="dd/mm/yyyy" type="text">
                    @else
                        {!! Form::text('dbs_date',null,['id'=>'datepicker15','class'=>'formInput','placeholder'=>'Date of certificate']) !!}
                    @endif

                </div>
                @if ($errors->has('DBS'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS') }}</strong>
                                    </span>
                @endif
            </div>



            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Have you used the new <a href="https://www.gov.uk/dbs-update-service" target="blank"
                                             class="underline">DBS update service</a>? <span>*</span>
                </h2>
                <div class="inputWrap">
                    <?php
                        if (isset($atrr)) unset($atrr);
                    $atrr = ['class'=>'formSelect','id'=>'main-if'];
                    if (is_null($carersProfile->DBS_use))
                        $atrr['placeholder'] = 'Please select';
                    ?>
                    {!! Form::select('DBS_use',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
                </div>
                @if ($errors->has('DBS_use'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DBS_use') }}</strong>
                    </span>
                @endif
            </div>


            <div class="formField hiding" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Please could we have your personal identifier.<span>*</span>
                </h2>

                <div class="inputWrap">

                    {!! Form::text('DBS_identifier',null,['class'=>'formInput','placeholder'=>'Details','maxlength'=>'60']) !!}
                </div>
                @if ($errors->has('DBS_identifier'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('DBS_identifier') }}</strong>
                                    </span>
                @endif
            </div>
            <input type="hidden" name="step" value='6'>
            <input type="hidden" name="carersProfileID" value= {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>

<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back3" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="\" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="#" id="upload_files" class="registrationBtns__item upload_files">
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '4'>
<input type="hidden" name="stepback" value = '4'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
