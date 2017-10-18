<section class="mostPopular">
  <div class="container">
    <div class="section_title">
      <h2 class="lightTitle">
        Popular Carers
      </h2>
      <p class="carers-below">
        Check some of our popular carers below
      </p>
    </div>



    <section>
      <div class="carerContainer">
        <div class="HomePageBanner owl-carousel">

          @foreach($topCarers as $topCarer)
            <div class="carerBanner__box HomePageBanner-carerBanner__box">
              <div class="popularSlider__item popularCard">
                <div class="profilePhoto">
                  <img src="/img/profile_photos/{{$topCarer->id}}.png"  onerror="this.src='/img/no_photo.png'"alt="">
                </div>

{{--                <img class="set_preview_profile_photo" src="/img/profile_photos/{{$carerProfile->id}}.png" onerror="this
        .src='/img/no_photo.png'" alt="">--}}

                <div class="profileRating popularCard__rating">


                <span class="profileRating__item {{ ($topCarer->rate->avg_total>0)? 'active' : ''  }}">
                  <i class="fa fa-heart"></i>
                </span>
                  <span class="profileRating__item {{ ($topCarer->rate->avg_total>=1)? 'active' : ''  }}">
                  <i class="fa fa-heart"></i>
                </span>
                  <span class="profileRating__item {{ ($topCarer->rate->avg_total>=2)? 'active' : ''  }}">
                  <i class="fa fa-heart"></i>
                </span>
                  <span class="profileRating__item {{ ($topCarer->rate->avg_total>=3)? 'active' : ''  }}">
                  <i class="fa fa-heart"></i>
                </span>
                  <span class="profileRating__item {{ ($topCarer->rate->avg_total>=4)? 'active' : ''  }}">
                  <i class="fa fa-heart"></i>
                </span>
                </div>
                <h2 class="profileName">
                  <a href="{{route('carerPublicProfile',[$topCarer->id])}}">
                  {{$topCarer->first_name}}&nbsp{{mb_substr($topCarer->family_name,0,1)}}.
                  </a>
                </h2>
                <p class="popularCard__info">
                  {{$topCarer->sentence_yourself}}
                </p>
                <p class="hourPrice">
                <span class="hourPrice__price">
                 From £ {{(Auth::check()&&Auth::user()->user_type_id==1)? 10 : 12  }}</span><span class="hourPrice__timing">/hour</span>
                </p>
              </div>
            </div>
            @endforeach

{{--
            <div class="popularSlider__item popularCard">
              <div class="profilePhoto">
                <img src="/img/profile4.png" alt="">
              </div>
              <div class="profileRating popularCard__rating">
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
              <h2 class="profileName">
                ROSIE P.
              </h2>
              <p class="popularCard__info">
                [one line summary]
              </p>
              <p class="hourPrice">
                <span class="hourPrice__price">
                £ 11</span><span class="hourPrice__timing">/hour</span>
              </p>
            </div>--}}


          </div>
        </div>
      </div>
    </section>
  </div>
</section>
