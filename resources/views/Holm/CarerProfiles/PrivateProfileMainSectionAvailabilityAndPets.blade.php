<div id="carerAvailability" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">AVAILABILITY</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateAvailability"></span>
            EDIT</a>

        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>

    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateAvailability']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateAvailability') !!}
<div class="borderContainer">
    <div class="profileRow profileRow--start">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
               Notice to take a job
              </span>
            </h2>
            <div class="profileField__input-wrap ">
                <div class="jobTime">

                    {!! Form::select('times',['HOURS'=>'HOURS','DAYS'=>'DAYS','WEEKS'=>'WEEKS'],null,['id'=>'workingTimes','class'=>'formSelect','style'=>'with:120px;']) !!}
                    {!! Form::number('work_hours',null,['class'=>'profileField__number']) !!}

                </div>


            </div>
        </div>


<?php $bottomTime = $workingTimes->splice(4);?>


        <div class="profileField profileField--two-thirds profileField--content-end  ">
            <div class="checkRow checkRow--margin-bottom">

                @foreach($workingTimes as $step=>$workingTime)
                    <div class="checkBox_item">

                        @if($step==0)
                 {{--           {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($carerProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),
                            array('class' => 'customCheckbox '.$workingTime->css_name,'id'=>'boxG'.$workingTime->id)) !!}
                            <label for="boxG{{$workingTime->id}}">{{$workingTime->name}}</label>
--}}
                        @else

                        {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($carerProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),
                        array('class' => 'customCheckbox '.$workingTime->css_name,'id'=>'boxG'.$workingTime->id)) !!}
                        <label for="boxG{{$workingTime->id}}">{{$workingTime->name}}</label>

                        @endif
                    </div>
                @endforeach

                    <?php $workingTime = $workingTimes->shift()?>
                    {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($carerProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),
                                                array('class' => 'customCheckbox '.$workingTime->css_name,'id'=>'boxG'.$workingTime->id)) !!}
                    <label id="boxG1" for="boxG{{$workingTime->id}}">{{$workingTime->name}}</label>
            </div>

            <div class="profileField profileField--half">

                {!! Form::select('work_at_holiday',['Yes'=>'Work on bank holidays','No'=>'Can not work bank holidays'],
null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}

            </div>

        </div>
    </div>

    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <div class="checkRow">

                @foreach($bottomTime->sortBy('sort') as $workingTime)
                    <div class="checbox_wrap checbox_wrap--date">

                        {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($carerProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),
                        array('class' =>  'checkboxNew '.$workingTime->css_name,'id'=>'checkD'.$workingTime->id)) !!}
                        <label for="checkD{{$workingTime->id}}"><span> {{$workingTime->name}}</span></label>

                    </div>
                @endforeach
            </div>

        </div>

    </div>



</div>
{!! Form::close() !!}

<div id="carerPets" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Work with pets</h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivatePets"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivatePets']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivatePets') !!}
<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Work with pets
              </span>
            </h2>
{{--            <select class="profileField__select">


                <option value="yes">It depends</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <option value="select">Please select</option>

            </select>--}}

            {!! Form::select('work_with_pets',['Yes'=>'Yes','No'=>'No','It Depends'=>'It Depends'],
null,['id'=>'depend-if','class'=>'formSelect','placeholder'=>'Please select']) !!}

        </div>
        <div class="profileField profileField--two-thirds depend_hiding" style="display: none">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Details   </span>
            </h2>
            {!! Form::text('pets_description',null,['class'=>'profileField__input','placeholder'=>'Details']) !!}
      {{--      <input type="text" class="profileField__input" placeholder="Details">--}}
        </div>
    </div>
</div>
{!! Form::close() !!}