<div id="signUpdiv" class="modal fade" role="dialog">
    <div class="login" style="position:fixed; top:20%; left:40%; ">
        <div class="login__header">
            <h2>Are You</h2>
            {{--        <a href="/close" class="closeModal"
                       onclick="event.preventDefault();document.getElementById('sign_up_div').style.display = 'none';">
                        <i class="fa fa-times"></i>
                    </a>--}}
        </div>
        <div class="who-you-are">
            <div class="who-you-are__box">
                <a href="{{route('CarerRegistration')}}" class="who-you-are__item">
                    A Care Worker?
                </a>
                <a href="{{route('PurchaserRegistration')}}" class="who-you-are__item">
                    Buying Care?
                </a>
            </div>

        </div>
    </div>
</div>
<div id="login" class="modal fade" role="dialog">
    <div class="login" style="position: fixed; top:20%; left:40%; ">
        <div class="login__header">
            <h2>login</h2>
            {{--        <a href="/close" class="closeModal"
                       onclick="event.preventDefault();document.getElementById('login').style.display = 'none';">
                        <i class="fa fa-times"></i>
                    </a>--}}
        </div>
        <div class="loader"></div>
        <div class="login__body">

            {{--<form  class="login__form">--}}
            <form id="login__form" class="login__form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Email
                    </h2>
                    <div class="inputWrap">
                        <input type="email" class="formInput " placeholder="Your email"
                               name="email">
                    </div>
                </div>
                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Password
                    </h2>
                    <div class="inputWrap">
                        <input type="password" class="formInput " placeholder="******"
                               name="password">
                    </div>
                </div>
                <span class="error-block">
                    <h3><strong></strong></h3>
                </span>
                <span class="success-block">
                    <h3><strong></strong></h3>
                </span>
            </form>

        </div>
        <div class="login__footer">
            <div class="login__row">
                <div class="checbox_wrap checbox_wrap--signedIn ">
                    <input type="checkbox" class="checkboxNew" id="check1"/>
                    <label for="check1"> <span>Stay signed in</span></label>
                </div>
                <div class="roundedBtn login__btn blogin">
                    <a href="toLogin" class="roundedBtn__item"
                       onclick="event.preventDefault();login_ajax(document.getElementById
                       ('login__form'));$('' +
                        '.blogin').hide();">
                        login
                    </a>
                </div>
                <div class="roundedBtn login__btn btry" style="display: none">
                    <a href="toLogin" class="roundedBtn__item"
                       onclick="event.preventDefault();refreshLoginForm(document.getElementById('login__form')); $('.btry').hide();">
                        try again
                    </a>
                </div>
            </div>


            <a href="Forgot_password.html" class="login__forgot">
                Forgot password?
            </a>
        </div>

    </div>
</div>

<div id="book_carer" class="modal fade" role="dialog">

            <div class="customModal">
                <div class="message">
                    <div class="message__header">
                        <div class="bookCarer">
                            <a href="" class="bookCarer__item bookCarer__item--modal centeredLink">Book  carer</a>
                        </div>

                        <a href="#" class="closeModal">
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    <div class="message__body">
                        <div class="messageGroup">
                            <h2 class="ordinaryTitle ordinaryTitle--smaller">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Person needing care
              </span>
                            </h2>
                            <div class="needCareContainer">
                                <div class="needCare">
                                    <a href="" class="needCare__item centeredLink">
                                        Bob M.
                                    </a>
                                    <!--
                                                    <a href="Service_user_Public_profile_page.html" class="needCare__item centeredLink">
                                                      Alice W.
                                                    </a>
                                                    <a href="Service_user_Public_profile_page.html" class="needCare__item centeredLink">
                                                      Mike D.
                                                    </a> -->
                                </div>
                                <div class="messageMap">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.71192633547!2d-0.3818036193070037!3d51.52873519756609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1497972116028"   frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="messageGroup">

                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text">Type of care</span>
                            </h2>
                            <div class="messageCheckbox">
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box1">
                                    <label for="box1">DEMENTIA CARE</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box2">
                                    <label for="box2">HOUSEKEEPING</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box3">
                                    <label for="box3">FOOD / NUTRITION</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box4">
                                    <label for="box4">PERSONAL CARE</label>
                                </div>

                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box5">
                                    <label for="box5">COMPANIONSHIP</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box6">
                                    <label for="box6">MOBILITY</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box7">
                                    <label for="box7">MEDICATION / TREATMENTS</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box8">
                                    <label for="box8"> TRAVEL / VISITS / EXCURSIONS</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="checkbox" name="checkbox" class="customCheckbox" id="box9">
                                    <label for="box9">DRESSINGS AND WOUND MANAGEMENT</label>
                                </div>
                                <!--
                                              <div class="checkBox_item">
                                                <input type="checkbox" name="checkbox" class="customCheckbox" id="box4">
                                                <label for="box4">Lorem ipsum</label>
                                              </div>
                                              <div class="checkBox_item">
                                                <input type="checkbox" name="checkbox" class="customCheckbox" id="box4">
                                                <label for="box4">Lorem ipsum</label>
                                              </div>
                                              <div class="checkBox_item">
                                                <input type="checkbox" name="checkbox" class="customCheckbox" id="box4">
                                                <label for="box4">Lorem ipsum</label>
                                              </div>
                                -->
                            </div>

                        </div>

                        <div class="messageGroup">

                            <h2 class="ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                select date and time
              </span>
                            </h2>
                            <div class="messageInputs">
                                <div class="messageInputs__field messageDate">
                                    <input type="text" class="messageInput" placeholder="06.06.2017 - 06.06.2017">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="messageInputs__field messageTime ">
                                    <input type="text" class="messageInput" placeholder="12:00 AM - 5:00 PM">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="#" class="additionalTime ">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    add additional time
                                </a>
                            </div>

                        </div>

                        <div class="messageGroup">

                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitl__text">How often</span>
                            </h2>
                            <div class="messageCheckbox">
                                <div class="checkBox_item">
                                    <input type="radio" name="checkbox" class="customCheckbox" id="boxD1">
                                    <label for="boxD1">Daily</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="radio" name="checkbox" class="customCheckbox" id="boxD2">
                                    <label for="boxD2">weekly</label>
                                </div>

                                <!--
                                              <div class="checkBox_item">
                                                <input type="checkbox" name="checkbox" class="customCheckbox" id="box3">
                                                <label for="box3">On weekends</label>
                                              </div>
                                -->

                            </div>

                        </div>

                        <div class="moreBtn">
                            <a href="#" class="moreBtn__item moreBtn__item--withIco centeredLink ">
                                <span>+</span> add more bookings
                            </a>
                        </div>

                    </div>

                    <div class="message__footer">

                        <div class="messageTotal">
                            <div class="bookBtn">
                                <a href="Checkout_for_Purchaser__CARD.html" class="bookBtn__item bookBtn__item--big centeredLink">
                                    book carer
                                </a>
                            </div>
                            <div class="total">
                                <div class="total__item  totalBox">
                                    <div class="totalTitle">
                                        <p>Total </p>
                                        <span >  5 hours </span>
                                    </div>
                                    <p class="totalPrice"> £60    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
</div>
