
<div id="languages-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TIME  WHEN CARE NEEDED</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="timeWhenCareNeeded"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'timeWhenCareNeeded']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','timeWhenCareNeeded') !!}
{{Form::submit('Click Me!')}}

<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                First date for Carer
              </span>
            </h2>
            <div class="profileField__input-wrap">
                {{--<input type="text" class="profileField__input" placeholder="06/06/2017">--}}
                @if($serviceUsersProfile->start_date === "01/01/1970")
                    <input name="start_date" id="datepicker_when_start" class="personalForm__input" placeholder="Start date (dd/mm/yyyy)" type="text">
                @else
                    {!! Form::text('start_date',null,['id'=>'datepicker_when_start','class'=>'formInput personalForm__input']) !!}
                @endif
                <span class="profileField__input-ico centeredLink"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
        </div>

        <div class="profileField profileField--two-thirds">
            <div class="checkRow">
                <div class="checkBox_item">
                    {!! Form::checkbox('workingTime['.$workingTimes[1]->id.']', null,($serviceUsersProfile->WorkingTimes->contains('id', $workingTimes[1]->id)? 1 : null),
array('class' =>  'customCheckbox '.$workingTimes[1]->css_name,'id'=>'checkD'.$workingTimes[1]->id)) !!}
                    <label for="checkD{{$workingTimes[1]->id}}">{{$workingTimes[1]->name}}</label>
                </div>
                <div class="checkBox_item">
                    {!! Form::checkbox('workingTime['.$workingTimes[2]->id.']', null,($serviceUsersProfile->WorkingTimes->contains('id', $workingTimes[2]->id)? 1 : null),
array('class' =>  'customCheckbox '.$workingTimes[2]->css_name,'id'=>'checkD'.$workingTimes[2]->id)) !!}
                    <label for="checkD{{$workingTimes[2]->id}}">{{$workingTimes[2]->name}}</label>
                </div>
                <div class="checkBox_item">
                    {!! Form::checkbox('workingTime['.$workingTimes[3]->id.']', null,($serviceUsersProfile->WorkingTimes->contains('id', $workingTimes[3]->id)? 1 : null),
array('class' =>  'customCheckbox '.$workingTimes[3]->css_name,'id'=>'checkD'.$workingTimes[3]->id)) !!}
                    <label for="checkD{{$workingTimes[3]->id}}">{{$workingTimes[3]->name}}</label>
                </div>
                <div class="checkBox_item">
                    {!! Form::checkbox('workingTime['.$workingTimes[0]->id.']', null,($serviceUsersProfile->WorkingTimes->contains('id', $workingTimes[0]->id)? 1 : null),
array('class' =>  'customCheckbox '.$workingTimes[0]->css_name,'id'=>'checkD'.$workingTimes[0]->id)) !!}
                    <label for="checkD{{$workingTimes[0]->id}}">{{$workingTimes[0]->name}}</label>
                </div>
            </div>

        </div>
    </div>

    <?php $bottomTime = $workingTimes->splice(4)?>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <div class="checkRow">

                @foreach($bottomTime->sortBy('byDay') as $workingTime)
                    <div class="checbox_wrap checbox_wrap--date">

                        {!! Form::checkbox('workingTime['.$workingTime->id.']', null,($serviceUsersProfile->WorkingTimes->contains('id', $workingTime->id)? 1 : null),
                        array('class' =>  'checkboxNew '.$workingTime->css_name,'id'=>'checkD'.$workingTime->id)) !!}
                        <label for="checkD{{$workingTime->id}}"><span> {{$workingTime->name}}</span></label>

                    </div>
                @endforeach
            </div>

        </div>

    </div>

</div>
{!! Form::close()!!}