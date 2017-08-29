<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TYPE OF CARE offered</h2>
        <a href="#" class="profileCategory__link"
           onclick="event.preventDefault();document.getElementById('carerPrivateTypeCare').submit();"
        >
            <i class="fa fa-pencil"></i>
        </a>
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
                        {!! Form::checkbox('typeCare['.$typeCare->id.']', null,($carerProfile->AssistantsTypes->contains('id', $typeCare->id)? 1 : null),array('class' => 'checkboxNew','id'=>'check'.$typeCare->id)) !!}
                        <label for="check{{$typeCare->id}}"> <span>{{$typeCare->name}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
{!! Form::close()!!}
