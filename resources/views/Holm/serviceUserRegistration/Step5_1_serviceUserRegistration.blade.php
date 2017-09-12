<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2> Assistance</h2>

            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step5_1.jpg')}}" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of assistance is {{$serviceUserProfile->like_name}} looking to purchase? (you can select as many as you like)<span>*</span>
                    </h2>
                    @foreach($assistanceTypes as $assistanceType)
                        <div class="checkBox_item">


                            <?php $id = 'boxf'.$assistanceType->id ?>
                            {!! Form::checkbox('assistanceType['.$assistanceType->id.']', null,($serviceUserProfile->AssistantsTypes->contains('id', $assistanceType->id)? 1 : null),
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
            <input type="hidden" name="step" value='5_1'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='5_1'>
    <input type="hidden" name="stepback" value='4_1_2_4'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
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