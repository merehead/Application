@include(config('settings.frontTheme').'.CarerProfiles.Booking.BookingTabCarerHeader')
<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.html" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="Purchaser_Private_profile_page.html" class="breadcrumbs__item">
                My profile
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="Service_User_Private_profile_page.html" class="breadcrumbs__item">
                BOB M.
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('carerAppointment',['user_id'=>$serviceUsers-id])}}}" class="breadcrumbs__item">
                Your booking has been completed
            </a>
        </div>
        <div class="review">
            <div class="review__item">
                <h2 class="review__title">
                    Leave a review
                </h2>
                <div class="generalInfo">
                    <div class="profilePhoto profilePhoto--review">
                        <img src="./dist/img/profile4.png" alt="">

                    </div>
                    <div class="generalInfo__text">
                        <a href="Carer_Public_profile_page.html" class="generalInfo__elem">
                            <span>  </span></a><a href="Carer_Public_profile_page.html"> Rosie P.</a>

                        <div class="generalInfo__elem">
                            <p>MANCHESTER</p>
                        </div>
                    </div>
                </div>
                <div class="reviewText">
                    <p><a href="Carer_Public_profile_page.html"> Rosie P.</a> has completed their appointment on 8 MAY 2017 12.00 PM-5.00 PM with <a href="Service_user_Public_profile_page.html">   Bob M.</a> </p>
                    <p>Please leave your ratings and any additional comments. </p>
                    <p>Thank you!</p>

                </div>
            </div>
            <div class="review__item">
                <h2 class="review__title">
                    Appointment Overview - 8 MAY 2017 12.00 PM-5.00 PM
                </h2>
                <div class="userRating">
                    <div class="userRating__item">
                        <h2 class="userRating__title">
                            Rating
                        </h2>
                        <p class="userRating__name">
                            <span>Punctuality</span>
                        </p>
                        <div class="profileRating ">
                <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                        </div>
                    </div>
                    <div class="userRating__item">

                        <p class="userRating__name">
                            <span>FRIENDLINESS</span>
                        </p>
                        <div class="profileRating ">
                <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                        </div>
                    </div>
                    <div class="userRating__item">

                        <p class="userRating__name">
                            <span>Communication</span>
                        </p>
                        <div class="profileRating ">
                <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                        </div>
                    </div>
                    <div class="userRating__item">

                        <p class="userRating__name">
                            <span>Performance</span>
                        </p>
                        <div class="profileRating ">
                <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                            <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                        </div>
                    </div>
                </div>

                <form class="reviewForm">
                    <div class="formField">
                        <textarea class="formArea formArea--review " placeholder="Type your comment"></textarea>

                    </div>
                    <div class="formField">
                        <button class="reviewForm__btn">
                            submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>