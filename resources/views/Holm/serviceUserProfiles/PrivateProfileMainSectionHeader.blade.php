<div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="\" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">></span>
        <a href="{{route('purchaserSettings')}}" class="breadcrumbs__item">
            My profile
        </a>
        <span class="breadcrumbs__arrow">></span>
        <a href="" class="breadcrumbs__item">

            BOB M.
        </a>

    </div>
    <div class="bookingGroup">

        <div class="roundedBtn">
            <a href="" class="roundedBtn__item roundedBtn__item--preview">
                Preview public profile
            </a>
        </div>
    </div>
</div>


<div class="bookingSwitcher">
    <a href="{{route('purchaserSettings')}}" class="bookingSwitcher__link ">Profile settings</a>
    <a href="/serviceUser-settings/booking/{{$serviceUsersProfile->id}}" class="bookingSwitcher__link bookingSwitcher__link--active">My bookings <span>+1</span> </a>
</div>

