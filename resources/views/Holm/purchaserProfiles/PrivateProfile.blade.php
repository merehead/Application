{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHead')--}}
{{--
@include(confDetailttings.frontTheme').'.CarerProfiles/PrivateProfileHeader')
--}}
<section class="mainSection">
    <script>
        var geocoder;
        var map;
        var marker;
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 17,
                center: {lat: -34.397, lng: 150.644}
            });
            geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = $('input[name="town"]').val()+' '+$('input[name="address_line1"]').val();
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);

                    marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        $(document).ready(function(){
            initMap();
        });
    </script>
    <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>
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