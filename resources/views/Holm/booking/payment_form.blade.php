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
                        </div>
                        <div class="paymentCheckbox">
                            <div class="checkBox_item">
                                <input type="checkbox" name="checkbox" class="customCheckbox" id="buttonPaymentCard1">
                                <label for="buttonPaymentCard1"> save payment details?</label>
                            </div>
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

    $('#buttonPaymentCard').click(function () {
        showSpinner();
        $.post('{{route('setBookingPaymentMethod', ['booking' => $booking->id])}}',
            {
                'payment_method': 'credit_card',
                'card_id': $('input[name="card_id"]').val()
            },
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
