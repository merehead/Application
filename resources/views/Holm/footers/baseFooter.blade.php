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
            <a href="{{route('BlogPage')}}" class="footerNav__item">
                blog
            </a>
        </div>
        <div class="footerContainer">
            <a href="\" class=" themeLogo themeLogo--dark">

            </a>
            <a href="{{route('welcomeCarer')}}" class="carerSelf">
                i am a carer
            </a>
            @include(config('settings.frontTheme').'.includes.loginOnPages')

            <div class="payment">
                <a href="" class="payment__item">
                    <img src="/img/pay1.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="/img/pay2.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="/img/pay3.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="/img/pay4.png" alt="">
                </a>
            </div>
        </div>

        <div class="footerExtra">
            <p class="copyright">
                COPYRIGHT © 2017 Holm. All rights reserved
            </p>
            <a href="{{route('TermsPage')}}" class="footerExtra__terms">
                Terms and Conditions
            </a >
            <div class="footerSocial">
                <a href="https://www.facebook.com/HolmCareUK/" class="footerSocial__item">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/holmcare" class="footerSocial__item">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" class="footerSocial__item">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
                <!--
                          <a href="#" class="footerSocial__item">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                          </a>
                          <a href="#" class="footerSocial__item">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                          </a>
                -->
            </div>
        </div>
    </div>
</footer>