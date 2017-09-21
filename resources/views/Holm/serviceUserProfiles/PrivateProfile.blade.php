{{--
<section class="mainSection">
    <script>
        var geocoder;
        var map;
        var marker;
        var is_data_changed=false;
        window.onbeforeunload = function () {
            return (is_data_changed ? "Измененные данные не сохранены. Закрыть страницу?" : null);
        }
        function initMap() {
            map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 17,
                center: {lat: -34.397, lng: 150.644}
            });
            geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
        }

        function geocodeAddress(geocoder, resultsMap) {
            var addr = ($('input[name="address_line1"]').val()!='не указан')?$('input[name="address_line1"]').val():'';
            var address = $('input[name="town"]').val()+' '+ addr;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    if(marker)marker.setMap(null);
                    marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    $('.fieldCategory').after('<div class="alert alert-warning alert-dismissable fade in">\n' +
                        '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                        '    <strong>Warning!</strong> You entered an incorrect address. Please enter your real address.\n' +
                        '  </div>')
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        $(document).ready(function(){
            initMap();
        });
    </script>--}}

    <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>
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

