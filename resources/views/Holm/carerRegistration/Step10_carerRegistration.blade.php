<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>ASSISTANCE</h2>

            <div class="questionsBox__img">
                <img src="/img/Signup_C_step10.jpg" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($assistanceTypes,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of assistance  are you looking to provide?  <span>*</span>
                    </h2>
                    @foreach($assistanceTypes as $assistanceType)
                        <div class="checkBox_item">


                            <?php $id = 'boxf'.$assistanceType->id ?>
                            {!! Form::checkbox('assistanceType['.$assistanceType->id.']', null,($carersProfile->AssistantsTypes->contains('id', $assistanceType->id)? 1 : null),
                            array('class' => 'customCheckbox','id'=>$id)) !!}
                            <label for="boxf{{$assistanceType->id}}">{{$assistanceType->name}}</label>

                        </div>
                    @endforeach
                    @if ($errors->has('assistanceType'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('assistanceType') }}</strong>
                                    </span>
                    @endif


                </div>
            <input type="hidden" name="step" value = '10'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step9.html" class="registrationBtns__item registrationBtns__item--back"
onclick="event.preventDefault();document.getElementById('stepback').submit();"
>
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step11.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '8'>
<input type="hidden" name="stepback" value = '8'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}