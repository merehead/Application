<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>{{$userNameForSite}}'s Health</h2>
            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step17.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Does {{$userNameForSite}} have any of the following conditions?
                </h2>
                <div class="inputWrap">

                    @foreach($serviceUserConditions as $serviceUserCondition)
                        <div class="checkBox_item">


                            {!! Form::checkbox('workingTime['.$serviceUserCondition->id.']', null,
                            ($serviceUserProfile->ServiceUserConditions->contains('id', $serviceUserCondition->id)? 1 : null),
                            array('placeholder'=>'1','class' => 'customCheckbox checkHealthCondition','id'=>'boxf'.$serviceUserCondition->id)) !!}
                            <label for="boxf{{$serviceUserCondition->id}}">{{$serviceUserCondition->name}}</label>

                        </div>
                    @endforeach

                </div>


            </div>


            <div class="formField any_checked" style="display: none">
                <h2 class="formLabel questionForm__label">
                    Please give details of all the conditions mentioned above.
                </h2>

                <div class="inputWrap">
                    {!! Form::textarea('conditions_detail',null,['class'=>'formArea ','placeholder'=>'Details','maxlength'=>"500"]) !!}
                    @if ($errors->has('conditions_detail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('conditions_detail') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
            <input type="hidden" name="step" value='17'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>
    </div>

</div>


<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='17'>
    <input type="hidden" name="stepback" value='15'>
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