<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-comment" aria-hidden="true"></i>
          </span>
        Reviews managament
    </h2>
    <div class="tableWrap tableWrap--margin-t">
        <h2 class="review__title">
            Booking Overview - {{$reviews->id}}
        </h2>
        <div class="adminTable">
            <div class="userRating">
                <div class="userRating__item">
                    <h2 style="margin-right: 20px;" class="userRating__title">
                        Rating
                    </h2>
                    <p class="userRating__name">
                        <span>Punctuality</span>
                    </p>
                    <div class="profileRating ">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="profileRating__item {{$reviews->punctuality >= $i ? 'active' : ''}}"><i
                                        class="fa fa-heart"></i></span>
                        @endfor
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>FRIENDLINESS</span>s
                    </p>
                    <div class="profileRating ">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="profileRating__item {{$reviews->friendliness >= $i ? 'active' : ''}}"><i
                                        class="fa fa-heart"></i></span>
                        @endfor
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>Communication</span>
                    </p>
                    <div class="profileRating ">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="profileRating__item {{$reviews->communication >= $i ? 'active' : ''}}"><i
                                        class="fa fa-heart"></i></span>
                        @endfor
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>Performance</span>
                    </p>
                    <div class="profileRating ">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="profileRating__item {{$reviews->performance >= $i ? 'active' : ''}}"><i
                                        class="fa fa-heart"></i></span>
                        @endfor
                    </div>
                </div>
            </div>
            <form class="reviewForm" method="post" action="{{route('ReviewManagementEdit',['id'=>$reviews->id])}}">
                <input type="hidden" name="punctuality" value="1">
                <input type="hidden" name="friendliness" value="1">
                <input type="hidden" name="communication" value="1">
                <input type="hidden" name="performance" value="1">
                <div class="formField">
                    <h2 style="margin-right: 20px;" class="userRating__title">
                        Comment
                    </h2>
                    <textarea style="margin-top: 6px; width: 673px; height: 96px;" rows="3"
                              class="formArea formArea--review " placeholder="Type your comment" name="comment"
                              maxlength="150">{{$reviews->comment}}</textarea>

                </div>
                <div class="formField">
                    <button type="submit" class="reviewForm__btn">
                        submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>