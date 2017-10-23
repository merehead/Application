<div id="signUpdiv" class="modal fade" role="dialog">
    <div class="login" style="position: fixed; top:50%; left:50%; transform: translate(-50%, -50%);">
        <div class="login__header">
            <h2>Are You</h2>
            <a href="#" data-dismiss="modal" class="close closeModal">
                <i class="fa fa-times"></i>
            </a>
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
    <div class="login" style="position: fixed; top:50%; left:50%; transform: translate(-50%, -50%);">

        <div class="login__header">
            <h2>login</h2>
            <a href="#" data-dismiss="modal" class="close closeModal">
                <i class="fa fa-times"></i>
            </a>
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


            <a href="{{route('password.request')}}" class="login__forgot">
                Forgot password?
            </a>
        </div>

    </div>
</div>
<div id="findMessage" class="modal fade" role="dialog">
    <div class="login" style="position: fixed; top:50%; left:50%; transform: translate(-50%, -50%);">
        <div class="login__header">
            <h2>Message</h2>
            <a href="#" data-dismiss="modal" class="close closeModal">
                <i class="fa fa-times"></i>
            </a>
        </div>
        <div class="who-you-are">
            <div class="who-you-are__box">
                <span>
                    <p>Hi!</p>
                    <p>We’re sorry, but we’re not yet currently taking bookings.
                    You’ll be able to see the best professional carers on this page once we are ready.
                    Please feel free to <a href="/contact">contact us</a> and we’ll let you know when you can find a great carer.
                    </p>
                    <p>See you soon!</p>
                    <p>The Holm Team</p>
                </span>
            </div>
        </div>
    </div>
</div>


