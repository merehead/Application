{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHead')--}}
{{--
@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileHeader')
--}}
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
            $('#post_code_profile').autocomplete({serviceUrl:'/noaddress/'});
            @if(Auth::user()->isAdmin())
                $('input,select').removeAttr('data-edit');
            @else {
                if($('#driving_license').val()=="No")
                    $('#driving_license').attr('data-edit',false);
            }
            @endif

            //Alexx show-hide driving data depending on driving license availability
            $('#driving_license').on('change', function(){
                if($('#driving_license').val()=="No"){
                    $('.driving-license-togglable').hide();
                    $('.driving-license-togglable-secondary').hide();
                    $('#type_car_work').val('');
                } else{
                    $('.driving-license-togglable').show();
                }
            });
        });

    </script>
    {{--<link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">--}}
    {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="/js/jquery.limit.js"></script>
    <div class="container carer-profile">
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionHeader')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionGeneral')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionBankAndQualification')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionTypeOfCare')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionAvailabilityAndPets')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionLanguagesAndTransport')
        @include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileMainSectionCriminal')
    </div>
</section>
{{--@include(config('settings.frontTheme').'.CarerProfiles/PrivateProfileFooter')--}}
