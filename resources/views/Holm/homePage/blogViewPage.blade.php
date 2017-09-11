<section class="mainSection ">

    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('BlogPage')}}" class="breadcrumbs__item">
                Blog
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('BlogPage')}}/{{$blog->id}}" class="breadcrumbs__item">
                {{$blog->title}}
            </a>

        </div>

    </div>
    <div class="postWrap">

        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="backBtn">
                        <a href="{{route('BlogPage')}}" class="backBtn__item">
                            <i class="fa fa-arrow-left"></i>
                            back to blog
                        </a>
                        <div class="singlePost singlePost--post-page">
                            <div class="singlePost__header">
                                <h2 class="ordinaryTitle singlePost__title">
                      <span class="ordinaryTitle__text ordinaryTitle--medium">
                     {{$blog->title}}
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
                                <p>
                                  {{$blog->body}}
                                </p>
                            </div>
                            <div class="singlePost__footer">
                                <div class="roundedBtn">
                                    <a href="" class="roundedBtn__item roundedBtn__item--read-more">
                                        <i class="fa fa-share-alt"></i>
                                        share this post
                                    </a>
                                </div>
                                <span class="postDate">
                     {{$blog->create_at}}
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="relatedWrap">
                        <h2 class="relatedTitle">Related posts</h2>

                        <div class="relatedPost">
                            <h2 class="ordinaryTitle relatedPost__title">
                  <span class="ordinaryTitle__text ordinaryTitle--medium">
                    Post title
                  </span>
                            </h2>
                            <div class="relatedPost__text">
                                <p>
                                    Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi... idqran ende salutandi no per.
                                </p>
                            </div>
                            <a href="Post_page.html" class="relatedPost__link">
                                read more
                            </a>
                        </div>

                        <div class="relatedPost">
                            <h2 class="ordinaryTitle relatedPost__title">
                  <span class="ordinaryTitle__text ordinaryTitle--medium">
                    Post title
                  </span>
                            </h2>
                            <div class="relatedPost__text">
                                <p>
                                    Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi... idqran ende salutandi no per.
                                </p>
                            </div>
                            <a href="Post_page.html" class="relatedPost__link">
                                read more
                            </a>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div></section>