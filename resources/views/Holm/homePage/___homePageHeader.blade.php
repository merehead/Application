<header class="header">
    <div class="container">
        <div class="headerContainer">
            <a href="/" class="themeLogo">

            </a>
            <a href="index.html" class="xsNav">
        <span class="">
          <i class="fa fa-navicon"></i>
        </span>
            </a>
            <div class="collapseBox">
                <a href="{{ route('welcomeCarer') }}" class="carerSelf">
                    i am a carer
                </a>
                <div class="headerNav_container">
                    <div class="headerNav">
                        <a href="#" class="  headerNav__link">
                            find a carer
                        </a>
                        <a href="#" class=" headerNav__link">
                            about us
                        </a>
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
                        <div class="top-right links">
                            @include(config('settings.frontTheme').'.includes.loginOnPages')
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</header>