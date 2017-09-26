<div id="languages-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Languages</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="languages"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>


{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'languages']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','languages') !!}
{{Form::submit('Click Me!')}}

<div class="borderContainer">

    @foreach(array_chunk($languages->all(),4) as $languageCareRow)
        <div class="profileRow">
            @foreach($languageCareRow as $language)

                <div class="profileField profileField--fourth">
                    <div class="checbox_wrap">

                        <?php $language->id<10? $tmp = '0'.$language->id  : $tmp = $language->id; ?>

                        {!! Form::checkbox('languages['.$tmp.']', null,

                        ($serviceUsersProfile->Languages->containsStrict('carer_language', $language->carer_language) ? 1 : null),


                        array('class' => 'checkboxNew','id'=>'checkL'.$language->carer_language)) !!}
                        <label for="checkL{{$language->carer_language}}"> <span>{{$language->carer_language}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach




{{--            <div class="profileRow">
                @foreach($languages as $language)

                    <div class="profileField profileField--fourth">
                        <div class="checbox_wrap">

                            <input type="checkbox" id="coding" name="interest" value="coding" checked>
                            <label for="coding">Coding</label>
                        </div>
                    </div>
                @endforeach
            </div>--}}



    @if(strlen($serviceUsersProfile->other_languages))
        <div class="profileRow">

            <div class="profileField profileField--full-width">
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

