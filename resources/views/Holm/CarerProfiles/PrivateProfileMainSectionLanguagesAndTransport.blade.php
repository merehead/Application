<div id="carerLanguages" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Languages</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateLanguages"></span>
            EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i> Save
        </button>
    </div>
</div>


{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateLanguages']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateLanguages') !!}

<div class="borderContainer">

    @foreach(array_chunk($languages->all(),4) as $languageCareRow)
        <div class="profileRow">
            @foreach($languageCareRow as $language)

                <div class="profileField profileField--fourth">
                    <div class="checbox_wrap">

                        <?php $language->id < 10 ? $tmp = '0' . $language->id : $tmp = $language->id; ?>

                        {!! Form::checkbox('languages['.(($language->id<10) ? '0'.$language->id:$language->id).']', null,

                        ($carerProfile->Languages->containsStrict('carer_language', $language->carer_language) ? 1 : null),


                        array('class' => 'checkboxNew','id'=>'checkL'.$language->carer_language)) !!}
                        <label for="checkL{{$language->carer_language}}">
                            <span>{{$language->carer_language}}</span></label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach



    {{--
        @foreach(array_chunk($languages->all(),4) as $languageCareRow)
            <div class="profileRow">
                @foreach($languageCareRow as $language)
                    <div class="profileField profileField--fourth">
                        <div class="checbox_wrap">
                            {!! Form::checkbox('languages['.$language->id.']', null,
                            ($carerProfile->Languages->contains('id', $language->id)? 1 : null),
                            array('class' => 'checkboxNew','id'=>'checkL'.$language->id)) !!}
                            <label for="checkL{{$language->id}}"> <span>{{$language->carer_language}}</span></label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
--}}


    <div class="profileRow language_additional ">

        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Other languages   </span>
            </h2>
            {!! Form::text('language_additional',null,['class'=>'profileField__input','placeholder'=>'Details','maxlength'=>'250']) !!}
            {{--      <input type="text" class="profileField__input" noPlaceholder="Details">--}}
        </div>
    </div>


</div>
{{ Form::close() }}

<div id="carerTransport" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Transport</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateTransport"></span>
            EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i> Save
        </button>
    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateTransport']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateTransport') !!}
<div class="borderContainer">
    <div class="profileRow profileRow--start">
        <div class="profileField profileField-mr">
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ">Driving licence</span>
                </h2>
                {!! Form::select('driving_licence',['Yes'=>'Have UK/EEA Driving Licence','No'=>'Do not have a driving licence'],
                null,['class'=>'profileField__select profileField__select--greyBg','disabled','data-edit'=>'false',
                'id'=>'driving_license'])!!}
            </div>
            <div class="profileField hiding_profile profileField--full-width"
                    {!!  ($carerProfile->driving_licence == 'No' || is_null($carerProfile->driving_licence) )? 'style="display:none"' : ''!!}>
                <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ">Car for Work</span>
                </h2>
                <?php if (isset($atrr)) unset($atrr); $atrr = ['class'=>'profileField__select','id'=>'type_car_work'];
                if (is_null($carerProfile->have_car)) $atrr['placeholder'] = 'Please select';?>
                {!! Form::select('have_car',['Yes'=>'Have a car for work','No'=>'Do not have a car'],
                null,$atrr) !!}
            </div>

            @if(($carerProfile->driving_licence == 'No' || is_null($carerProfile->driving_licence)))
            @else
                <div class="profileField hiding_profile profileField--full-width"
                        {!!  ($carerProfile->driving_licence == 'No' || is_null($carerProfile->driving_licence) )? 'style="display:none"' : ''!!}>
                    <h2 class="profileField__title ordinaryTitle"><span
                                class="ordinaryTitle__text ">Transport clients</span></h2>
                    <?php if (isset($atrr)) unset($atrr); $atrr = ['class'=>'profileField__select','id'=>'profile_use_car'];
                    if (is_null($carerProfile->use_car)) $atrr['placeholder'] = 'Please select';?>
                    {!! Form::select('use_car',['Yes'=>'Can transport clients','No'=>'Can not transport clients'],
                    null,$atrr) !!}
                </div>
            @endif
        </div>
        <div class="profileField hiding_profile profileField-mr"
                {!!  ($carerProfile->driving_licence == 'No' || is_null($carerProfile->driving_licence) )? 'style="display:none"' : ''!!}>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ">UK\EEA Driving licence photo</span></h2>

                <div class="addContainer">
                    <input disabled class="pickfiles-change" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx"
                           type="file"/>
                    <div id="driving_licence_photo" class="pickfiles_img"></div>
                    <a class="add add--moreHeight">
                        <i class="fa fa-plus-circle"></i>
                        <div class="add__comment add__comment--smaller"></div>
                    </a>
                </div>
                <div style="display: none" class="addInfo">
                    <input disabled type="text" name="driving_licence_photo" class="addInfo__input" placeholder="Name">
                </div>

            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ">UK\EEA Driving licence Number</span></h2>
                {!! Form::text('DBS_number',null,['class'=>'profileField__input profileField__input--greyBg','placeholder'=>'Driving licence number','readonly','data-edit'=>'false']) !!}
                {{--<input type="text" class="profileField__input profileField__input--greyBg" noPlaceholder="UK\EEA Driving licence Number">--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle"><span class="ordinaryTitle__text ">Valid until</span></h2>

                @if($carerProfile->driver_licence_valid_until === "01/01/1970")
                    <input name="driver_licence_valid_until" id="datepicker_driver_licence" class="profileField__input"
                           noPlaceholder="Valid until date" type="text">
                @else
                    {!! Form::text('driver_licence_valid_until',null,['id'=>'datepicker_driver_licence','class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif


            </div>
        </div>



        <div class="profileField car-block hiding_profile_car_insurance profileField-mr "
                {!!  ($carerProfile->driving_licence == 'No' || is_null($carerProfile->driving_licence) ||
                 $carerProfile->have_car == 'No' || is_null($carerProfile->have_car) )? 'style="display:none"' : ''!!}>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  Car insurance Photo
                </span>
                </h2>
                <div class="addContainer">
                    <input disabled class="pickfiles-change" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx"
                           type="file"/>
                    <div id="car_insurance_photo" class="pickfiles_img"></div>
                    <a class="add add--moreHeight">
                        <i class="fa fa-plus-circle"></i>
                        <div class="add__comment add__comment--smaller"></div>
                    </a>
                </div>
                <div style="display: none" class="addInfo">
                    <input disabled type="text" name="car_insurance_photo" class="addInfo__input" placeholder="Name">
                </div>

            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 Car insurance policy
                </span>
                </h2>
                {!! Form::text('car_insurance_number',null,['class'=>'profileField__input profileField__input--greyBg','placeholder'=>'Car insurance number','readonly','data-edit'=>'false']) !!}
                {{-- <input type="text" class="profileField__input profileField__input--greyBg" noPlaceholder="Car insurance number">--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 Valid until
                </span>
                </h2>

                @if($carerProfile->car_insurance_valid_until === "01/01/1970")
                    <input name="car_insurance_valid_until" id="datepicker_insurance" class="profileField__input"
                           placeholder="Valid until date" type="text">
                @else
                    {!! Form::text('car_insurance_valid_until',null,['id'=>'datepicker_insurance','class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif

            </div>
        </div>

    </div>
</div>

{{ Form::close() }}
