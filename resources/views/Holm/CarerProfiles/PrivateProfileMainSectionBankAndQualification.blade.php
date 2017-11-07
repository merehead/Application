<div id="carerBank" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">BANK ACCOUNT </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivateBank"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>

    </div>
</div>

{!! Form::model($carerProfile, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateBank']) !!}
{!! Form::hidden('id',$carerProfile->id) !!}
{!! Form::hidden('stage','bank') !!}
<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                SORT CODE
              </span>

            </h2>
            {!! Form::text('sort_code',$carerProfile->sort_code,['class'=>'profileField__input','placeholder'=>'Sort code',
            'maxlength'=>14]) !!}
        </div>
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                ACCOUNT NUMBER
              </span>

            </h2>
            {!! Form::text('account_number',$carerProfile->account_number,['class'=>'profileField__input digitFilter onlyNumber',
            'placeholder'=>'Account number','type'=>'number','maxlength'=>30]) !!}
            @if ($errors->has('account_number'))
                <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>
{!! Form::close()!!}

<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">QUALIFICATIONS </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerQUALIFICATIONS"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($user, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerQUALIFICATIONS']) !!}
<div class="borderContainer" id="carerPrivateAvailability">
    <div class="profileRow profileRow-nvq">
        <div class="profileField profileField_q">
            <span>Certificate 1</span>
            <div class="addContainer">
              <input disabled class="pickfiles" value=""
                accept="" type="file" />
              <img id="nvq" class="pickfiles_img"/>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="nvq" class="addInfo__input" placeholder="Name" maxlength="25">
            </div>
        </div>
    </div>
</div>
{!! Form::close()!!}
