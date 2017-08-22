        <div class="registration">
            <div class="registration__column registration__column--with-padding">
                <div class="questionsBox">
                    <h2>Your details</h2>


                    <div class="questionsBox__img">
                        <img src="./dist/img/Signup_C_step4.jpg" alt="">
                    </div>


                </div>

            </div>
            <div class="registration__column  registration__column--bg">
                <div class="personal">

                    {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'personalForm']) !!}
                    {{--<form class="personalForm">--}}

                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Title <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text"  class="formInput personalForm__input" placeholder="Mr / Mrs / Miss / Dr / Prof.">
--}}
                                {!! Form::select('title',['1'=>'Mr','2'=>'Mrs','3'=>'Miss','4'=>'Dr','5'=>'Prof'],
null,['class'=>'formInput personalForm__input','placeholder'=>'Mr / Mrs / Miss / Dr / Prof.']) !!}
                            </div>
                        </div>
                        <div class="formField personalActive">
                            <h2 class="formLabel personalForm__label">
                                first Name <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text"  class="formInput personalForm__input" placeholder="Your name">
--}}
                                {!! Form::text('first_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Your name']) !!}
                            </div>
                        </div>

                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Family name <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder="Last name">
--}}
                                {!! Form::text('family_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Last name']) !!}
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                How do you like to be referred to / called? <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder="Name">
--}}
                                {!! Form::text('like_name',null,['class'=>'formInput personalForm__input','placeholder'=>'Name']) !!}
                            </div>
                        </div>





                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Gender<span>*</span>
                            </h2>
                            <div class="gender">
                                <div href="#" class="gender__item">

                                    {!! Form::radio('gender','Male',false, ['class'=>'radio','id'=>'radio1']) !!}

{{--
                                    <input type="radio" class="radio" id="radio1" name="gender" />
--}}
                                    <label for="radio1"><span> Male</span></label>

                                </div>
                                <div href="#" class="gender__item">
                                    {!! Form::radio('gender','Female',false, ['class'=>'radio','id'=>'radio2']) !!}
{{--
                                    <input type="radio" class="radio" id="radio2" name="gender"/>
--}}
                                    <label for="radio2"><span>Female</span></label>

                                </div>

                            </div>
                        </div>

                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Mobile number <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                {{--<input type="text" disabled="" class="formInput personalForm__input" placeholder="Your mobile number">--}}
                                {!! Form::text('mobile_number',null,['class'=>'formInput personalForm__input','placeholder'=>'Your mobile number']) !!}
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Email address <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                <input type="text" disabled="disabled" class="formInput personalForm__input" placeholder="Your email">

                            </div>
                        </div>

                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Address <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder="Your address ">
--}}
                                {!! Form::text('address_line1',null,['class'=>'formInput personalForm__input','placeholder'=>'Your address']) !!}
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Address line 2
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder="Your address line 2">
--}}
                                {!! Form::text('address_line2',null,['class'=>'formInput personalForm__input','placeholder'=>'Your address line 2']) !!}
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Town <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder="Your town/city">
--}}
                                {!! Form::text('town',null,['class'=>'formInput personalForm__input','placeholder'=>'Your town/city']) !!}
                                <span class="inputIco personalForm__ico centeredLink">
                  <i class="fa fa-map-marker"></i>
                </span>
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Postcode <span>*</span>
                            </h2>
                            <div class="inputWrap">
{{--
                                <input type="text" disabled="" class="formInput personalForm__input" placeholder=" Your postcode">
--}}
                                {!! Form::select('postcode_id',$postcodes,null,['class'=>'formInput personalForm__input','placeholder'=>'Your postcode']) !!}

                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="formLabel personalForm__label">
                                Date of birth <span>*</span>
                            </h2>
                            <div class="inputWrap">
                                <!--<input type="text" disabled="" class="formInput personalForm__input" placeholder="Your date of birth ">
                                   -->
{{--
                                <input type="text" class="profileField__input" placeholder="dd/mm/yyyy">
--}}
                                {!! Form::text('DoB',null,['class'=>'profileField__input','placeholder'=>'dd/mm/yyyy']) !!}
                                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
                            </div>
                        </div>

                    <input type="hidden" name="step" value = '4'>
                    <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>

                        {!! Form::close()!!}

{{--
                    <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="step" value = '4'>
                        <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
                    </form>
--}}
                </div>

            </div>
        </div>
        <div class="registrationBtns">
            <div class="registrationBtns__left">
                <a href="Signup_C_step3.html" class="registrationBtns__item registrationBtns__item--back">
                    <i class="fa fa-arrow-left "></i>back
                </a>
                <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
                    continue later
                </a>
            </div>

            <a href="Signup_C_step5.html" class="registrationBtns__item"
               onclick="event.preventDefault();document.getElementById('step').submit();"
            >
                next step
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>


