<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Languages</h2>

            <div class="questionsBox__img">
                <img src="{{asset('/img/Signup_P_step29.jpg')}}" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::model($serviceUserProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUserProfileID],'id'=>'step','class'=>'questionForm']) !!}

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What languages does {{$userNameForSite}} speak? <span>*</span>
                    </h2>
                    <div class="inputWrap">

                        <div class="registrationCheckboxes">

                            @foreach($languages as $language)
                                <div class="checkBox_item">

                                    {!! Form::checkbox('languages['.$language->id.']', null,($serviceUserProfile->Languages->contains('id', $language->id)? 1 : null),
                                    array('class' => 'customCheckbox','id'=>'boxf'.$language->id)) !!}
                                    <label for="boxf{{$language->id}}">{{$language->carer_language}}</label>

                                </div>

                            @endforeach
                                @if ($errors->has('languages'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('languages') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="formField hiding" style="display: none">
                            <h2 class="formLabel questionForm__label">
                                If other, please state
                            </h2>
                            <div class="inputWrap">
                                {!! Form::text('other_languages',null,['class'=>'formArea ','placeholder'=>'Other','maxlength'=>"200"]) !!}
                                @if ($errors->has('other_languages'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_languages') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>


                    </div>


                </div>

            <input type="hidden" name="step" value='29'>
            <input type="hidden" name="serviceUserProfileID" value= {{$serviceUserProfileID}}>
            {!! Form::close()!!}
        </div>

    </div>

</div>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='29'>
    <input type="hidden" name="stepback" value='27'>
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