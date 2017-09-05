<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Who is it for?</h2>
            <div class="questionsBox__img">
                <img src="./img/Signup_P_step3.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($purchasersProfile,['method'=>'POST','route'=>'PurchaserRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Are your Purchasing Care for yourself or someone else? <span>*</span>
                </h2>
                <div class="inputWrap">
                    {!! Form::select('purchasing_care_for',['Someone else'=>'Someone else','Myself'=>'Myself'],
null,['class'=>'formSelect','placeholder'=>'Please select']) !!}
                </div>
                @if ($errors->has('purchasing_care_for'))
                    <span class="help-block">
                        <strong>{{ $errors->first('purchasing_care_for') }}</strong>
                    </span>
                @endif
            </div>
            <input type="hidden" name="step" value='3'>
            <input type="hidden" name="purchasersProfileID" value= {{$purchasersProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>
<form id="stepback" method="POST" action="{{ route('PurchaserRegistrationPost') }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='3'>
    <input type="hidden" name="stepback" value='1'>
    <input type="hidden" name="purchasersProfileID" value= {{$purchasersProfileID}}>
</form>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
    </div>

    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>

