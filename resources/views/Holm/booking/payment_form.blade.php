<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="/serviceUser-settings/booking/{{$serviceUser->id}}" class="breadcrumbs__item">
                Booking Payment
            </a>
        </div>
        <div class="bookPaymentWrap">
            <h2 class="paymentDetails">
                Payment details
            </h2>
            <div class="bookPayment">
                <div>
                    <div class="paySwitch">
                        <a href="Checkout_for_Purchaser__CARD.html" class="paySwitch__item paySwitch__item--active bookPayment__form-switch">
                            card
                        </a>
                        <a href="Checkout_for_Purchaser__BONUS.html" class="paySwitch__item bonusPay-header-switch">
                            Bonus wallet
                        </a>
                    </div>
                    <form action="" class="bookPayment__form bookPayment__form-header">
                        <div class="card-list">
                            @foreach(\App\User::find(Auth::user()->id)->credit_cards as $card)
                            <div class="card-list__item">
                                <input type="radio" class="theme-radio" value="{{$card->id}}" id="radio-payment{{$card->id}}" name="card_id">
                                <label for="radio-payment{{$card->id}}"><span> xxxx xxxxx xxxx {{$card->last_four}}</span></label>
                            </div>
                            @endforeach
                            <div class="card-list__item">
                                <input type="radio" class="theme-radio new_card" id="radio-payment0" name="card_id">
                                <label for="radio-payment0"><span> New card</span></label>
                            </div>
                        </div>
                        <div class="bookPayment__field">
                            <h2 class="formLabel">
                                Card Number
                            </h2>
                            <div class="inputWrap">
                                <input type="text" class="formInput" id="cardNumber" placeholder="4534 3333 3333 3333 3333">
                                <span class="bookPayment__ico"><img src="{{asset("img/visa.png")}}" alt=""></span>
                                <span style="right: 42px;" class="bookPayment__ico"><img src="{{asset("img/mc2.png")}}"
                                                                              alt=""></span>
                            </div>
                        </div>
                        <div class="bookPayment__row bookPayment__row--xs-column">
                            <div class="bookPayment__halfColumn   bookPayment__halfColumn--xs-full">
                                <h2 class="formLabel">
                                    Valid Until
                                </h2>
                                <div class="bookPayment__row">
                                    <div class="bookPayment__halfColumn">
                                        <div class="formField">
                                            <div class="inputWrap">
                                                <input type="text" id="cardMonth" class="formInput" placeholder="MM">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bookPayment__halfColumn">
                                        <div class="formField">
                                            <div class="inputWrap">
                                                <input type="text" id="cardYear" class="formInput" placeholder="YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="bookPayment__halfColumn bookPayment__halfColumn--xs-full">
                                <div class="formField">
                                    <h2 class="formLabel">
                                        cvc code
                                    </h2>
                                    <div class="inputWrap">
                                        <input type="text" id="cardCVC" class="formInput" placeholder="202">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paymentCheckbox">
                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="buttonPaymentCard1">
                                <label for="buttonPaymentCard1"> save payment details?</label>
                            </div>
                            <input type="hide" name="save_card" class="customCheckbox" id="save_card">
                        </div>
                        <div class="roundedBtn roundedBtn--center">
                            <a href="#" class="roundedBtn__item roundedBtn__item--confirm" id="buttonPaymentCard">
                                Confirm Payment
                            </a>
                        </div>
                    </form>
                    <div class="bonusPay-header" style="display: none">
                        <div class="bonusPay">
                            <div class="bonusPay__item">
                                <p>
                                    Bonuses balance
                                </p>
                                <p>
                                    Bonuses balance after payment
                                </p>
                            </div>
                            <div class="bonusPay__item bonusPay__item--border">
                         <span class="bonusPay__label">
                           £{{$user->bonus_balance}}
                         </span>
                                <span class="bonusPay__label">
                           £{{$user->bonus_balance - $booking->price}}
                         </span>
                            </div>

                        </div>
                        <div class="roundedBtn roundedBtn--center">
                            <button  class="roundedBtn__item roundedBtn__item--confirm" id="buttonPaymentBonuses">
                                Confirm Payment
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bookPayment__total">
                    <div class="paymentTotal">
                        <div class="paymentTotal__item">
                            <p class="paymentTotal__name">

                                Total Hours
                            </p>
                            <p class="paymentTotal__name">

                                Total Price
                            </p>
                        </div>
                        <div class="paymentTotal__separate">

                        </div>
                        <div class="paymentTotal__item">
                            <p class="paymentTotal__value">
                                {{$booking->hours}} Hour{{($booking->hours > 1 ? 's' : '')}}
                            </p>
                            <p class="paymentTotal__value">
                                £{{$booking->price}}
                            </p>
                        </div>

                    </div>
                    <div class="paymentNote">
                        <h2>Please, note!</h2>
                        <p>
                            Payment is taken after booking request confirmed by Carer
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('input[type="text"]').attr("readonly", true);

    $('input[type="radio"]').on("click",function(){
        $('input[type="text"]').attr("readonly", !$('.new_card').is(':checked'));
    });

    $('#buttonPaymentCard1').on('click',function(){
        if (this.checked) {
            $("#save_card").val(true);
        } else {
            $("#save_card").val(false);
        }
    });

    $('#buttonPaymentBonuses').click(function () {
        showSpinner();
        $.post('{{route('setBookingPaymentMethod', ['booking' => $booking->id])}}', {'payment_method' : 'bonus_wallet'}, function( data ) {
            if(data.status == 'success'){
                $('.bookPaymentWrap').css('border-top','none');
                $('.bookPaymentWrap').html(`
              <div class="thank">
                <h2 class="thank__title">
                  Thank you!
                </h2>
                <span class="successIco">
                  <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <p class="info-p">
                  Your carer has now received your booking request and will respond shortly. If you have not heard back within 24 hours, please do contact us.
                </p>
              </div>
            `);
            } else {
                showErrorModal({title: 'Payment Error', description: 'Please check your payment details'});
            }
            hideSpinner();
            var padding = ($(document).height()-$('header').outerHeight()-$('section').outerHeight()-$('footer').outerHeight()-20)/2;
            $('.thank').css('paddingTop',padding).css('paddingBottom',padding);
        });
    });

    $('.new_card').on('click',function(){

    });

    $('#buttonPaymentCard').click(function () {
        showSpinner();
        var cardNumber = $('#cardNumber').val();
        var cardMonth = $('#cardMonth').val();
        var cardYear = $('#cardYear').val();
        var cardCVC = $('#cardCVC').val();
        var data = {};
        if(!$('.new_card').is(':checked'))
        data = {
            'card_id': $('input[name="card_id"]').val(),
            'payment_method': 'credit_card'
            };
        else
        data = {
            'payment_method': 'credit_card',
            'save_card': $('#save_card').val(),
            'card_number': cardNumber,
            'card_month': cardMonth,
            'card_year': cardYear,
            'card_cvc': cardCVC};

        $.post('{{route('setBookingPaymentMethod', ['booking' => $booking->id])}}',
            data,
            function( data ) {
            if(data.status == 'success'){
                $('.bookPaymentWrap').css('border-top','none');
                $('.bookPaymentWrap').html(`
              <div class="thank">
                <h2 class="thank__title">
                  Thank you!
                </h2>
                <span class="successIco">
                  <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <p class="info-p">
                  Your carer has now received your booking request and will respond shortly. If you have not heard back within 24 hours, please do contact us.
                </p>
              </div>
            `);
            } else {
                showErrorModal({title: 'Payment Error', description: 'Please check your payment details'});
            }
            hideSpinner();
        });
    });
</script>
