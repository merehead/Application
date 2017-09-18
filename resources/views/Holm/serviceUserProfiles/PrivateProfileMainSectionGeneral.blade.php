<div id="serviceGeneral" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">General</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="carerPrivateGeneral"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'servicePrivateGeneral']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','general') !!}

{{Form::submit('Click Me!')}}

<div class="borderContainer">
    <div class="profileInfoContainer">
        <div class="generalInfo">
            <div class="profilePhoto profilePhoto--change">
                <img src="/img/no_photo.png" alt="">
                <a href="#" class="profilePhoto__ico">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            </div>
            <div class="generalInfo__text">

                <div class="generalInfo__elem">
                    <p>first name</p><span>{{$serviceUsersProfile->first_name}}</span>
                </div>
                <div class="generalInfo__elem">
                    <p>last name</p><span>{{$serviceUsersProfile->family_name}}</span>
                </div>
                <div class="generalInfo__elem">
                    <p>gender</p><span>{{$serviceUsersProfile->gender}} </span>
                </div>
                <div class="generalInfo__elem">
                    <p>date of birth</p><span>{{$serviceUsersProfile->DoB}}</span>
                </div>


            </div>
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                I like to be called <span class="requireIco">*</span>
              </span>
            </h2>

            {!! Form::text('like_name',null,['class'=>'profileField__input','placeholder'=>'Your name','maxlength'=>"120"]) !!}
            @if ($errors->has('like_name'))
                <span class="help-block"><strong>{{ $errors->first('like_name') }}</strong></span>
            @endif

        </div>
    </div>
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


            {!! Form::text('address_line1',null,['class'=>'profileField__input','placeholder'=>'Address','maxlength'=>"120"]) !!}
            @if ($errors->has('address_line1'))
                <span class="help-block"><strong>{{ $errors->first('address_line1') }}</strong></span>
            @endif

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 2
              </span>
            </h2>

            {!! Form::text('address_line2',null,['class'=>'profileField__input','placeholder'=>'Address','maxlength'=>"120"]) !!}
            @if ($errors->has('address_line2'))
                <span class="help-block"><strong>{{ $errors->first('address_line2') }}</strong></span>
            @endif
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Town / city <span class="requireIco">*</span>
              </span>
            </h2>
            <div class="profileField__input-wrap">

                {!! Form::text('town',null,['class'=>'profileField__input','placeholder'=>'City','maxlength'=>"120"]) !!}
                @if ($errors->has('town'))
                    <span class="help-block"><strong>{{ $errors->first('town') }}</strong></span>
                @endif

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
                Postcode <span class="requireIco">*</span>
              </span>
            </h2>

            {!! Form::text('postcode',null,['class'=>'profileField__input','placeholder'=>'Postcode','maxlength'=>"120"]) !!}
            @if ($errors->has('postcode'))
                <span class="help-block"><strong>{{ $errors->first('postcode') }}</strong></span>
            @endif
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Mobile Number
              </span>
            </h2>
            {!! Form::text('mobile_number',null,['class'=>'profileField__input','placeholder'=>'Mobile number ','maxlength'=>"120"]) !!}
            @if ($errors->has('mobile_number'))
                <span class="help-block"><strong>{{ $errors->first('mobile_number') }}</strong></span>
            @endif

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Email
              </span>
            </h2>
            <input type="text" disabled="disabled" class="profileField__input" placeholder="{{$user->email}}">

        </div>
    </div>

    <div class="profileMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119257097!2d-0.38180351472723606!3d51.528735197655706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1498824096837" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">one line about {{$userNameForSite}}</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>
{!! Form::close()!!}

{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserRegistrationController@update',$serviceUsersProfile->id],'id'=>'servicePrivateGeneral']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','oneLineAbove') !!}
<div class="borderContainer">

    <div class="profileRow">

        <div class="profileField profileField--full-width">

            {!! Form::text('one_line_about',null,['class'=>'profileField__input','placeholder'=>'One line about the person','maxlength'=>"120"]) !!}
            @if ($errors->has('one_line_about'))
                <span class="help-block"><strong>{{ $errors->first('one_line_about') }}</strong></span>
            @endif
        </div>
    </div>
</div>
{!! Form::close()!!}