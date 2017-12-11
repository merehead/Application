<script>
    var times = [];
    times[2] = [5, 8, 11, 14, 17, 20, 23];
    times[3] = [6, 9, 12, 15, 18, 21, 24];
    times[4] = [7, 10, 13, 16, 19, 22, 25];
    $(document).ready(function () {
        if ($('p#1').length > 0) {
            $('p#2').hide();
            $('p#3').hide();
            $('p#4').hide();
        }
        if ($('p#2').length > 0) {
            $.each(times[2], function (index, value) {
                $('p#' + value).hide();
            });
        }
        if ($('p#3').length > 0) {
            $.each(times[3], function (index, value) {
                $('p#' + value).hide();
            });
        }
        if ($('p#4').length > 0) {
            $.each(times[4], function (index, value) {
                $('p#' + value).hide();
            });
        }
    });
</script>

<div class="profilePricing">
    <p class="hourPrice hourPrice">
        <span class="hourPrice__price hourPrice__price--big">
            From £   {{Auth::check() && Auth::user()->id == $carerProfile->id ? $carerProfile->wage : $carerProfile->price}}
        </span>
        <span class="hourPrice__timing">/hour</span>
    </p>
    @if(Auth::check())
        @if (Auth::user()->user_type_id !== 3 && $carerProfile->profiles_status_id==2)
            <div class="bookBtn">
                <a href="#" class="bookBtn__item  centeredLink" data-toggle="modal" data-target="#message-carer" >
                    book carer
                </a>
            </div>
        @else
            <div class="bookBtn">
                <button disabled class="bookBtn__item  centeredLink" data-toggle="modal" data-target="#message-carer">
                    book carer
                </button>
            </div>
        @endif

    @else

        <div class="bookBtn">
            <a href="#" class="bookBtn__item  centeredLink" data-toggle="modal" data-target="#login-popup">
                book carer
            </a>
        </div>




    @endif
    <div id="login-popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="login">
                <div class="login__header login__header--center">
                    <h2> Book carer</h2>
                    <a href="#" data-dismiss="modal" class="close closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                </div>

                <div class="who-you-are">
                    <p class="login-text login-text--header">
                        Please log in or sign up before proceeding with the booking
                    </p>
                    <div class="who-you-are__box">
                        <a id="add-login-popup" href="#" class="who-you-are__item">
                            Login
                        </a>
                        <a id="add-signin-popup" href="#" class="who-you-are__item">
                            signup
                        </a>
                    </div>

                </div>


            </div>
        </div>
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
        <p class="availability__item availability__item--full" id="{{$item->id}}">
            <i class="fa fa-check"></i>
            {{$item->name}}
        </p>
    @endforeach
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



@if(count($reviews))

    <div class="profileSide__title {{--hidden--}}">
        <h2 class="profileTitle">
            reviews
        </h2>
    </div>


    {{--{{dd($reviews)}}--}}

    @foreach($reviews as $k=>$review)

        <div class="review {{--hidden--}}">
            <div class="review__item singleReview" {{($k==0)? 'style=border-top:none;':''}} >
                <div class="reviewHead">
                    <div class="reviewer">
                        <a href="{{route('ServiceUserProfilePublic',[$review->id])}}"
                           class="profilePhoto   singleReview__photo">
                            {{--<img src="/img/profile8.jpg" alt="">--}}
                            <img src="/img/service_user_profile_photos/{{$review->id}}.png"
                                 onerror="this.src='/img/no_photo.png'" alt="avatar">

                        </a>

                        <div class="reviewer__info">
                            <h2 class="profileName">
                                <a href="{{route('ServiceUserProfilePublic',[$review->id])}}"> {{$review->first_name}}
                                      {{mb_substr($review->family_name,0,1)}}.</a>

                            </h2>
                            <p class="reviewLocation">
                                {{$review->town}}
                            </p>
                        </div>
                    </div>
                    <div class="singleReview__rate">
                        <div class="profileRating ">
                            <span class="profileRating__item {{($review->raiting>=0)? ' active' : '' }}"><i
                                        class="fa fa-heart"></i></span>
                            <span class="profileRating__item {{($review->raiting>=1)? ' active' : '' }}"><i
                                        class="fa fa-heart"></i></span>
                            <span class="profileRating__item {{($review->raiting>=2)? ' active' : '' }}"><i
                                        class="fa fa-heart"></i></span>
                            <span class="profileRating__item {{($review->raiting>=3)? ' active' : '' }}"><i
                                        class="fa fa-heart"></i></span>
                            <span class="profileRating__item {{($review->raiting>=4)? ' active' : '' }}"><i
                                        class="fa fa-heart"></i></span>
                        </div>
                        <!--  <p class="hourPrice">
                        <span class="hourPrice__price hourPrice__price--review">
                        £ 80</span><span class="hourPrice__timing"> total</span>
                        </p>-->
                    </div>
                </div>
                <div class="singleReview__text">
                    <p>
                        {{$review->comment}}
                    </p>
                </div>
                <span class="singleReview__date">{{$review->created_at}} </span>
            </div>
        </div>

    @endforeach
@endif
