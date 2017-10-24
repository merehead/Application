<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="/purchaser-settings" class="breadcrumbs__item">
                My profile
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="#" class="breadcrumbs__item">
                BOB M.
            </a>
            <span class="breadcrumbs__arrow">></span>
            <p class="breadcrumbs__item">
                Your booking has been completed
            </p>
        </div>
        <div class="review">
            <div class="review__item">
                <h2 class="review__title">
                    Leave a review
                </h2>
                <div class="generalInfo">
                    <div class="profilePhoto profilePhoto--review">
                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">

                    </div>
                    <div class="generalInfo__text">
                        <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="generalInfo__elem">
                            <span><a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></span>
                        </a>
                        <div class="generalInfo__elem">
                            <p>MANCHESTER</p>
                        </div>


                    </div>
                </div>
                <div class="reviewText">
                    <p><a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a> has completed their appointment on {{$booking->date_start}} - {{$booking->date_end}} with <a href="/serviceUser-settings/{{$booking->bookingServiceUser()->first()->id}}">{{$booking->bookingServiceUser()->first()->full_name}}</a> </p>
                    <p>Please leave your ratings and any additional comments. </p>
                    <p>Thank you!</p>

                </div>
            </div>
            <div class="review__item">
                @if(!$booking->overviews()->get()->count())
                    <h2 class="review__title">
                        Booking Overview - {{$booking->date_start}} - {{$booking->date_end}}
                    </h2>
                    <div class="userRating">
                        <div class="userRating__item">
                            <h2 class="userRating__title">
                                Rating
                            </h2>
                            <p class="userRating__name">
                                <span>Punctuality</span>
                            </p>
                            <div class="profileRating">
                    <span class="profileRating__item active" id="punctuality_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_5">
                      <i class="fa fa-heart"></i>
                    </span>
                            </div>
                        </div>
                        <div class="userRating__item">

                            <p class="userRating__name">
                                <span>FRIENDLINESS</span>s
                            </p>
                            <div class="profileRating ">
                    <span class="profileRating__item active" id="friendliness_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_5">
                      <i class="fa fa-heart"></i>
                    </span>
                            </div>
                        </div>
                        <div class="userRating__item">

                            <p class="userRating__name">
                                <span>Communication</span>
                            </p>
                            <div class="profileRating ">
                    <span class="profileRating__item active" id="communication_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_5">
                      <i class="fa fa-heart"></i>
                    </span>
                            </div>
                        </div>
                        <div class="userRating__item">

                            <p class="userRating__name">
                                <span>Performance</span>
                            </p>
                            <div class="profileRating ">
                    <span class="profileRating__item active" id="performance_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_5">
                      <i class="fa fa-heart"></i>
                    </span>
                            </div>
                        </div>
                    </div>

                    <form class="reviewForm" method="post" action="/bookings/{{$booking->id}}/review">
                        <input type="hidden" name="punctuality" value="1">
                        <input type="hidden" name="friendliness" value="1">
                        <input type="hidden" name="communication" value="1">
                        <input type="hidden" name="performance" value="1">
                        <div class="formField">
                            <textarea class="formArea formArea--review " placeholder="Type your comment" name="comment" maxlength="150"></textarea>

                        </div>
                        <div class="formField">
                            <button type="submit" class="reviewForm__btn">
                                submit
                            </button>
                        </div>
                    </form>
                @else
                    <div class="thank">
                        <h2 class="thank__title">
                            Thank you!
                        </h2>
                        <span class="successIco">
                          <i class="fa fa-check" aria-hidden="true"></i>
                        </span>
                        <p class="info-p">
                            Your review will be visible on carer profile.

                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
