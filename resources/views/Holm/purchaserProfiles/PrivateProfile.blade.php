{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHead')--}}
{{--
@include(confDetailttings.frontTheme').'.CarerProfiles/PrivateProfileHeader')
--}}
<section class="mainSection">
    <div class="container">
        @include(config('settings.frontTheme').'.purchaserProfiles/PrivateProfileMainSectionHeader')
        @include(config('settings.frontTheme').'.purchaserProfiles/PrivateProfileMainSectionGeneral')
        @include(config('settings.frontTheme').'.purchaserProfiles/PrivateProfileMainSectionPaymentDetail')
        @include(config('settings.frontTheme').'.purchaserProfiles/PrivateProfileMainSectionServiceUser')
    {{--    @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionAvailabilityAndPets')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionLanguagesAndTransport')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionCriminal')--}}
    </div>
</section>
{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileFooter')--}}
