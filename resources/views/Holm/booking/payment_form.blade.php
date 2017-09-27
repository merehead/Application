<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="#" class="breadcrumbs__item">
                Booking Payment
            </a>

        </div>

        <div class="bookPaymentWrap">
            {{--@if($booking->payment_method == null)--}}
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
                    <div class="bookPayment__form-header">
                          <div class="formField">
                              <h2 class="formLabel">
                                  Card owner's name
                              </h2>
                              <div class="inputWrap">
                                  <input type="text" class="formInput" placeholder="Cris Jones">
                              </div>
                          </div>
                          <div class="bookPayment__field">
                              <h2 class="formLabel">
                                  Card Number
                              </h2>
                              <div class="inputWrap">
                                  <input type="text" class="formInput" id="cardNumber" placeholder="4534 3333 3333 3333 3333">
                    <span class="bookPayment__ico">
                      <img src="./dist/img/visa.png" alt="">
                    </span>
                              </div>
                          </div>
                          <div class="bookPayment__row">
                              <div class="bookPayment__halfColumn">
                                  <div class="formField">
                                      <h2 class="formLabel">
                                          Valid Until
                                      </h2>
                                      <div class="inputWrap">
                                          <input type="text" class="formInput" id="cardMonth" placeholder="MM">
                                          <input type="text" class="formInput" id="cardYear" placeholder="YY">
                                      </div>
                                  </div>
                              </div>
                              <div class="bookPayment__halfColumn">
                                  <div class="formField">
                                      <h2 class="formLabel">
                                          cvc code
                                      </h2>
                                      <div class="inputWrap">
                                          <input type="text" class="formInput" id="cardCVC" placeholder="202">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="paymentCheckbox">
                              <div class="checkBox_item">
                              </div>
                          </div>
                          <div class="roundedBtn roundedBtn--center">
                              <button  class="roundedBtn__item roundedBtn__item--confirm" id="buttonPaymentCard">
                                  Confirm Payment
                              </button>
                          </div>
                    </div>

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
                           £{{$user->bonus_balance - $booking->hour_price * $booking->hours}}
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
                                £{{$booking->hour_price * $booking->hours}}
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
            {{--@else--}}
                {{--<div class="thank">--}}
                    {{--<h2 class="thank__title">--}}
                        {{--Thank you!--}}
                    {{--</h2>--}}
                {{--<span class="successIco">--}}
                  {{--<i class="fa fa-check" aria-hidden="true"></i>--}}
                {{--</span>--}}
                    {{--<p class="info-p">--}}
                        {{--Your carer has now received your booking request and will respond shortly. If you have not heard back within 24 hours, please do contact us.--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>
    </div>
</section>

<script>
    $('#buttonPaymentBonuses').click(function () {
        $.post('{{route('setBookingPaymentMethod', ['booking' => $booking->id])}}', {'payment_method' : 'bonus_wallet'}, function( data ) {
            if(data.status == 'success'){
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
            }
        });
    });

    $('#buttonPaymentCard').click(function () {
        var cardNumber = $('#cardNumber').val();
        var cardMonth = $('#cardMonth').val();
        var cardYear = $('#cardYear').val();
        var cardCVC = $('#cardCVC').val();
        $.post('{{route('setBookingPaymentMethod', ['booking' => $booking->id])}}',
            {
                'payment_method': 'credit_card',
                'card_number': cardNumber,
                'card_month': cardMonth,
                'card_year': cardYear,
                'card_cvc': cardCVC
            },
            function( data ) {
            if(data.status == 'success'){
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
            }
        });
    });
</script>