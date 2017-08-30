<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Care</h2>

            <div class="questionsBox__img">
                <img src="./img/Signup_C_step9.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {{--<form class="questionForm">--}}
                {!! Form::model($serviceTypes,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What type of service are you looking to provide?  <span>*</span>
                    </h2>

                    @foreach($serviceTypes as $serviceType)
                        <div class="checkBox_item">


                            <?php $id = 'boxf'.$serviceType->id ?>
                        {!! Form::checkbox('serviceType['.$serviceType->id.']', null,($carersProfile->ServicesTypes->contains('id', $serviceType->id)? 1 : null),
                        array('class' => 'customCheckbox','id'=>$id)) !!}
                            <label for="boxf{{$serviceType->id}}">{{$serviceType->name}}</label>

                        </div>
                    @endforeach

                    @if ($errors->has('serviceType'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('serviceType') }}</strong>
                                    </span>
                    @endif
                </div>
                <input type="hidden" name="step" value = '9'>
                <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>

                {!! Form::close()!!}

        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step8.html" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="Signup_C_step10.html" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '7'>
<input type="hidden" name="stepback" value = '7'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}