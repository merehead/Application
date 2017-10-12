<div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="/" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">></span>
        <a href="/carer-settings" class="breadcrumbs__item">
            Profile Settings
        </a>

    </div>
    <div class="roundedBtn">
        <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="roundedBtn__item
        roundedBtn__item--preview">
            Preview public profile
        </a>
    </div>
</div>



<div class="invite">
    <div class="profilePhoto invite__photo">
        <img class="set_preview_profile_photo" src="/img/profile_photos/{{$carerProfile->id}}.png" onerror="this
        .src='/img/no_photo.png'" alt="">
    </div>
    <h2 class="invite__title">
        Invite other users and both get £100 after 20 hours of usage
    </h2>

    <div class="invite-code">
        <p>
            Your referral code is <span>{{$carerProfile->own_referral_code}}</span>
        </p>
        <a href="{{route('inviteReferUsers')}}"><button type="button" name="button" class="invite-btn ">
            invite
            </button></a>
    </div>
</div>




<div class="bookingSwitcher">
    <a href="{{route('carerSettings')}}" class="bookingSwitcher__link ">Profile settings</a>
    <a href="{{route('carerBooking')}}" class="bookingSwitcher__link bookingSwitcher__link--active">My bookings {!! $newBookings->count() ? '<span>+'.$newBookings->count().'</span>' : '' !!}</a>
</div>
