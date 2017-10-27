
<section class="mainSection">

     <script>
    $(document).ready(function(){
    @if(Auth::user()->isAdmin())
        $('input,select').removeAttr('data-edit');
    @endif
    });
     </script>
    <div class="container carer-profile">

        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionHeader')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionGeneral')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionLanguages')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionHome')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionTypeOfCare')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionTimeWhenCareNeed')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionHealth')

        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionBehaviour')
        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionNightTime')

        @include(config('settings.frontTheme').'.serviceUserProfiles/PrivateProfileMainSectionOther')

    </div>
</section>

