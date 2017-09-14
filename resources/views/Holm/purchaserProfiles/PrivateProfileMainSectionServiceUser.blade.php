<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">People i am BUYING care for</h2>
    </div>
</div>
<div class="peopleCareWrap">
    <div class="row">
        <div class="col-md-9">

            @if(count($serviceUsers))
            @foreach($serviceUsers as $serviceUser)

            <div class="peopleCare">

                <div class="peopleCare__item">
                    <div class="profilePhoto peopleCare__photo">
                        <a href="" target="balnk">  <img src="/img/no_photo.png" alt=""> </a>
                    </div>

                    <h2 class="peopleCare__name">
                        <a href="{{route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])}}" target="balnk">{{$serviceUser->like_name}}</a>
                    </h2>
                    <a href="" class="peopleCare__delete">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>

            </div>

            @endforeach
            @endif

        </div>
        <div class="col-md-3">
            <div class="roundedBtn roundedBtn--peopleCare">
                <a href="{{route('ServiceUserCreate')}}" class="roundedBtn__item roundedBtn__item--accept">
                    ADD SERVICE USER
                </a>
            </div>
        </div>
    </div>
</div>