


<footer class="footer">
    <div class="container">
        <div class="footerNav">
            <a href="{{route('AboutPage')}}" class="footerNav__item">
                about us
            </a>
            <a href="{{route('ContactPage')}}" class="footerNav__item">
                contact
            </a>
            <a href="{{route('FaqPage')}}" class="footerNav__item">
                Frequently Asked Questions
            </a>
           {{-- <a href="{{route('BlogPage')}}" class="footerNav__item">
                blog
            </a>--}}
        </div>
        <div class="footerContainer">
            <a href="{{route('mainHomePage')}}" class=" themeLogo themeLogo--dark">

            </a>
            <div class="footer-center-box">
                <a href="{{route('welcomeCarer')}}" class="carerSelf">
                    i am a carer
                </a>
                @if (!Auth::check())
                    @include(config('settings.frontTheme').'.includes.loginLogoutOnPages')
                @endif
            </div>



            <div class="payment">
                <a href="" class="payment__item">
                    <img src="/img/pay1.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="/img/pay3.png" alt="">
                </a>
            </div>
        </div>

        <div class="footerExtra">


            <p class="copyright">
                COPYRIGHT © 2017 Holm. All rights reserved
            </p>
{{--


            <a href="{{route('TermsPage')}}" class="footerExtra__terms">
                Terms and Conditions
            </a >
            <a href="{{route('privacy_policy')}}" class="footerExtra__terms">
                Privacy Policy
            </a>


            --}}

            <div class="footerExtra__terms">
                <a href="{{route('TermsPage')}}" class="">
                    Terms and Conditions
                </a >
                <a href="{{route('privacy_policy')}}" class="">
                    privacy policy
                </a >
            </div>



            <div class="footerSocial">
                <a href="https://www.facebook.com/HolmCareUK/" class="footerSocial__item">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/holmcare" class="footerSocial__item">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://plus.google.com/communities/102900900688938220709" class="footerSocial__item">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<div class="cookie-box" id='id_cookie' style="display:none;">
    <div class="container">
        <div class="cookie">
            <p class="cookie__text">
                This site uses cookies. By continuing to browse the site, you are agreeing to our <a href="{{route('privacy_policy')}}">Use of Cookies.</a>
            </p>
            <div class="cookie__group">
                <button class="cookie-btn">
                    accept
                </button>
                <button class="cookie-btn cookie-btn--refuse">
                    refuse
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" defer ></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M&libraries=places"></script>
<script src="{{asset('js/jquery.autocomplete.js')}}"></script>
<script src="{{asset('js/exif.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '352912181787642'); // Insert your pixel ID here.
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=352912181787642&ev=PageView&noscript=1"
    /></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92065832-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag()
    {dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-92065832-1');
</script>


