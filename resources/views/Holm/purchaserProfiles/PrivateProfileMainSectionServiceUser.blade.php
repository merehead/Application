<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">People i am BUYING care for</h2>
    </div>
</div>
<div class="peopleCareWrap">
    <div class="row">
        <div class="col-md-9">

            <?php $uncompliteUser = 0;  ?>
            @if(count($serviceUsers))
                @foreach($serviceUsers as $serviceUser)

                    @if(!$serviceUser->isDeleted())

                        <?php if ($serviceUser->registration_progress!='61')
                                $uncompliteUser = $serviceUser->id;
                            ?>
                        <div class="peopleCare">

                            <div class="peopleCare__item">
                                <div class="profilePhoto peopleCare__photo">
                                    <a href="" target="blank"> <img src="img/service_user_profile_photos/{{$serviceUser->id}}.png" onerror="this.src='/img/no_photo.png'" alt=""> </a>
                                </div>

                                <h2 class="peopleCare__name">
                                    <a href="{{ $serviceUser->registration_progress!='61'
                                    ? route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])
                                    : route('ServiceUserSetting',['id'=>$serviceUser->id])}}"
                                       target="blank">
                                        @if(strlen($serviceUser->first_name))
                                            {!! $serviceUser->first_name.'&nbsp'.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                        @else
                                            New
                                        @endif
                                    </a>
                                </h2>
                                <a href="{{route('ServiceUserProfileDelete', ['serviceUserProfile' => $serviceUser->id])}}" class="peopleCare__delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>
                    @endif

                @endforeach
            @endif

        </div>
        <div class="col-md-3">
            <div class="roundedBtn roundedBtn--peopleCare">
                @if($uncompliteUser == 0)
                <a href="{{route('ServiceUserCreate')}}" class="roundedBtn__item roundedBtn__item--accept">
                    ADD SERVICE USER
                </a>
                @else
                    <a href="{{route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])}}" class="roundedBtn__item roundedBtn__item--accept">
                        <span style="font-size: 80%">CONTINUE REGISTRATION</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
