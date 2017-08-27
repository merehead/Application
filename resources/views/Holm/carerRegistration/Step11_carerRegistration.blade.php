<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Availability</h2>
            <div class="questionsBox__img">
                <img src="./img/Signup_C_step11.jpg" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        When are you normally available to work?  <span>*</span>
                    </h2>
                    <div class="registrationCheckboxes registrationCheckboxes--single">
                        <div class="checkBox_item">

                            <?php $first = $workingTimes->shift();
                            $id = 'boxf'.$first->id
                            ?>

                            {{--<input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">--}}
                                {!! Form::checkbox('workingTime['.$first->id.']', null,null,array('class' => 'customCheckbox','id'=>$id)) !!}

                                <label for="boxf{{$first->id}}">{{$first->name}}</label>


                        </div>
                    </div>
                    <div class="registrationCheckboxes">

                        @foreach($workingTimes as $workingTime)
                            <div class="checkBox_item">


                                <?php $id = 'boxf'.$workingTime->id ?>
                                {!! Form::checkbox('workingTime['.$workingTime->id.']', null,null,array('class' => 'customCheckbox','id'=>$id)) !!}
                                <label for="boxf{{$workingTime->id}}">{{$workingTime->name}}</label>

                            </div>
                        @endforeach

                    </div>

                    @if ($errors->has('workingTime'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('workingTime') }}</strong>
                                    </span>
                    @endif
                </div>




                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Are you willing to work bank holidays? <span>*</span>
                    </h2>
                    <div class="inputWrap">


                        {!! Form::select('work_at_holiday',['1'=>'Yes','2'=>'No'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                    </div>

                    @if ($errors->has('work_at_holiday'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('work_at_holiday') }}</strong>
                                    </span>
                    @endif
                </div>



                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        How much notice do you need to take a job?
                    </h2>
                    <div class="profileField__input-wrap ">
                        <div class="jobTime">
                            <ul class="timeDropdown">
                                <li>
                                    <a href="#" class="timeDropdown__link">
                                        hours <i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                            </ul>
                            {!! Form::number('work_hours',null,['class'=>'profileField__number']) !!}


                        </div>
                        @if ($errors->has('work_hours'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('work_hours') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>
            <input type="hidden" name="step" value = '11'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
{{--        <a href="Signup_C_step10.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>--}}
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step12.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

