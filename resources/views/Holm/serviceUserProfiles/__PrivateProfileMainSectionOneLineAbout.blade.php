<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">one line about {{($serviceUsersProfile->care_for=='Myself')?'your':$userNameForSite}}</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>
{!! Form::model($serviceUsersProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateLanguages']) !!}
{!! Form::hidden('id',$serviceUsersProfile->id) !!}
{!! Form::hidden('stage','oneLineAbout') !!}

<div class="borderContainer">

    <div class="profileRow">

        <div class="profileField profileField--full-width">
            {!! Form::text('one_line_about',null,['class'=>'profileField__input','placeholder'=>'One line about the '.($serviceUsersProfile->care_for=='Myself')?'yourself':'person','maxlength'=>"250"]) !!}
            @if ($errors->has('one_line_about'))
                <span class="help-block"><strong>{{ $errors->first('one_line_about') }}</strong></span>
            @endif
        </div>
    </div>
</div>

{!! Form::close()!!}