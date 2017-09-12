<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Times</h2>


            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step6.jpg')}}" alt="">
            </div>

        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        When would {{$serviceUserProfile->like_name}} like someone to help?  <span>*</span>
                    </h2>
                    <div class="registrationCheckboxes registrationCheckboxes--single">
                        <div class="checkBox_item">

                            <?php $first = $workingTimes->shift();
                            $id = 'boxf'.$first->id
                            ?>

                            {!! Form::checkbox('workingTime['.$first->id.']', null,($serviceUserProfile->WorkingTimes->contains('id', $first->id)? 1 : null),array('class' => 'customCheckbox '.$first->css_name,'id'=>$id)) !!}

                            <label for="boxf{{$first->id}}">{{$first->name}}</label>


                        </div>
                    </div>
                    <div class="registrationCheckboxes">

                        @foreach($workingTimes as $workingTime)
                            <div class="checkBox_item">


                                <?php $id = 'boxf'.$workingTime->id ?>
                                {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($serviceUserProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),array('placeholder'=>'1','class' => 'customCheckbox '.$workingTime->css_name,'id'=>$id)) !!}
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
            <input type="hidden" name="step" value='6'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>

</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='6'>
    <input type="hidden" name="stepback" value='5'>
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