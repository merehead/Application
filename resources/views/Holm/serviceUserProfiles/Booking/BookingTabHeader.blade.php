<section class="mainSection">
    <div class="container">
    <div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="/serviceUser-settings/booking/{{$serviceUser->id}}" class="breadcrumbs__item">
            MY Profile
        </a>
        <span class="breadcrumbs__arrow">></span>
         <a href="#" class="breadcrumbs__item">
             {{$serviceUser->full_name}}
         </a>

    </div>
    <div class="bookingGroup">
        <!-- <a href="#" class="printIco">
           <img src="./dist/img/print.png" alt="">
         </a> -->
        <div class="roundedBtn">

            <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUsersProfile->id])}}" class="roundedBtn__item roundedBtn__item--preview">
                Preview public profile
            </a>
        </div>
    </div>
</div>

<div class="bookingSwitcher">
    <a href="/serviceUser-settings/{{$serviceUser->id}}" class="bookingSwitcher__link bookingSwitcher__link--active">Profile settings</a>
    <a href="/serviceUser-settings/booking/{{$serviceUser->id}}" class="bookingSwitcher__link">My bookings</a>
</div>
