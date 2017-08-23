<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>ASSISTANCE</h2>



            <div class="questionsBox__img">
                <img src="./img/Signup_C_step10.jpg" alt="">
            </div>




        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            {!! Form::open(['method'=>'POST','route'=>'CarerRegistrationPost','id'=>'step','class'=>'questionForm']) !!}


                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        What kind of assistance  are you looking to provide?  <span>*</span>
                    </h2>
                    @foreach($assistanceTypes as $assistanceType)
                        <div class="checkBox_item">


                            <?php $id = 'boxf'.$assistanceType->id ?>
                            {!! Form::checkbox('assistanceType['.$assistanceType->id.']', null,null,array('class' => 'customCheckbox','id'=>$id)) !!}
                            <label for="boxf{{$assistanceType->id}}">{{$assistanceType->name}}</label>

                        </div>
                    @endforeach
{{--                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf3">
                        <label for="boxf3">PERSONAL CARE </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf4">
                        <label for="boxf4"> DEMENTIA CARE</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf5">
                        <label for="boxf5">HOUSEKEEPING </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf6">
                        <label for="boxf6"> FOOD / NUTRITION</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf7">
                        <label for="boxf7">DRESSINGS AND WOUND MANAGEMENT
                        </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf8">
                        <label for="boxf8"> COMPANIONSHIP</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf9">
                        <label for="boxf9"> TRAVEL / VISITS / EXCURSIONS</label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf10">
                        <label for="boxf10">MEDICATION / TREATMENTS </label>
                    </div>

                    <div class="checkBox_item">
                        <input type="checkbox" name="checkbox" class="customCheckbox" id="boxf11">
                        <label for="boxf11"> MOBILITY</label>
                    </div>--}}





                </div>
            <input type="hidden" name="step" value = '10'>
            <input type="hidden" name="carersProfileID" value = {{$carersProfileID}}>
            {!! Form::close()!!}
{{--            <form id="step" method="POST" action="{{ route('CarerRegistrationPost') }}">
                {{ csrf_field() }}
            </form>--}}
        </div>

    </div>
</div>
<div class="registrationBtns">
    <div class="registrationBtns__left">
        <a href="Signup_C_step9.html" class="registrationBtns__item registrationBtns__item--back">
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="Thank__you.html" class="registrationBtns__item registrationBtns__item--later">
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
