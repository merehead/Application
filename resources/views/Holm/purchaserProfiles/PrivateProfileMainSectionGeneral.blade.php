<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">General</h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="PrivateGeneral"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($purchaserProfile, ['method'=>'POST','route'=>'purchaserSettingsPost','id'=>'PrivateGeneral']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','general') !!}
<div class="borderContainer">
    <div class="profileInfoContainer">
        <div class="generalInfo">
            <div class="profilePhoto profilePhoto--change">
                <img src="./img/no_photo.png" alt="">
                <a href="#" class="profilePhoto__ico">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            </div>
            <div class="generalInfo__text">
                <div class="generalInfo__elem">
                    <p>first name</p><span>{{$purchaserProfile->first_name}} </span>
                </div>
                <div class="generalInfo__elem">
                    <p>last name</p><span>{{$purchaserProfile->family_name}} </span>
                </div>
                <div class="generalInfo__elem">
                    <p>gender</p><span>{{$purchaserProfile->gender}} </span>
                </div>
                <div class="generalInfo__elem">
                    <p>year of birth</p><span>{{substr($purchaserProfile->DoB,6)}} </span>
                </div>



            </div>
        </div>
        <div class="total total--bonus ">
            <div class="total__item totalBox">
                <p class="totalPrice">£0</p>
                <p class="totalTitle">
                    Bonus earned from referrals
                </p>
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
            {!! Form::text('like_name',null,['class'=>'profileField__input','placeholder'=>'I like to be called']) !!}
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
            {!! Form::text('address_line1',null,['class'=>'profileField__input']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 2
              </span>
            </h2>
            {!! Form::text('address_line2',null,['class'=>'profileField__input']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Town / city <span class="requireIco">*</span>
              </span>
            </h2>
            <div class="profileField__input-wrap">

                {!! Form::text('town',null,['class'=>'profileField__input']) !!}
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
            {!! Form::text('postcode',null,['class'=>'profileField__input']) !!}
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Mobile Number <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('mobile_number',null,['class'=>'profileField__input']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Email ADDRESS <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('user_email',$user->email,['class'=>'profileField__input']) !!}

        </div>
    </div>

    <div class="profileMap" style="width:100%;height:450px">
        <div id="map_canvas" style="clear:both; height:450px;"></div>
    </div>
</div>
{!! Form::close()!!}