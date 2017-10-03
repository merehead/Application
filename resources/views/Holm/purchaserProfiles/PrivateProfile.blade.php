{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHead')--}}
{{--
@include(confDetailttings.frontTheme').'.CarerProfiles/PrivateProfileHeader')
--}}
<section class="mainSection">

    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--var geocoder = new google.maps.Geocoder();--}}
            {{--map = new google.maps.Map(document.getElementById('map_canvas'), {--}}
                {{--zoom: 17,--}}
                {{--center: {lat: -34.397, lng: 150.644}--}}
            {{--});--}}
            {{--geocodeAddress(geocoder, map);--}}
        {{--});--}}
    {{--</script>--}}
    <div class="container carer-profile">
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
