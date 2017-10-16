@include(config('settings.frontTheme').'.CarerProfiles.Booking.Message')
<div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="/" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="/search" class="breadcrumbs__item">
            Carers
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="{{route('carerPublicProfile',[$carerProfile->id])}}" class="breadcrumbs__item">

            {!! $carerProfile->first_name.' &nbsp '.mb_substr($carerProfile->family_name,0,1).'.'!!}

        </a>
    </div>

</div>