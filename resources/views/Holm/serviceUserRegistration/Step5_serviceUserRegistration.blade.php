<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Care</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step5.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">

                {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of care is {{($serviceUserProfile->purchaser->purchasing_care_for=='Myself')?'are you':$serviceUserProfile->like_name}} looking to purchase? <span>*</span>
                    </h2>

                    @foreach($serviceTypes as $serviceType)
                        <div class="checkBox_item">


                            <?php $id = 'boxf'.$serviceType->id ?>
                            {!! Form::checkbox('serviceType['.$serviceType->id.']', null,($serviceUserProfile->ServicesTypes->contains('id', $serviceType->id)? 1 : null),
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
                <input type="hidden" name="step" value='5'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='5'>
    <input type="hidden" name="stepback" value='4_1_2_3'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="{{route('thankYouSrvUser',[$serviceUserProfileID])}}" class="registrationBtns__item registrationBtns__item--later">
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
