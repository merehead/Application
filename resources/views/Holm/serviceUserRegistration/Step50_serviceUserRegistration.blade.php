<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Behaviour</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step50.jpg')}}" alt="">
            </div>
        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Does {{$userNameForSite}} demonstrate any of the following? - (we will contact you later for
                        further details). <span>*</span>
                    </h2>

                    @foreach($behaviours as $behaviour)
                        <div class="checkBox_item">


                            {!! Form::checkbox('behaviour['.$behaviour->id.']', null,
                            ($serviceUserProfile->Behaviours->contains('id', $behaviour->id)? 1 : null),
                            array('placeholder'=>'1','class' => 'customCheckbox','id'=>'boxf'.$behaviour->id)) !!}
                            <label for="boxf{{$behaviour->id}}">{{$behaviour->name}}</label>

                        </div>
                    @endforeach
                    @if ($errors->has('behaviour'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('behaviour') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        If other, please state
                    </h2>
                    <div class="inputWrap">

                        {!! Form::text('other_behaviour',null,['class'=>'formInput','placeholder'=>'Details']) !!}
                        @if ($errors->has('other_behaviour'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('other_behaviour') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <input type="hidden" name="step" value='50'>
                <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='50'>
    <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='50'>
    <input type="hidden" name="stepback" value='48'>
    <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
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