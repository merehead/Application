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
                                    <a href="https://plus.google.com/share?url={{route('BlogPage')}}/{{$blog->id}}" class="roundedBtn__item roundedBtn__item--read-more"
                                       onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                                    >
                                        <i class="fa fa-google-plus"></i>
                                        share this post
                                    </a>
                                </div>
                                <div class="roundedBtn">
                                    <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" class="roundedBtn__item roundedBtn__item--read-more">
                                        <i class="fa fa-facebook"></i>
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
                        @if(isset($relationPost))
                            @foreach($relationPost as $item)
                                <div class="relatedPost">
                                    <h2 class="ordinaryTitle relatedPost__title">
                  <span class="ordinaryTitle__text ordinaryTitle--medium">
                    {{$item->title}}
                  </span>
                                    </h2>
                                    <div class="relatedPost__text">
                                        <p>
                                            {{words(strip_tags($item->body))}}
                                        </p>
                                    </div>
                                    <a href="{{route('BlogPage')}}/{{$item->id}}" class="relatedPost__link">
                                        read more
                                    </a>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>