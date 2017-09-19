<div id="carerLanguages" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Languages</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateLanguages"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
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
                            {!! Form::checkbox('languages['.$language->id.']', null,($carerProfile->Languages->contains('id', $language->id)? 1 : null),array('class' => 'checkboxNew','id'=>'checkL'.$language->id)) !!}
                            <label for="checkL{{$language->id}}"> <span>{{$language->carer_language}}</span></label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @if(strlen($carerProfile->language_additional))
            <div class="profileRow">

                <div class="profileField profileField--two-thirds">
                    <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Other languages   </span>
                    </h2>
                    {!! Form::text('language_additional',null,['class'=>'profileField__input','placeholder'=>'Details']) !!}
                    {{--      <input type="text" class="profileField__input" placeholder="Details">--}}
                </div>
            </div>
        @endif
</div>
{{ Form::close() }}

<div id="carerTransport" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Transport</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateTransport"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateTransport']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateTransport') !!}
<div class="borderContainer">
    <div class="profileRow profileRow--start">
        <div class="profileField">
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  Driving licence
                </span>
                </h2>

                {!! Form::select('driving_licence',['Yes'=>'Have UK/EEA Driving Licence','No'=>'Do not have a driving licence'],
                null,['class'=>'profileField__select profileField__select--greyBg','disabled','data-edit'=>'false']) !!}
{{--                <select class="profileField__select profileField__select--greyBg">
                    <option value="Flat">Have UK/EEA Driving Licence</option>
                    <option value="Flat">Do not have a driving licence</option>
                    <option value="Flat">Please select</option>
                </select>--}}
            </div>
        </div>
        <div class="profileField">
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 Car for Work
                </span>
                </h2>
                {!! Form::select('have_car',['Yes'=>'Car for work','No'=>'Do not have a car'],
null,['class'=>'profileField__select','id'=>'type_car_work']) !!}

{{--                <select class="profileField__select ">
                    <option value="Flat">Car for work</option>
                    <option value="Flat">Do not have a car</option>
                    <option value="Flat">Please select</option>
                </select>--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                Transport clients
                </span>
                </h2>
                {!! Form::select('use_car',['Yes'=>'Transport clients','No'=>'Can not transport clients'],
null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}


{{--                <select class="profileField__select ">
                    <option value="Flat">Transport clients</option>
                    <option value="Flat">Can not transport clients</option>
                    <option value="Flat">Please select</option>
                </select>--}}

            </div>
        </div>

        <div class="profileField">
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  UK\EEA Driving licence photo
                </span>
                </h2>

                <div class="addContainer">
                    <input disabled class="pickfiles-change" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
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
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 UK\EEA Driving licence Number
                </span>
                </h2>
                {!! Form::text('DBS_number',null,['class'=>'profileField__input profileField__input--greyBg','placeholder'=>'Driving licence number','readonly','data-edit'=>'false']) !!}
                {{--<input type="text" class="profileField__input profileField__input--greyBg" placeholder="UK\EEA Driving licence Number">--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 Valid until
                </span>
                </h2>

                @if($carerProfile->driver_licence_valid_until === "01/01/1970")
                    <input name="driver_licence_valid_until" id="datepicker_driver_licence" class="profileField__input" placeholder="Valid until date" type="text">
                @else
                    {!! Form::text('driver_licence_valid_until',null,['id'=>'datepicker_driver_licence','class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif

                {{--<input type="text" class="profileField__input " placeholder="Valid until date">--}}
            </div>
        </div>

        <div class="profileField car-block">
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  Car insurance Photo
                </span>
                </h2>
                <div class="addContainer">
                  <input disabled class="pickfiles-change" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
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
                 Car insurance Number
                </span>
                </h2>
                {!! Form::text('car_insurance_number',null,['class'=>'profileField__input profileField__input--greyBg','placeholder'=>'Car insurance number','readonly','data-edit'=>'false']) !!}
               {{-- <input type="text" class="profileField__input profileField__input--greyBg" placeholder="Car insurance number">--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 Valid until
                </span>
                </h2>

                @if($carerProfile->car_insurance_valid_until === "01/01/1970")
                    <input name="car_insurance_valid_until" id="datepicker_insurance" class="profileField__input" placeholder="Valid until date" type="text">
                @else
                    {!! Form::text('car_insurance_valid_until',null,['id'=>'datepicker_insurance','class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif

            </div>
        </div>

    </div>
</div>

{{ Form::close() }}
