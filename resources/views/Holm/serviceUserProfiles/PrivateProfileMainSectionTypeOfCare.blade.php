<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TYPE OF CARE NEEDED</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>

{!! Form::model($serviceUsersProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateLanguages']) !!}
{!! Form::hidden('id',$serviceUsersProfile->id) !!}
{!! Form::hidden('stage','whenCareNeeded') !!}

<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[0]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[0]->id)? 1 : null),
                array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[0]->id)) !!}
                <label for="checkL{{$typeService[0]->id}}"> <span>{{$typeService[0]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[0]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[0]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[0]->id)) !!}
                <label for="checkL{{$typeCare[0]->id}}"> <span>{{$typeCare[0]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[1]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[1]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[1]->id)) !!}
                <label for="checkL{{$typeCare[1]->id}}"> <span>{{$typeCare[1]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[2]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[2]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[2]->id)) !!}
                <label for="checkL{{$typeCare[2]->id}}"> <span>{{$typeCare[2]->name}}</span></label>

            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[1]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[1]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[1]->id)) !!}
                <label for="checkL{{$typeService[1]->id}}"> <span>{{$typeService[1]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[3]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[3]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[3]->id)) !!}
                <label for="checkL{{$typeCare[3]->id}}"> <span>{{$typeCare[3]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[4]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[4]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[4]->id)) !!}
                <label for="checkL{{$typeCare[4]->id}}"> <span>{{$typeCare[4]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[5]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[5]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[5]->id)) !!}
                <label for="checkL{{$typeCare[5]->id}}"> <span>{{$typeCare[5]->name}}</span></label>

            </div>
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeService[2]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeService[2]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeService[2]->id)) !!}
                <label for="checkL{{$typeService[2]->id}}"> <span>{{$typeService[2]->name}}</span></label>
            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[6]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[6]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[6]->id)) !!}
                <label for="checkL{{$typeCare[6]->id}}"> <span>{{$typeCare[6]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[7]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[7]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[7]->id)) !!}
                <label for="checkL{{$typeCare[7]->id}}"> <span>{{$typeCare[7]->name}}</span></label>

            </div>
        </div>
        <div class="profileField profileField--fourth">
            <div class="checbox_wrap">

                {!! Form::checkbox('typeService['.$typeCare[8]->id.']', null,($serviceUsersProfile->ServicesTypes->contains('id', $typeCare[8]->id)? 1 : null),
array('class' => 'checkboxNew','id'=>'checkSrvType'.$typeCare[8]->id)) !!}
                <label for="checkL{{$typeCare[8]->id}}"> <span>{{$typeCare[8]->name}}</span></label>

            </div>
        </div>

    </div>


</div>
{{ Form::close() }}