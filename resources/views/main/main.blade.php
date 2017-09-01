<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="HolmApp">
    <head>
        @include('Holm.includes.head')
        @stack('scripts_head')
    </head>
    <body>
        <header class="header">
            @include('Holm.includes.header')
        </header>


        @yield('content')


        <footer class="footer">
            @include('Holm.includes.footer')
        </footer>

        <div id="login" class="login" style="position: fixed; top:120px; right:50px; display:none">
            <div class="login__header">
                <h2>login</h2>
                <a href="/out" class="closeModal"
                   onclick="event.preventDefault();document.getElementById('login').style.display = 'none';">
                    <i class="fa fa-times"></i>
                </a>
            </div>

            <div class="login__body">

                {{--<form  class="login__form">--}}
                    <form id="login__form" class="login__form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="formField">
                        <h2 class="formLabel questionForm__label">
                            Email
                        </h2>
                        <div class="inputWrap">
                            <input type="email" class="formInput " placeholder="Your Email"
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
                </form>
            </div>
            <div class="login__footer">
                <div class="login__row">
                    <div class="checbox_wrap checbox_wrap--signedIn ">
                        <input type="checkbox" class="checkboxNew" id="check1" />
                        <label for="check1"> <span>Stay signed in</span></label>
                    </div>
                    <div class="roundedBtn login__btn">
                        <a href="toLogin" class="roundedBtn__item  "
                           onclick="event.preventDefault();document.getElementById('login__form').submit();">>
                            login
                        </a>
                    </div>
                </div>


                <a href="Forgot_password.html" class="login__forgot">
                    Forgot password?
                </a>
            </div>

        </div>

        <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular.min.js"></script>
        <script  src="{{asset('js/angular_script.js')}}"></script>
        <script  src="{{asset('js/jquery_script.js')}}"></script>

        <script>
            (function($){
                $('.footerSocial a, .headerSocial a').click(function(e) {
                  e.preventDefault();
                  var href = $(this).attr('href');
                  window.open(href, '_blank').focus();
                });
            })(jQuery);

        </script>
        @stack('scripts_footer')
    </body>
</html>