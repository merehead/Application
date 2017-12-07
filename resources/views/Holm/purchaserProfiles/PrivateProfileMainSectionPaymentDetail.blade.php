<script>
    function addCard(form) {

    }

    function deleteCard(form) {
        $(form).parent().remove();
        $.ajax({
            url: $(form).attr('action'),
            data: $(form).serialize(),
            type: 'get',
            dataType: "application/json",
            success: function (response) {

            },
            error: function (response) {
                console.log(response)
            }
        });
    }
    $(document).ready(function(){
        $('a.btn-edit').on('click',function(){
            $('a.addCard').show();
            $('a.deleteCard').show();
        });
       $('a.deleteCard').on('click',function(e){
           e.preventDefault();
           //$(this).parent().parent().remove();
            deleteCard(document.getElementById('deleteCard'));
            return false;
        });
        $('a.addCard').on('click',function(e){
            e.preventDefault();
            var form = document.getElementById('addCard');
            $.ajax({
                url: $(form).attr('action'),
                data: $(form).serialize(),
                type: 'POST',
                dataType: "json",
                success: function (response) {
                    if(response.data.card){
                        $('div.card-list h2').after(response.data.card)
                    }
                    console.log(response);
                },
                error: function (response) {
                    console.log(response)
                }
            });
        });
    });
</script>
<!-- <div class="borderContainer">
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
</div> -->

<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Payment details</h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="addCard"></span> EDIT</a>
    </div>
    <div class="row">
        <div class="col-md-6">
                <div class="card-list">
                <h2 class="formLabel">
                    List of Cards
                </h2>
                @foreach(\App\User::find(Auth::user()->id)->credit_cards as $card)

                <div class="card-list-box">
                    <p class="card-list__item">
                        xxxx xxxx xxxx {{$card->last_four}}
                    </p>
                    <form id="deleteCard" action="{{route('DeleteCreditCards',['card_id'=>$card->id])}}" method="DELETE">
                        <div class="payment-control payment-control--for-card ">
                            <a href="#" class="payment-control__item payment-control__item--delete deleteCard" style="display: none">
                                <i class="fa fa-trash"></i>
                                <span>delete</span>
                            </a>
                        </div>
                    </form>

                </div>
                @endforeach



            </div>
        </div>
        <form id="addCard" method="post" action="{{route('CreditCards')}}">
            {{ csrf_field()  }}
        <div class=" col-lg-5 col-lg-offset-1 col-md-6">
            <div class="profile-payment">
                <h2 class="formLabel">
                    Card Number
                </h2>
                <div class="inputWrap">
                    <input type="text"  name="number" class="formInput" placeholder="">
                    <span class="bookPayment__ico bookPayment__ico--first">
                    <img src="/img/mc.png" alt="">
                  </span>
                    <span class="bookPayment__ico">
                    <img src="/img/visa.png" alt="">
                  </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="formLabel">
                        Valid Until
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inputWrap">
                                <input type="text" name="exp_month" class="formInput" placeholder="MM">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputWrap inputWrap--md-margin">
                                <input type="text" name="exp_year" class="formInput" placeholder="YY">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <h2 class="formLabel">
                        CVC CODE
                    </h2>
                    <div class="inputWrap">
                        <input type="text" name="cvc" class="formInput" placeholder="">
                    </div>
                </div>
            </div>
            <div class="payment-control">
                <a href="#"  class="payment-control__item addCard" style="display: none">
                    Save payment details
                </a>
            </div>
        </div>
        </form>
    </div>
</div>

