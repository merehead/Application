<section class="mainSection ">

    <div class="container">
        <div class="breadcrumbs">
            <a href="\" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="/welcome-carer" class="breadcrumbs__item">
                i am a carer
            </a>

        </div>

    </div>

    <div class="container">

    </div>

</section>
<section class="carerSection">
    <div class="container">
        <div class="carerContainer">
            <div class="carerBanner owl-carousel  ">

                <div class="carerBanner__box">
                    <h2 class="carerBanner__title">
                        Earn Money and Respect
                    </h2>
                    <p class="carerBanner__text">
                        Carers use Holm to earn at least 30% more and take control of their work. That’s why only the best personal carers work at Holm
                    </p>
                    @if(!Auth::check())
                    <a href="{{ route('CarerRegistration') }}" class="carerBanner__btn">
                        Register as a Carer
                    </a>
                        @endif
                </div>

                <div class="carerBanner__box">
                    <h2 class="carerBanner__title">
                        Earn Money and Respect
                    </h2>
                    <p class="carerBanner__text" >

                        Are you a qualified Care Worker? <br />
                        Not joined Holm yet?<br />
                        Join now and receive a £50 bonus just for registering.<br />



                        Use Bonus Code  <b>'REGISTER'</b> when registering.
                    </p>

                    @if(!Auth::check())
                        <a href="{{ route('CarerRegistration') }}" class="carerBanner__btn">
                            Register as a Carer
                        </a>
                    @endif
                    <div class="terms-cerer terms-cerer_margin-l">
                        *Please refer to <a href="{{route('TermsPage')}}">Terms &amp; Conditions</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<section class="advantages_section">
    <div class="container">
        <div class="section_title section_title--full-p">
            <h2 class="lightTitle">
                We are not an agency
            </h2>

            <p>
                Holm understands the frustrations often felt by carers working for agencies.<br>
                We are a new kind of home care service, helping connect you directly to elderly people who need help in the Manchester area. </p>
            <p class="padding-b">  We are not a care agency, and don’t charge people like an agency. <br>
                Holm gives you more time at people’s homes and helps you build lasting relationships with your clients
            </p>






        </div>
        <div class="advantages advantages-wcarer">
            <div class="advantages__item singleAdvantage">
                <div class="singleAdvantage__img">
                    <img src="/img/clock.png" alt="">
                </div>
                <div class="singleAdvantage__info">
                    <h2>
                        Appointments are a minimum of one hour
                    </h2>
                    <p>
                        That means less time travelling, and more time caring.
                    </p>
                </div>
            </div>

            <div class="advantages__item singleAdvantage">
                <div class="singleAdvantage__img">
                    <img src="/img/arrows.png" alt="">
                </div>
                <div class="singleAdvantage__info">
                    <h2>
                        You decide when and where to go
                    </h2>
                    <p>
                        You have control of your work, not someone at the office who doesn’t understand.
                    </p>
                </div>
            </div>

            <div class="advantages__item singleAdvantage">
                <div class="singleAdvantage__img">
                    <img src="/img/money.png" alt="">
                </div>
                <div class="singleAdvantage__info">
                    <h2>
                        Carers can earn far more
                    </h2>
                    <p>
                        Great care is rewarded through greater earnings. All carers earn a minimum of £10 per hour.
                    </p>
                </div>
            </div>

            <div class="advantages__item singleAdvantage">
                <div class="singleAdvantage__img">
                    <img src="/img/carer_user.png" alt="">
                </div>
                <div class="singleAdvantage__info">
                    <h2>
                        You work for the client, not the agency
                    </h2>
                    <p>
                        Receive great feedback direct from your clients.
                    </p>
                </div>
            </div>









        </div>

    </div>
</section>
