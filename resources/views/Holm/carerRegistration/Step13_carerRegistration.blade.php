<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Languages</h2>

            <div class="questionsBox__img">
                <img src="./img/Signup_C_step13.jpg" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Which languages can you speak confidently? <span>*</span>
                    </h2>
                    <div class="registrationCheckboxes registrationCheckboxes--half">

                        @foreach($languages as $language)
                            <div class="checkBox_item">

                                <?php $id = 'boxf'.$language->id ?>
                                {!! Form::checkbox('languages['.$language->id.']', null,null,array('class' => 'customCheckbox','id'=>$id)) !!}
                                <label for="boxf{{$language->id}}">{{$language->carer_language}}</label>

                            </div>

                        @endforeach
                    </div>


                </div>
                            @if ($errors->has('languages'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('languages') }}</strong>
                                    </span>
                            @endif
                        <div class="formField">
                            <h2 class="formLabel questionForm__label">
                                If other, please state
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('language_additional',null,['class'=>'formInput','placeholder'=>'Other']) !!}

                            </div>
                            @if ($errors->has('language_additional'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('language_additional') }}</strong>
                                    </span>
                            @endif
                        </div>





                <input type="hidden" name="step" value = '13'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>

            {!! Form::close() !!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step12.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step14.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '11'>
<input type="hidden" name="stepback" value = '11'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}