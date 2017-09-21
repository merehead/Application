<div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="/" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">></span>
        <a href="/carer-settings" class="breadcrumbs__item">
            Profile Settings
        </a>
        <!--
                  <span class="breadcrumbs__arrow">></span>
                  <a href="Carer_Private_profile_page.html" class="breadcrumbs__item">
                    My Personal Profile
                  </a>
        -->
    </div>
    <div class="roundedBtn">
        <a href="{{route('carerPublicProfile')}}" class="roundedBtn__item roundedBtn__item--preview">
            Preview public profile
        </a>
    </div>
</div>



<div class="invite">
    <div class="profilePhoto invite__photo">
        <img src="/img/no_photo.png" alt="">
    </div>
    <h2 class="invite__title">
        Invite other users and both get £100 after 20 hours of usage
    </h2>
    <form class="inviteForm">
        <div class="inviteForm__field">
            <input type="text" class="inviteForm__input"  placeholder="FRIEND'S EMAIL">
        </div>
        <div class="inviteForm__field">
            <button class="inviteForm__btn centeredLink">invite</button>
        </div>
    </form>
</div>

<div class="terms-cerer">
    Please refer to <a href="{{route('TermsPage')}}">Terms &amp; Conditons</a>
</div>
<div class="bookingSwitcher">
    <a href="{{route('carerSettings')}}" class="bookingSwitcher__link ">Profile settings</a>
    <a href="{{route('carerBooking')}}" class="bookingSwitcher__link bookingSwitcher__link--active">My bookings</a>
</div>
