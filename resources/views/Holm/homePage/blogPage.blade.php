<section class="mainSection mainSection--blog">
    <div class="globalSearch">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="searchContainer">
                        <h2 class="searchContainer__title">What are you looking for?</h2>
                        <div class="searchContainer__field">
                            <input type="text" class="searchContainer__input" placeholder="Search...">
                            <span class="searchContainer__ico">
                  <i class="fa fa-search"></i>
                </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('BlogPage')}}" class="breadcrumbs__item">
                Blog
            </a>

        </div>

        <div class="blogWrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="blogFilter">
                            <h2 class="blogFilter__title">
                                filter
                            </h2>
                            <div class="blogFilter__list">
                                <a href="#" class="blogFilter__item">
                                    December 2017
                                </a>
                                <a href="#" class="blogFilter__item">
                                    November 2017
                                </a>
                                <a href="#" class="blogFilter__item">
                                    October 2017
                                </a>
                                <a href="#" class="blogFilter__item">
                                    September 2017
                                </a>
                                <a href="#" class="blogFilter__item">
                                    August 2017
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="blogposts">
                            @foreach($blog as $single)

                                <div class="singlePost">
                                <div class="singlePost__header">
                                    <h2 class="ordinaryTitle singlePost__title">
                      <span class="ordinaryTitle__text ordinaryTitle--medium">
                      {{$single->title}}
                      </span>
                                    </h2>
                                    <div class="postAuthor">
                                        <div class="profilePhoto postAuthor__photo">
                                            <img src="/img/founder.jpeg" alt="">
                                        </div>
                                        <h2 class="profileName">
                                            Nik S.
                                        </h2>
                                    </div>
                                </div>
                                <div class="singlePost__content">

                                    {{$single->body}}

                                        Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no
                                        per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran ende
                                        salutandi no per....
                                    </p>
                                </div>
                                <div class="singlePost__footer">
                                    <div class="roundedBtn">
                                        <a href="{{route('BlogPage')}}/{{$single->id}}" class="roundedBtn__item
                                        roundedBtn__item--read-more">
                                            read more
                                        </a>
                                    </div>
                                    <span class="postDate">{{$single->create_at}}</span>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>