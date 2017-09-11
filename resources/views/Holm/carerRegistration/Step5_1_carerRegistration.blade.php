<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Further information</h2>


            <div class="questionsBox__img">
                <img src="/img/Signup_C_step5_1.jpg" alt="">
            </div>



        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
                {!! Form::model($carersProfile,['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Please can you give further details of your past criminal convictions. Please give details of the nature of the conviction, the date, and any further information you wish to provide.
                        <span>*</span> </h2>

                    <div class="inputWrap">

                        {!! Form::textarea('criminal_detail',null,['class'=>'formArea','placeholder'=>' Detailed response']) !!}

                    </div>

                    @if ($errors->has('criminal_detail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('criminal_detail') }}</strong>
                                    </span>
                    @endif
                </div>
            <input type="hidden" name="step" value = '5_1'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}
{{--            </form>
            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}

            </form>--}}
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>

    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>
{!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'stepback','class'=>'personalForm']) !!}
<input type="hidden" name="step" value = '4'>
<input type="hidden" name="stepback" value = '4'>
<input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
{!! Form::close()!!}
