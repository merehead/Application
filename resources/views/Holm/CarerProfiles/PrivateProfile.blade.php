@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHead')
@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHeader')
<section class="mainSection">
    <div class="container">
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionHeader')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionGeneral')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionBankAndQualification')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionTypeOfCare')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionAvailabilityAndPets')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionLanguagesAndTransport')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionCriminal')
    </div>
</section>
@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileFooter')
