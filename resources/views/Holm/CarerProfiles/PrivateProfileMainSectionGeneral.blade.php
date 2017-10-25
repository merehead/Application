<div id="carerGeneral" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">General</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateGeneral"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateGeneral']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('is_data_changed',0) !!}
{!! Form::hidden('stage','general') !!}
<div class="borderContainer" id='carerPrivateGeneral'>
    @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionGeneral_profileInfoContainer')
    @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionGeneral_CVandPassport')
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Contacts
    </h2>
    <div class="profileRow">

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 1 <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('address_line1',null,['class'=>'profileField__input','data-country'=>'Manchester,United Kingdom','maxlength'=>'120']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 2
              </span>
            </h2>
            {!! Form::text('address_line2',null,['class'=>'profileField__input','maxlength'=>'120']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Town / city <span class="requireIco">*</span>
              </span>
            </h2>
            <div class="profileField__input-wrap">

                {!! Form::text('town',null,['class'=>'profileField__input','maxlength'=>'60']) !!}
                {{--                <span class="profileField__input-ico centeredLink">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                              </span>--}}
            </div>

        </div>


    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Post code <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('postcode',null,['class'=>'profileField__input','id'=>'post_code_profile','data-country'=>'Manchester,United Kingdom','maxlength'=>'10']) !!}
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Mobile Number <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('mobile_number',null,['class'=>'profileField__input digitFilter07','maxlength'=>'11']) !!}
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Email ADDRESS <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('user_email',null,['class'=>'profileField__input','data-edit'=>'false']) !!}

        </div>
    </div>

    <div class="profileMap" style="width:100%;height:450px;display:none;">
        <div id="map_canvas" style="clear:both; height:450px;"></div>
        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119257097!2d-0.38180351472723606!3d51.528735197655706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1498824096837"--}}
                {{--width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
    </div>
</div>

<div class="borderContainer borderContainer--noBorder">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Able work legally in the UK </span>
            </h2>
{{--            <select class="profileField__select  profileField__select--greyBg">
                <option value="Yes">Able work legally in the UK</option>
            </select>--}}
            {!! Form::select('work_UK',['Yes'=>'Yes','No'=>'No'],
null,['class'=>'profileField__select  profileField__select--greyBg','disabled','data-edit'=>'false']) !!}
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                 working Restrictions in the UK </span>
            </h2>
{{--            <select class="profileField__select profileField__select--greyBg">
                <option value="Yes">Do not have restrictions to work in the uk</option>
            </select>--}}
            {!! Form::select('work_UK_restriction',['Yes'=>'Yes','No'=>'No'],
null,['class'=>'profileField__select  profileField__select--greyBg','id'=>'depend-if-work','disabled',
'data-edit'=>'false']) !!}
        </div>
        <div class="profileField depend_hiding-work">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                 working Restrictions</span>
            </h2>
        {!! Form::text('work_UK_description',null,['class'=>'profileField__input','disabled','data-edit'=>'false']) !!}

        </div>
        </div>
        <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                National Insurance Number </span>
            </h2>
        {!! Form::text('national_insurance_number',null,['class'=>'profileField__input','maxlength'=>'20']) !!}

        </div>

    </div>
</div>
<div class="borderContainer">
    <div class="profileCategory profileCategory--noBg">
        <h2 class="profileCategory__title">one line summary</h2>

    </div>
    <div class="profileRow">

        <div class="profileField profileField--full-width">

            {!! Form::text('sentence_yourself',null,['class'=>'profileField__input','maxlength'=>"80"]) !!}

{{--
            {!! Form::text('sentence_yourself',null,['class'=>'profileField__input','maxlength'=>512]) !!}
--}}

            {{--
                        <input type="text" class="profileField__input" placeholder="{{$carerProfile->sentence_yourself}}">
            --}}
        </div>
    </div>


</div>
<div class="borderContainer ">
    <div class="profileCategory profileCategory--noBg">
        <h2 class="profileCategory__title">About me</h2>

    </div>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <!--    <h2 class="profileField__title ordinaryTitle">
                 <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                   How should the carer enter the Service User’s home?    </span>
               </h2>-->

            {!! Form::textarea('description_yourself',null,['class'=>'formArea','placeholder'=>'Your text','maxlength'=>"600"]) !!}

        </div>
    </div>

</div>

<div class="borderContainer ">
    <h2 class="fieldCategory">
        Personal References
    </h2>
    <div class="profileRow">


        @foreach($carerProfile->CarerReferences as $number=>$carerReference)
            <div class="profileField ">
                {!! Form::hidden('Persons['.$number.'][id]',$carerReference->id) !!}
                <h2 class="profileSubcategory">Person #{{$number+1}}
                </h2>
                <div class="profileField profileField--full-width">
                    <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  name
                </span>
                    </h2>

                    {!! Form::text('Persons['.$number.'][name]',$carerReference->name,['class'=>'profileField__input','maxlength'=>'60']) !!}
                </div>
                <div class="profileField profileField--full-width">
                    <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Job Title
                </span>
                    </h2>

                    {!! Form::text('Persons['.$number.'][job_title]',$carerReference->job_title,['class'=>'profileField__input','maxlength'=>'60']) !!}
                </div>
                <div class="profileField profileField--full-width">
                    <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Relationship
                </span>
                    </h2>

                    {!! Form::text('Persons['.$number.'][relationship]',$carerReference->relationship,['class'=>'profileField__input','maxlength'=>'60']) !!}
                </div>
                <div class="profileField profileField--full-width">
                    <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Phone number
                </span>
                    </h2>

                    <?php
                        ($number == 0)? $class = 'profileField__input digitFilter0': $class = 'profileField__input digitFilter0v2' ;
                    ?>

                    {!! Form::text('Persons['.$number.'][phone]',$carerReference->phone,['class'=>$class,'placeholder'=>'07000000000', 'maxlength'=>'11']) !!}
                </div>
                <div class="profileField profileField--full-width">
                    <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Email
                </span>
                    </h2>

                    {!! Form::text('Persons['.$number.'][email]',$carerReference->email,['class'=>'profileField__input','maxlength'=>'60']) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

{!! Form::close()!!}
