<div id="carerTypeCare" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">TYPE OF CARE OFFERED</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateTypeCare"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
    <span>Please <a target="_blank" href="{{route('ContactPage')}}">contact us</a> if you would like to add Dementia Care, Wounds or Medicine management. Only qualified care workers can do so.</span>

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
                        {!! Form::checkbox('typeCare['.$typeCare->id.']', null,
                        ($carerProfile->AssistantsTypes->contains('id', $typeCare->id)? 1 : null),array('class' =>
                        'checkboxNew','id'=>'check'.$typeCare->id,(in_array($typeCare->name,
                        ['MEDICATION / TREATMENTS','DRESSINGS AND WOUND MANAGEMENT','DEMENTIA CARE']))?'onclick="return false;" data-edit="false"':''
                        )) !!}
                        <label for="check{{$typeCare->id}}"> <span>{{$typeCare->name}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
{!! Form::close()!!}
