<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Payments Details</h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="Payment"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>

    {!! Form::model($purchaserProfile, ['method'=>'POST','route'=>'purchaserSettingsPost','id'=>'Payment']) !!}
    {!! Form::hidden('id',null) !!}
    {!! Form::hidden('stage','payment') !!}
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

    <div class="payment-control">
        <a href="#" class="payment-control__item payment-control__item--delete">
            <i class="fa fa-trash"></i>
            <span>delete</span>
        </a>
        <a href="#" class="payment-control__item">
            <i class="fa fa-plus"></i>
            <span>add</span>
        </a>
    </div>
    {!! Form::close()!!}
</div>