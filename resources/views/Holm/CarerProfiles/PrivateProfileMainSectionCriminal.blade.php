
<div id="carerCriminal" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">CRIMINAL RECORDS </h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateCriminal"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateCriminal']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','carerPrivateCriminal') !!}
<div class="borderContainer">
    <div class="profileRow profileRow-- ">
        <div class="profileField profileField--space">
            <div class="profileField profileField--full-width">


                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  Please, contact us if you need to update information
                </span>
                </h2>


                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                  Have up to date DBS certificate
                </span>
                </h2>

{{--
                {!! Form::select('DBS',['Yes'=>'Have up to date DBS certificate','No'=>'Have not a DBS'],null,['id'=>'main-if','class'=>'profileField__select profileField__select--greyBg','readonly','data-edit'=>'false']) !!}
--}}
                {!! Form::select('DBS',['Yes'=>'Yes','No'=>'No'],null,['id'=>'main-if','class'=>'profileField__select profileField__select--greyBg','readonly','data-edit'=>'false']) !!}

{{--                <select class="profileField__select profileField__select--greyBg">
                    <option value="Flat">Have an up to date DBS</option>
                </select>--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 criminal convictions
                </span>
                </h2>

                {!! Form::select('criminal_conviction',['Some'=>'Yes, but they are very old, and for a minor offence.',
                'Yes'=>'Yes','No'=>'Do not have criminal convictions'],
null,['class'=>'profileField__select','readonly','id'=>'criminal_detail','data-edit'=>'false']) !!}

{{--                <select class="profileField__select profileField__select--greyBg">
                    <option value="Flat">Do not have criminal convictions</option>
                </select>--}}

            </div>
            <div class="profileField profileField--full-width criminal_detail nhide">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                CRIMINAL CONVICTIONS Details
                     </span></h2>
                <div class="inputWrap criminal_detail">

                    {!! Form::textarea('criminal_detail',null,['class'=>'formArea','noPlaceholder'=>' Detailed response']) !!}

                </div>
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                Using the new DBS update service
                </span>
                </h2>

{{--
                {!! Form::select('DBS_use',['Yes'=>'Use the new DBS update service','No'=>'Do not use the new DBS update service'],null,['class'=>'profileField__select profileField__select--greyBg','noPlaceholder'=>'Please select']) !!}
--}}

                {!! Form::select('DBS_use',['Yes'=>'Yes','No'=>'No'],null,['class'=>'profileField__select profileField__select--greyBg']) !!}

{{--                <select class="profileField__select profileField__select--greyBg">
                    <option value="Flat">Use the new DBS update service</option>
                </select>--}}
            </div>
        </div>


        <div class="profileField" @if(strtolower($carerProfile->DBS_use)=='no')style="display: none" id="dpsBlock"@endif>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">

                  DBS certificate Photo
                </span>

                </h2>

                <div class="addContainer">
                  <input disabled class="pickfiles" type="file" />
                  <span class="pickfiles-delete">X</span>

                  <div id="dbs_certificate_photo" class="pickfiles_img"></div>
                    <a class="add add--moreHeight">
                        <i class="fa fa-plus-circle"></i>
                        <div class="add__comment add__comment--smaller"></div>
                    </a>
                </div>
                <div style="display: none" class="addInfo">
                    <input disabled type="text" name="dbs_certificate_photo" class="addInfo__input" noPlaceholder="Name" >
                </div>

            </div>

            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 DBS UPDATE SERVICE IDENTIFIER
                </span>

                </h2>
                {!! Form::text('DBS_identifier',null,['class'=>'profileField__input','placeholder'=>'DBS certificate number','maxlength'=>'20']) !!}
                {{--<input type="text" class="profileField__input " noPlaceholder="DBS certificate number">--}}
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ">
                 DBS date certificate {{($carerProfile->date_certificate)}}
                </span>

                </h2>

                @if($carerProfile->date_sertificate === false)
                    <input name="dbs_date" id="datepicker_date_sertificate" class="profileField__input"
                           placeholder="Valid until date" type="text">
                @else
                    {!! Form::text('dbs_date',null,['id'=>'datepicker_date_sertificate',
                    'class'=>'profileField__input','placeholder'=>'Valid until date']) !!}
                @endif
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
