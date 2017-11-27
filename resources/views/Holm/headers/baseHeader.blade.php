<header class="header">

    <div class="container">
        <div class="headerContainer">
            <a href="\" class="themeLogo"></a>
            <a href="\" class="xsNav"><span class=""><i class="fa fa-navicon"></i></span></a>
            <div class="collapseBox">
                <div class="collapseBox__item">
                    @if(Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ url('/admin') }}" class="mob-nav-link">
                        Admin Panel
                    </a>
                    @endif
                <a href="{{ route('welcomeCarer') }}" class="carerSelf">i am a carer</a>
                @if (Auth::check())
                  <a href="{{ route('logout') }}" class="mob-nav-link"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
                <div class="headerNav_container">
                    <div class="headerNav">
                        <a href="{{route('searchPage')}}" class="headerNav__link">find a carer</a>
                        <a href="{{route('AboutPage')}}" class="headerNav__link">about us</a>
                        <a href="{{route('ContactPage')}}" class="mob-nav-link">contact us</a>
                        <a href="{{route('FaqPage')}}" class="mob-nav-link">Frequently Asked Questions</a>
                    </div>

                    <div class="headerSocial">
                        <a href="https://www.facebook.com/HolmCareUK/" class="centeredLink headerSocial__link headerSocial__link--facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/holmcare" class="centeredLink headerSocial__link headerSocial__link--twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                    @if (Route::has('login'))
{{--
                        <div class="top-right links">
--}}
                       {{-- <div class="loginBox">--}}
                            @include(config('settings.frontTheme').'.includes.loginLogoutOnPages')
                       {{-- </div>--}}
                    @endif

                </div>
                </div>
            </div>
        </div>
    </div>
</header>
