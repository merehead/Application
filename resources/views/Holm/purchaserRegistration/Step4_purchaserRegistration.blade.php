        <div class="registration">
            <div class="registration__column registration__column--with-padding">
                <div class="questionsBox">
                    <h2>Your details</h2>


                    <div class="questionsBox__img">
                        <img src="/img/Signup_C_step4.jpg" alt="">
                    </div>


                </div>

            </div>
            <div class="registration__column  registration__column--bg">
                <div class="personal">

                    {!! Form::model($purchasersProfile,['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'step','class'=>'personalForm']) !!}
                    {{--<form class="personalForm">--}}

                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Title <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {!! Form::select('title',['1'=>'Mr','2'=>'Mrs','3'=>'Miss','4'=>'Dr','5'=>'Prof'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                            </div>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                first Name <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('first_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Your name']) !!}
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Last name <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('family_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Last name']) !!}
                            </div>
                            @if ($errors->has('family_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('family_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                How do you like to be referred to / called? <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('like_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Name']) !!}
                            </div>
                            @if ($errors->has('like_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('like_name') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Gender<span>*</span>
                            </h2>
                            <div class="gender">
                                <div href="#" class="gender__item">

                                    {!! Form::radio('gender','Male',false, ['class'=>'radio','id'=>'radio1']) !!}
                                    <label for="radio1"><span> Male</span></label>

                                </div>
                                <div href="#" class="gender__item">
                                    {!! Form::radio('gender','Female',false, ['class'=>'radio','id'=>'radio2']) !!}

                                    <label for="radio2"><span>Female</span></label>

                                </div>

                            </div>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Mobile number <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('mobile_number',null,['class'=>'formInput personalForm__input','placeholder'=>'Your mobile number']) !!}
                            </div>
                            @if ($errors->has('mobile_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField ">
                            <h2 class="formLabel personalForm__label">
                                Email address <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                <input type="text" disabled="disabled" class="formInput personalForm__input" placeholder="{{$user->email}}">

                            </div>
                        </div>

                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Address <span>*</span>
                            </h2>
                            <div class="inputWrap">

                                {!! Form::text('address_line1',null,['class'=>'formInput personalForm__input','placeholder'=>'Your address']) !!}
                            </div>
                            @if ($errors->has('address_line1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Address line 2
                            </h2>
                            <div class="inputWrap">

                                {!! Form::text('address_line2',null,['class'=>'formInput personalForm__input','placeholder'=>'Your address line 2']) !!}
                            </div>
                            @if ($errors->has('address_line2'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Town <span>*</span>
                            </h2>
                            <div class="inputWrap">

                                {!! Form::text('town',null,['class'=>'formInput personalForm__input','placeholder'=>'Your town/city']) !!}
{{--                                <span class="inputIco personalForm__ico centeredLink">
                  <i class="fa fa-map-marker"></i>
                </span>--}}
                            </div>
                            @if ($errors->has('town'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Postcode <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                {!! Form::select('postcode_id',$postcodes,null,['class'=>'formInput personalForm__input','placeholder'=>'Please select','style'=>'width:30%']) !!}
--}}
                                {!! Form::text('postcode',null,['class'=>'formInput personalForm__input','placeholder'=>'Your postcode']) !!}

                            </div>
                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                Date of birth <span>*</span>
                            </h2>
                            <div class="inputWrap">

                                @if($purchasersProfile->DoB === "01/01/1970")
                                <input name="DoB" id="datepicker" class="profileField__input" placeholder="dd/mm/yyyy" type="text">
                                @else
                                {!! Form::text('DoB',null,['id'=>'datepicker','class'=>'profileField__input']) !!}
                                @endif
{{--                                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>--}}
                            </div>
                            @if ($errors->has('DoB'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('DoB') }}</strong>
                                    </span>
                            @endif
                        </div>

                    <input type="hidden" name="step" value = '4'>
                    <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>

                        {!! Form::close()!!}


                </div>

            </div>
        </div>
        <div class="registrationBtns">
            <div class="registrationBtns__left">
                <a href="Signup_C_3.html" class="registrationBtns__item registrationBtns__item--back"
                   onclick="event.preventDefault();document.getElementById('stepback').submit();">
                    <i class="fa fa-arrow-left "></i>back
                </a>
{{--                <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
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
        <input type="hidden" name="step" value = '2'>
        <input type="hidden" name="purchasersProfileID" value = {{$purchasersProfileID}}>
        {!! Form::close()!!}