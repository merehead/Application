<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">General</h2>
        <a href="#" class="profileCategory__link"
           onclick="event.preventDefault();document.getElementById('PrivateGeneral').submit();">
            <i class="fa fa-pencil"></i>
        </a>
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

    <div class="profileMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119257097!2d-0.38180351472723606!3d51.528735197655706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1498824096837" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
{!! Form::close()!!}