<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(document).ready(function(){
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 17,
            center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
    });
</script>
<div id="message-carer" class="modalWrapper modal fade">
    <div class="customModal">
        <div class="message">
            <div class="message__header">
                <div class="bookCarer">
                    <a href="" class="bookCarer__item bookCarer__item--modal centeredLink">Book carer</a>
                </div>

                <a href="#" data-dismiss="modal" aria-label="Close" class="closeModal">
                    <i class="fa fa-close"></i>
                </a>
            </div>
            <div class="message__body">
                <form id="bookings__form" method="POST" action="/bookings">
                    <input type="hidden" name="carer_id" value="{{$carerProfile->id}}">
                    <input type="hidden" name="town" value="{{$carerProfile->town}}">
                    <input type="hidden" name="address_line1" value="{{$carerProfile->address_line1}}">
                <div class="messageGroup">
                    <h2 class="ordinaryTitle ordinaryTitle--smaller">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Person needing care
              </span>
                    </h2>
                    <div class="needCareContainer">
                        <div class="needCare btn-group" data-toggle="buttons" data-html="Service_user_Public_profile_page">
                            @foreach(Auth::user()->userPurchaserProfile->serviceUsers as $serviceUser)

                                @if(!$serviceUser->isDeleted())

                                    @if(strlen($serviceUser->first_name)>0)

                                        <a href="{{ $serviceUser->registration_progress!='61'
                                    ? route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])
                                    : route('ServiceUserSetting',['id'=>$serviceUser->id])}}" class="needCare__item centeredLink btn btn-default">
                                            {!! $serviceUser->first_name.'&nbsp'.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                            <input type="radio" id="q{{$serviceUser->id}}" name="service_user_id" value="{{$serviceUser->id}}" />
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="messageMap map">
                            {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.71192633547!2d-0.3818036193070037!3d51.52873519756609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1497972116028"--}}
                                    {{--frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                            <div class="profileMap map" style="width:100%;height:200px">
                                <div id="map_canvas" style="clear:both; height:200px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="messageGroup">

                    <h2 class="ordinaryTitle">
                        <span class="ordinaryTitle__text">Type of care</span>
                    </h2>
                    <div class="messageCheckbox">
                        @foreach($typeCareAll as $care)
                            <div class="checkBox_item">

                                {!! Form::checkbox('assistance_types[]', null, null,
                                            array('class' => 'customCheckbox ','id'=>'assistance_types'.$care->id,'value'=>$care->id)) !!}
                                <label for="assistance_types{{$care->id}}">{{$care->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="messageGroup ">
                    <h2 class="ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                select date and time
              </span>
                    </h2>
                    <div class="messageInputs datetime nhide">
                        <div class="messageInputs__field messageDate">
                            <input type="text" name="appointments[]['date_start']" class="messageInput datepicker" placeholder="06.06.2017 ">

                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageDate">
                            <input type="text" class="messageInput datepicker" name="appointments[]['date_end']" placeholder=" 08.08.2017">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageTime ">
                            <input type="text" class="messageInput timepicker_message" name="appointments[]['time_end']" placeholder="12:00 AM - 5:00 PM">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageTime ">
                            <input type="text" class="messageInput timepicker_message" name="appointments[]['time_end']" placeholder="12:00 AM - 5:00 PM">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="messageInputs datetime ">
                        <div class="messageInputs__field messageDate">
                            <input type="text" name="appointments[]['date_start']" class="messageInput datepicker datepicker_message" placeholder="06.06.2017 ">

                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageDate">
                            <input type="text" class="messageInput datepicker datepicker_message" name="appointments[]['date_end']" placeholder=" 08.08.2017">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageTime ">
                            <input type="text" class="messageInput timepicker_message" name="appointments[]['time_end']" placeholder="12:00 AM - 5:00 PM">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="messageInputs__field messageTime ">
                            <input type="text" class="messageInput timepicker_message" name="appointments[]['time_end']" placeholder="12:00 AM - 5:00 PM">
                            <a href="#" class="messageIco centeredLink">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="messageGroup ">
                    <h2 class="ordinaryTitle">
                        <span class="ordinaryTitl__text">How often</span>
                    </h2>
                    <div class="messageCheckbox checktime">
                        <div class="checkBox_item">
                            <input type="checkbox" name="periodicity[]" value="Daily" class="customCheckbox" id="boxD1">
                            <label for="boxD1">Daily</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="periodicity[]" value="Weekly" class="customCheckbox" id="boxD2">
                            <label for="boxD2">weekly</label>
                        </div>
                        <div class="checkBox_item">
                            <input type="checkbox" name="periodicity[]" value="Single" class="customCheckbox" id="box3">
                            <label for="box3">Single</label>
                        </div>

                    </div>
                </div>
                <a href="#" class="additionalTime">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    add additional time
                </a>

                <div class="moreBtn">
                    <a href="#" class="moreBtn__item moreBtn__item--withIco centeredLink ">
                        <span>+</span> add more bookings
                    </a>
                </div>

                </form>
            </div>

            <div class="message__footer">

                <div class="messageTotal">
                    <div class="bookBtn">
                        <button href=""
                           class="bookBtn__item bookBtn__item--big centeredLink">
                            book carer
                        </button>
                    </div>
                    <div class="total">
                        <div class="total__item  totalBox">
                            <div class="totalTitle">
                                <p>Total </p>
                                <span>  5 hours </span>
                            </div>
                            <p class="totalPrice"> £60 </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>