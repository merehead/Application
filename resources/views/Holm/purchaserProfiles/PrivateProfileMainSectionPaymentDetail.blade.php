<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Payments Details</h2>
        <a href="#" class="profileCategory__link"
           onclick="event.preventDefault();document.getElementById('Payment').submit();">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>
<div class="borderContainer">
{{--    <h2 class="fieldCategory">
        Payments Details
    </h2>--}}

    {!! Form::model($purchaserProfile, ['method'=>'POST','route'=>'purchaserSettingsPost','id'=>'Payment']) !!}
    {!! Form::hidden('id',null) !!}
    {!! Form::hidden('stage','payment') !!}


    <div class="profileRow">

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                CARDHOLDER'S NAME <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('name_of_cardholder',null,['class'=>'profileField__input','placeholder'=>'CARDHOLDER\'S NAME']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                PAYMENT CARD NUMBER <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('payment_card_number',null,['class'=>'profileField__input','placeholder'=>'PAYMENT CARD NUMBER']) !!}

        </div>


        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                EXPIRY DATE <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('expiry_date',null,['class'=>'profileField__input','placeholder'=>'EXPIRY DATE']) !!}


        </div>


    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                cvv <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('cvv',null,['class'=>'profileField__input','placeholder'=>'CVV']) !!}

        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                PAYPAL/AMAZON DETAILS <span class="requireIco">*</span>
              </span>
            </h2>
            {!! Form::text('paypal_amazon_details',null,['class'=>'profileField__input','placeholder'=>'PAYPAL/AMAZON DETAILS']) !!}


        </div>
    </div>
    {!! Form::close()!!}
</div>