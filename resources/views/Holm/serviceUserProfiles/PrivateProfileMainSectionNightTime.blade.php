<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Night-time</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>

    {!! Form::model($serviceUsersProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateLanguages']) !!}
    {!! Form::hidden('id',$serviceUsersProfile->id) !!}
    {!! Form::hidden('stage','other') !!}


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has problems getting dressed for bed
              </span>
            </h2>
            {!! Form::select('getting_dressed_for_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('getting_dressed_for_bed'))
                <span class="help-block"><strong>{{ $errors->first('getting_dressed_for_bed') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('dressed_for_bed_details',null,['class'=>'profileField__input ','placeholder'=>'Type details']) !!}
            @if ($errors->has('dressed_for_bed_details'))
                <span class="help-block"><strong>{{ $errors->first('dressed_for_bed_details') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                What time would they like someone to come and help?
                <span class="requireIco">*</span> 
              </span>
            </h2>
            <div class="profileField__input-wrap">
                @if(empty($serviceUserProfile->time_to_bed))
                    <input name="time_to_bed" id="timepicker" class="profileField__input" placeholder="Time" type="text">
                @else
                    {!! Form::text('time_to_bed',null,['id'=>'timepicker','class'=>'profileField__input']) !!}
                @endif
                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </span>
            </div>
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
             Needs assistance keeping safe at night
              </span>
            </h2>
            {!! Form::select('keeping_safe_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('keeping_safe_at_night'))
                <span class="help-block"><strong>{{ $errors->first('keeping_safe_at_night') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('keeping_safe_at_night_details',null,['class'=>'profileField__input ','placeholder'=>'Type details']) !!}
            @if ($errors->has('keeping_safe_at_night_details'))
                <span class="help-block"><strong>{{ $errors->first('keeping_safe_at_night_details') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                What time would they like someone to help?
                <span class="requireIco">*</span> 
              </span>
            </h2>
            <div class="profileField__input-wrap">
                @if(empty($serviceUserProfile->time_to_night_helping))

                    <input name="time_to_night_helping" id="timepicker" class="profileField__input" placeholder="Time" type="text">
                @else
                    {!! Form::text('time_to_night_helping',null,['id'=>'timepicker','class'=>'profileField__input']) !!}
                @endif
                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </span>
            </div>
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
             Needs help going to the toilet at night
              </span>
            </h2>
            {!! Form::select('toilet_at_night',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('toilet_at_night'))
                <span class="help-block"><strong>{{ $errors->first('toilet_at_night') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('toiled_help_details',null,['class'=>'profileField__input ','placeholder'=>'Type details']) !!}
            @if ($errors->has('toiled_help_details'))
                <span class="help-block"><strong>{{ $errors->first('toiled_help_details') }}</strong></span>
            @endif
        </div>
    </div>

</div>
{!! Form::close()!!}