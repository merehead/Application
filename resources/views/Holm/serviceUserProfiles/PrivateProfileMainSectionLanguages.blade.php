
<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Languages</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>

{!! Form::model($serviceUsersProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateLanguages']) !!}
{!! Form::hidden('id',$serviceUsersProfile->id) !!}
{!! Form::hidden('stage','languages') !!}

<div class="borderContainer">

    @foreach(array_chunk($languages->all(),4) as $languageCareRow)
        <div class="profileRow">
            @foreach($languageCareRow as $language)
                <div class="profileField profileField--fourth">
                    <div class="checbox_wrap">
                        {!! Form::checkbox('languages['.$language->id.']', null,($serviceUsersProfile->Languages->contains('id', $language->id)? 1 : null),array('class' => 'checkboxNew','id'=>'checkL'.$language->id)) !!}
                        <label for="checkL{{$language->id}}"> <span>{{$language->carer_language}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    @if(strlen($serviceUsersProfile->other_languages))
        <div class="profileRow">

            <div class="profileField profileField--two-thirds">
                <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Other languages   </span>
                </h2>
                {!! Form::text('other_languages',null,['class'=>'profileField__input','placeholder'=>'Details','maxlength'=>"120"]) !!}
                @if ($errors->has('other_languages'))
                    <span class="help-block"><strong>{{ $errors->first('other_languages') }}</strong></span>
                @endif
            </div>
        </div>
    @endif
</div>
{{ Form::close() }}

