<div id="carerTypeCare" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TYPE OF CARE offered</h2>
        <a href="#" class="btn btn-info"><span class="fa fa-pencil" data-id="carerPrivateTypeCare"></span> EDIT</a>
        <a href="#" onclick="event.preventDefault();document.getElementById('carerPrivateTypeCare').submit();" class="btn btn-success hidden"><span class="glyphicon glyphicon-floppy-disk"></span> SAVE</a>
    </div>
</div>
{!! Form::model($typeCare, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateTypeCare']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateTypeCare') !!}
<div class="borderContainer">
    @foreach(array_chunk($typeCare->all(),4) as $typeCareRow)
        <div class="profileRow">
        @foreach($typeCareRow as $typeCare)
                <div class="profileField profileField--fourth">
                    <div class="checbox_wrap">
                        {!! Form::checkbox('typeCare['.$typeCare->id.']', null,($carerProfile->AssistantsTypes->contains('id', $typeCare->id)? 1 : null),array('class' => 'checkboxNew','id'=>'check'.$typeCare->id,(in_array($typeCare->name,['MEDICATION / TREATMENTS','DRESSINGS AND WOUND MANAGEMENT','DEMENTIA CARE']))?'onclick="return false;"':'')) !!}
                        <label for="check{{$typeCare->id}}"> <span>{{$typeCare->name}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
{!! Form::close()!!}
