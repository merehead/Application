<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="{{route('inviteReferUsers')}}" class="breadcrumbs__item">
                Holm is helping people receive better care
            </a>
        </div>
        <div class="referal">
            <div class="referal__header">
                <h2>
                    Thank you for spreading the word about how Holm is helping people receive better care.
                </h2>
            </div>
            <div class="referal-info">
                <p>
                    Please enter the email addresses of people who you think
                    are either great care workers, or would benefit from receiving great care,
                    <span>and we’ll give each of you £100!</span>
                </p>
            </div>
            <div class="referal-extra">
                <h2 class="">
                    <span>*</span>You can refer as many people as you like.
                </h2>
                <a href="{{route('TermsPage')}}">
                    Terms & Conditions
                </a>
            </div>
            @include(config('settings.frontTheme').'.referUser.inviteForm')
        </div>
    </div>
</section>