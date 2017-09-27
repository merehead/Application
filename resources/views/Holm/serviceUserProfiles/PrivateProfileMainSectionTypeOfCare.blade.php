
<div id="typeOfCare-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TYPE OF CARE NEEDED</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="typeOfCare"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>

{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'typeOfCare']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','typeOfCare') !!}


<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[0]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[0]->id)? 1 : null),
                array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[0]->id)) !!}
                <label for="checkSrvType{{$typeService[0]->id}}"> <span>{{$typeService[0]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[0]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[0]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[0]->id)) !!}
                <label for="checkSrvCare{{$typeCare[0]->id}}"> <span>{{$typeCare[0]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[1]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[1]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[1]->id)) !!}
                <label for="checkSrvCare{{$typeCare[1]->id}}"> <span>{{$typeCare[1]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[2]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[2]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[2]->id)) !!}
                <label for="checkSrvCare{{$typeCare[2]->id}}"> <span>{{$typeCare[2]->name}}</span></label>

            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[1]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[1]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[1]->id)) !!}
                <label for="checkSrvType{{$typeService[1]->id}}"> <span>{{$typeService[1]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[3]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[3]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[3]->id)) !!}
                <label for="checkSrvCare{{$typeCare[3]->id}}"> <span>{{$typeCare[3]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[4]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[4]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[4]->id)) !!}
                <label for="checkSrvCare{{$typeCare[4]->id}}"> <span>{{$typeCare[4]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[5]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[5]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[5]->id)) !!}
                <label for="checkSrvCare{{$typeCare[5]->id}}"> <span>{{$typeCare[5]->name}}</span></label>

            </div>
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[2]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[2]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[2]->id)) !!}
                <label for="checkSrvType{{$typeService[2]->id}}"> <span>{{$typeService[2]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[6]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[6]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[6]->id)) !!}
                <label for="checkSrvCare{{$typeCare[6]->id}}"> <span>{{$typeCare[6]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[7]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[7]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[7]->id)) !!}
                <label for="checkSrvCare{{$typeCare[7]->id}}"> <span>{{$typeCare[7]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('checkSrvCare['.$typeCare[8]->id.']', null,($serviceUsersProfile->AssistantsTypes->contains('id', $typeCare[8]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvCare'.$typeCare[8]->id)) !!}
                <label for="checkSrvCare{{$typeCare[8]->id}}"> <span>{{$typeCare[8]->name}}</span></label>

            </div>
        </div>

    </div>


</div>
{{ Form::close() }}