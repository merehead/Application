<div id="behaviour-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">BEHAVIOUR</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="behaviour"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i> Save
        </button>
    </div>
</div>

{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'behaviour']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','behaviour') !!}


<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[4]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[4]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[4]->id)) !!}
                <label for="behaviour{{$behaviour[4]->id}}"> <span>{{$behaviour[4]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[7]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[7]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[7]->id)) !!}
                <label for="behaviour{{$behaviour[7]->id}}"> <span>{{$behaviour[7]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[5]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[5]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[5]->id)) !!}
                <label for="behaviour{{$behaviour[5]->id}}"> <span>{{$behaviour[5]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[1]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[1]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[1]->id)) !!}
                <label for="behaviour{{$behaviour[1]->id}}"> <span>{{$behaviour[1]->name}}</span></label>
            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[6]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[6]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[6]->id)) !!}
                <label for="behaviour{{$behaviour[6]->id}}"> <span>{{$behaviour[6]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[2]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[2]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[2]->id)) !!}
                <label for="behaviour{{$behaviour[2]->id}}"> <span>{{$behaviour[2]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[3]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[3]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[3]->id)) !!}
                <label for="behaviour{{$behaviour[3]->id}}"> <span>{{$behaviour[3]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[0]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[0]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[0]->id)) !!}
                <label for="behaviour{{$behaviour[0]->id}}"> <span>{{$behaviour[0]->name}}</span></label>
            </div>
        </div>
    </div>
        <div class="profileRow">

        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">
                {!! Form::checkbox('behaviour['.$behaviour[8]->id.']', null,($serviceUsersProfile->Behaviours->contains('id', $behaviour[8]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'behaviour'.$behaviour[8]->id)) !!}
                <label for="behaviour{{$behaviour[8]->id}}"> <span>{{$behaviour[8]->name}}</span></label>
            </div>
        </div>
    </div>


        <div class="profileRow depend_from_behaviour9" {!!  ($serviceUsersProfile->Behaviours->contains('id', $behaviour[8]->id) )? '' : ' style="display:none"'!!}>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                  <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                    Details </span>
                </h2>

                {!! Form::text('other_behaviour',null,['class'=>'profileField__input','placeholder'=>'Type details','maxlength'=>"200"]) !!}
                @if ($errors->has('other_behaviour'))
                    <span class="help-block"><strong>{{ $errors->first('other_behaviour') }}</strong></span>
                @endif
            </div>
        </div>




    <div class="profileRow depend_from_have_incontinence">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">Has a doctor's note or court order saying that they are not able to give consent </span>
            </h2>
            <?php if (isset($atrr)) unset($atrr); $atrr = ['class' => 'profileField__select serviceUserProfile consent_switcher'];
            if (is_null($serviceUsersProfile->consent)) $atrr['placeholder'] = 'Please select';?>
            {!! Form::select('consent',['Yes'=>'Yes','No'=>'No'],null,$atrr) !!}
            @if ($errors->has('consent'))
                <span class="help-block"><strong>{{ $errors->first('consent') }}</strong></span>
            @endif
        </div>

    </div>
    <div class="profileRow depend_from_consent" {!!  ($serviceUsersProfile->consent != 'Yes' || is_null($serviceUsersProfile->consent) )? ' style="display:none"' : ''!!}>
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle"><span
                        class="ordinaryTitle__text ordinaryTitle__text--smaller">PLEASE, GIVE DETAILS</span></h2>
            {!! Form::textarea('consent_details',null,['class'=>'profileField__area ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('consent_details'))
                <span class="help-block"><strong>{{ $errors->first('consent_details') }}</strong></span>
            @endif
        </div>
    </div>


</div>
{!! Form::close()!!}