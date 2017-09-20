<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Transport</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step8.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">

                {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Do you have a full UK/EEA Driving Licence?<span>*</span>
                    </h2>
                    <div class="inputWrap">

                        {!! Form::select('driving_licence',['Yes'=>'Yes','No'=>'No'],null,['id'=>'main-if2','class'=>'formSelect','placeholder'=>'Please select']) !!}
                    </div>

                    @if ($errors->has('driving_licence'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('driving_licence') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="formField hiding2" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        What is your Driving Licence Number?
                    </h2>
                    <div class="inputWrap">

                        {!! Form::text('DBS_number',null,['class'=>'formInput','placeholder'=>'Driving licence number']) !!}
                    </div>

                    @if ($errors->has('DBS_number'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('DBS_number') }}</strong>
                                    </span>
                    @endif
                </div>




            <div class="formField hiding2" style="display: none">
                <h2 class="formLabel questionForm__label">
                 Valid until
                </h2>

                @if($carersProfile->driver_licence_valid_until === "01/01/1970")
                    <input name="driver_licence_valid_until" id="datepicker_driver_licence" class="profileField__input" placeholder="Valid until date" type="text">
                @else
                    {!! Form::text('driver_licence_valid_until',null,['id'=>'datepicker_driver_licence','class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif
            </div>



                <div class="formField  hiding2" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Please upload photographic proof of your driving licence.
                    </h2>
                    <div class="inputWrap addContainer">
                      <input class="pickfiles" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" type="file" />
                      <span class="pickfiles-delete">X</span>
                      <div id="driving_licence_photo" class="pickfiles_img"></div>
                        <a href="#" class="add add--moreHeight">
                            <i class="fa fa-plus-circle"></i>
                            <div class="add__comment add__comment--smaller">
                                <p>Choose a File or Drag Here</p>
                                <span>Size limit: 10 MB</span>
                            </div>
                        </a>
                    </div>
                    <div style="display: none" class="addInfo">
                        <input disabled type="text" name="driving_licence_photo" class="addInfo__input" placeholder="Name">
                    </div>
                </div>

                <div class="formField hiding2" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Do you own a car which you intend to use for work?
                    </h2>
                    <div class="inputWrap">

                        {!! Form::select('have_car',['Yes'=>'Yes','No'=>'No'],null,['id'=>'register_have_car',
                        'class'=>'formSelect',
                        'placeholder'=>'Please select']) !!}
                    </div>
                    @if ($errors->has('have_car'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('have_car') }}</strong>
                                    </span>
                    @endif

                </div>



            <div class="formField " >  {{--style="display: none"--}}
                <h2 class="formLabel questionForm__label">

                 Car insurance Number

                </h2>
                {!! Form::text('car_insurance_number',null,['class'=>'profileField__input profileField__input--greyBg','placeholder'=>'Car insurance number','readonly','data-edit'=>'false']) !!}
                @if ($errors->has('car_insurance_number'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('car_insurance_number') }}</strong>
                                    </span>
                @endif
            </div>






                <div class="formField hiding" style="display: none">
                    <h2 class="formLabel questionForm__label">
                        Would you be interested in using your car to transport clients to the shops or for short trips?<span>*</span>
                    </h2>
                    <div class="inputWrap">

                        {!! Form::select('use_car',['Yes'=>'Yes','No'=>'No'],null,
                        ['id'=>'register_use_car','class'=>'formSelect',
                        'placeholder'=>'Please select']) !!}
                    </div>

                    @if ($errors->has('use_car'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('use_car') }}</strong>
                                    </span>
                    @endif
                </div>

            <input type="hidden" name="step" value = '8'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step7.html" class="registrationBtns__item registrationBtns__item--back"
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
<input type="hidden" name="step" value = '6'>
<input type="hidden" name="stepback" value = '6'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
