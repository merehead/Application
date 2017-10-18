<section class="mainSection">
    {{--<link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">--}}
    {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>--}}
    <div class="container carer-profile">
        @include(config('settings.frontTheme').'.CarerProfiles/PublicProfileMainSectionHeader')
        <div class="profileWrap">
            <div class="row">
                <div class="col-sm-8">
                    <div class="profileMain">
                        @include(config('settings.frontTheme').'.CarerProfiles/PublicProfileMainSection')
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="profileSide">
                        @include(config('settings.frontTheme').'.CarerProfiles/PublicProfileSideSection')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
