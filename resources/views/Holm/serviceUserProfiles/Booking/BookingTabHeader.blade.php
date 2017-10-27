<section class="mainSection">
    <div class="container">
    <div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="/serviceUser-settings/booking/{{$serviceUser->id}}" class="breadcrumbs__item">
            MY BOOKINGS
        </a>
        <span class="breadcrumbs__arrow">></span>
         <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUser->id])}}" class="breadcrumbs__item">
             {{$serviceUser->first_name}} &nbsp{{mb_substr($serviceUser->family_name,0,1)}}.
         </a>

    </div>
    <div class="bookingGroup">
        <!-- <a href="#" class="printIco">
           <img src="./dist/img/print.png" alt="">
         </a> -->
        <div class="roundedBtn">

            <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUser->id])}}" class="roundedBtn__item roundedBtn__item--preview">
                Preview public profile
            </a>
        </div>
    </div>
</div>

<div class="bookingSwitcher">
    <a href="/serviceUser-settings/{{$serviceUser->id}}" class="bookingSwitcher__link bookingSwitcher__link--active">Profile settings</a>
    <a href="/serviceUser-settings/booking/{{$serviceUser->id}}" class="bookingSwitcher__link">My bookings {!! $newBookings->count() ? '<span>+'.$newBookings->count().'</span>' : '' !!}</a>
</div>
