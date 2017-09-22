<div class="profilePricing">
    <p class="hourPrice hourPrice">
<span class="hourPrice__price hourPrice__price--big">
£ {{random_int(8,15)}}</span><span class="hourPrice__timing">/hour</span>
    </p>
    <div class="bookBtn">
        <a href="#" class="bookBtn__item  centeredLink" data-toggle="modal" data-target="#message-carer">
            book carer
        </a>
    </div>
    <div class="payment">
        <a href="" class="payment__item">
            <img src="/img/pay1.png" alt="">
        </a>
        <a href="" class="payment__item">
            <img src="/img/pay3.png" alt="">
        </a>
    </div>
</div>
<div class="profileSide__title">
    <h2 class="profileTitle">
        Availability
    </h2>
</div>
<div class="availability">
    @foreach ($workingTimes as $item)
        <p class="availability__item availability__item--full">
            <i class="fa fa-check"></i>
            {{$item->name}}
        </p>
    @endforeach

    <!--
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Monday afternoon
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Monday night
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Tuesday night
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Wednesday morning
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Thursday morning
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Thursday afternoon
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Every night
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Tuesday morning
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Wednesday afternoon
    </p>
    <p class="availability__item">
    <i class="fa fa-check"></i>
    Wednesday afternoon
    </p>
    <p class="availability__item availability__item--full">
        <i class="fa fa-check"></i>
        Availability on bank holidays
    </p>
    -->

</div>
<div class="profileSide__title">
    <h2 class="profileTitle">
        Notice Required
    </h2>
</div>
<div class="noticeRequired">
    <h2 class="noticeRequired__item">
        {{$carerProfile->work_hours}} {{$carerProfile->times}}
    </h2>
</div>

<div class="profileSide__title hidden">
    <h2 class="profileTitle">
        reviews
    </h2>
</div>

<div class="review hidden">
    <div class="review__item singleReview">
        <div class="reviewHead">
            <div class="reviewer">
                <a href="Service_user_Public_profile_page.html" class="profilePhoto   singleReview__photo">
                    <img src="/img/profile8.jpg" alt="">
                </a>

                <div class="reviewer__info">
                    <h2 class="profileName">
                        <a href="Service_user_Public_profile_page.html"> Bob M.</a>

                    </h2>
                    <p class="reviewLocation">
                        MANCHESTER
                    </p>
                </div>
            </div>
            <div class="singleReview__rate">
                <div class="profileRating ">
                    <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                    <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                    <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                    <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                    <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                </div>
                <!--  <p class="hourPrice">
                <span class="hourPrice__price hourPrice__price--review">
                £ 80</span><span class="hourPrice__timing"> total</span>
                </p>-->
            </div>
        </div>
        <div class="singleReview__text">
            <p>
                She is so nice and kind!
            </p>
        </div>
        <span class="singleReview__date">10/07/2017</span>
    </div>

    <!--      <div class="review__item singleReview">
    <div class="reviewHead">
    <div class="reviewer">
    <div class=" profilePhoto singleReview__photo">
    <img src="./dist/img/profile.png" alt="">
    </div>
    <div class="reviewer__info">
    <h2 class="profileName">
    Ashley M.
    </h2>
    <p class="reviewLocation">
    los angeles
    </p>
    </div>
    </div>
    <div class="singleReview__rate">
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
    <p class="hourPrice">
    <span class="hourPrice__price hourPrice__price--review">
    £ 80</span><span class="hourPrice__timing"> total</span>
    </p>
    </div>
    </div>
    <div class="singleReview__text">
    <p>
    Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi...
    </p>
    </div>
    <span class="singleReview__date">
    10/07/2017
    </span>
    </div>
    -->


</div>
