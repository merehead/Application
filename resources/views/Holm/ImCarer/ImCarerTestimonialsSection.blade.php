<section class="testimonialsSection">
    <div class="container">
        <div class="testimonialsSection__title">
            <span class="testimonialsIco">
          <i class="fa fa-quote-left" aria-hidden="true"></i>
        </span>
        </div>
        <div class="sliderContainer">
            <!-- <a href="#theCarousel1" data-slide="prev" class="sliderControl sliderControl--left centeredLink">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#theCarousel1" data-slide="next" class="sliderControl sliderControl--right centeredLink">
                <i class="fa fa-angle-right"></i>
            </a> -->
            <div class="testimonialSlider carousel slide multi-item-carousel" id="theCarousel1">
                <div class="carousel-inner carousel-inner1 special-slide">
                    <div class="testimonialSlider__item item active" id="testimonialSlider__item1">
                        <p>
                            I got fed up zero hours contracts and not knowing my work schedule. I feel free at last to do what matters.
                        </p>
                    </div>
                    <div class="testimonialSlider__item item " id="testimonialSlider__item2">
                        <p>
                            I enjoy my work again now that I spend quality time with my clients. No more rushing like a headless chicken.
                        </p>
                    </div>
                    <div class="testimonialSlider__item item " id="testimonialSlider__item3">
                        <p>
                            I’m not always filling out paperwork. It’s feels great!
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="carousel slide multi-item-carousel" id="theCarousel1">
            <div class="carousel-inner carousel-inner1">
                <div class="item active">
                    <div class="testimonialsPeople" id="theCarousel_users">

                        @foreach($carers as $carer)
                            <a href="#" class="peopleBox" data-id="1">
                                <div class="profilePhoto peopleBox__photo activeImg">
                                    <img src="/img/profile_photos/{{$carer->id}}.png" onerror="this
            .src='/img/no_photo.png'" alt="avatar">
                                </div>
                                <div class="peopleBox__info">
                                    <h2 class="profileName">{{$carer->first_name}}&nbsp;{{mb_substr($carer->family_name,0,1)}}.</h2>
                                    <div class="people_quote">
                                        I got to choose who looked after my mother, and she loves her carer.
                                    </div>
                                </div>
                            </a>
                        @endforeach


                        {{--<a href="#" class="peopleBox" data-id="1">
                            <div class="profilePhoto peopleBox__photo activeImg">
                                <img src="/img/Annie_B.png" alt="">
                            </div>
                            <div class="peopleBox__info">
                                <h2 class="profileName">ANNIE B.</h2>
                                <div class="people_quote">
                                    I got to choose who looked after my mother, and she loves her carer.
                                </div>
                            </div>
                        </a>
                        <a href="#" class="peopleBox" data-id="2">
                            <div class="profilePhoto peopleBox__photo">
                                <img src="/img/John_r.png" alt="">
                            </div>
                            <div class="peopleBox__info">
                                <h2 class="profileName">JOHN R.</h2>
                                <div class="people_quote">
                                    I couldn’t wait for an agency. I wanted help as soon as possible. Holm really helped us. Thank you!
                                </div>
                            </div>
                        </a>
                        <a href="#" class="peopleBox" data-id="3">
                            <div class="profilePhoto peopleBox__photo">
                                <img src="/img/Ginger_P.png" alt="">
                            </div>
                            <div class="peopleBox__info">
                                <h2 class="profileName">GINGER P.</h2>
                                <div class="people_quote">
                                    Holm helped me find great care and we saved so much. Now we can buy more care for our money.
                                </div>
                            </div>
                        </a>--}}
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
