<section class="mainSection">
    <div class="container">
    <div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
            Home
        </a>
         <span class="breadcrumbs__arrow">></span>
         <a href="{{route('carerBooking')}}" class="breadcrumbs__item">
           My Bookings
         </a>

    </div>
    <div class="bookingGroup">
        <!-- <a href="#" class="printIco">
           <img src="./dist/img/print.png" alt="">
         </a> -->
        <div class="roundedBtn">
            <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="roundedBtn__item roundedBtn__item--preview">
                Preview public profile
            </a>
        </div>
    </div>
</div>

<div class="bookingSwitcher">
    <a href="{{route('carerSettings')}}" class="bookingSwitcher__link bookingSwitcher__link--active">Profile settings</a>
    <a href="{{route('carerBooking')}}" class="bookingSwitcher__link">My bookings {!! $countBookings ? '<span>+'.$countBookings.'</span>' : '' !!}</a>
</div>
