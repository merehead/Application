
<div class="breadcrumbs">
    <a href="/" class="breadcrumbs__item">
        Home
    </a>
    <span class="breadcrumbs__arrow">></span>
    <a href="/purchaser-settings" class="breadcrumbs__item">
        My profile
    </a>

</div>

<div class="invite">
    <div class="profilePhoto invite__photo">
        <img class="set_preview_profile_photo" src="/img/profile_photos/{{$purchaserProfile->id}}.png" onerror="this
      .src='/img/no_photo.png'" alt="avatar">
    </div>
    <h2 class="invite__title">
        Invite other users and both get £100 after 20 hours of usage
    </h2>

    <div class="invite-code">
        <p>
            Your referral code is <span>{{$purchaserProfile->own_referral_code}}</span>
        </p>
        <a href="{{route('inviteReferUsers')}}"><button type="button" name="button" class="invite-btn ">
            invite
        </button></a>


    </div>
</div>

<div class="bookingSwitcher">
    <a href="/purchaser-settings" class="bookingSwitcher__link">Profile settings</a>

    <a href="/purchaser-settings/booking" class="bookingSwitcher__link bookingSwitcher__link--active">My bookings {!! $newBookings->count() ? '<span>+'.$newBookings->count().'</span>' : '' !!}</a>

</div>
