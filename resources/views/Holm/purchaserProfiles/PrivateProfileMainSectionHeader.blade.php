
<div class="breadcrumbs">
    <a href="" class="breadcrumbs__item">
        Home
    </a>
    <span class="breadcrumbs__arrow">></span>
    <a href="" class="breadcrumbs__item">
        My profile
    </a>

</div>


<div class="invite">
    <div class="profilePhoto invite__photo">
      <img class="set_preview_profile_photo" src="img/profile_photos/{{$purchaserProfile->id}}.png" onerror="this.src='/img/no_photo.png'" alt="avatar">
    </div>
    <h2 class="invite__title">
        Invite other users and both get £100 after 20 hours of usage
    </h2>
    <div class="terms-cerer">
      *Please refer to <a href="{{route('TermsPage')}}">Terms &amp; Conditons</a>
    </div>
    <form class="inviteForm">
        <div class="inviteForm__field">
            <input type="text" class="inviteForm__input "  placeholder="FRIEND'S EMAIL">
        </div>
        <div class="inviteForm__field">
            <button class="inviteForm__btn centeredLink">invite</button>
        </div>
    </form>
</div>
<div class="bookingSwitcher">
    <a href="/purchaser-settings" class="bookingSwitcher__link ">Profile settings</a>
    <a href="/purchaser-settings/booking" class="bookingSwitcher__link bookingSwitcher__link--active">My bookings <span>+1</span> </a>
</div>
