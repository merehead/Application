<tr>
    <td class="for-inner">
        <table class="innerTable">
            <tr>
                <td>
                    <span>{{$item->id}}</span>
                </td>
                <td>
                    @if($item->user_type == 'service')
                        <a href="{{route('ServiceUserSetting',[$item->id])}}"
                           class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @elseif($item->user_type == 'purchaser')
                        <a href="{{route('purchaserSettings',[$item->id])}}"
                           class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @elseif($item->user_type == 'carer')
                        <a href="{{route('carerSettings',[$item->id])}}"
                           class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @endif
                </td>
                <td>
                    <span>{{$item->user_type}}</span>
                </td>
                <td>
                    <span>
                        @if(in_array($item->user_type, ['carer', 'purchaser']) && (!empty($item->user->referral_code) || $item->user->use_register_code))
                            @if($item->user->use_register_code)
                                REGISTER
                            @else
                                {{$item->user->referral_code}}
                            @endif
                        @else
                        -
                        @endif
                    </span>
                </td>
                <td>
                    @if(in_array($item->user_type, ['carer', 'purchaser']))
                        {{$item->user->completed_appointments_hours}}
                    @else
                        -
                    @endif
                </td>
            </tr>

        </table>
    </td>
    <td>
        <div class="profStatus">
            <span class="profStatus__item profStatus__item--{{$item->profileStatus->css_admin}}">{{$item->profileStatus->name}}</span>
        </div>
    </td>
    <td>
        <div class="tdBox">
            @if($item->nta)
                <span class="tdValue">{{count($item->nta)}}</span>
                <a href="#" class="actionsBtn actionsBtn--view" data-toggle="modal" data-target="#myModal{{$item->id}}">
                    {{-- onclick="event.preventDefault();document.getElementById('popupWrap{{$item->id}}').style.display = 'block';">--}}
                    view
                </a>
            @endif
            @if($item->user_type == 'carer')
                <a href="#" class="actionsBtn actionsBtn--view" onclick="event.preventDefault();getCarerImage({{$item->id}})">
                    view
                </a>
            @endif
        </div>
    </td>

    @include(config('settings.theme').'.profilesManagement.ntaAnswers')

    <td class="for-inner">
        <table class="innerTable innerTable--fixed">
            <tr>
                <td>
                    @if($item->profileStatus->name == 'New')
                        @if ($item instanceof \App\CarersProfile)
                            <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--accept"
                               onclick="event.preventDefault();document.getElementById('accept-form{{$item['id']}}').submit();">
                                accept
                            </a>
                            <form id="accept-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>
                                <input type="hidden" name="action" value="accept"/>
                                <input type="hidden" name="user_type" value={{$item->user_type}} />
                            </form>
                        @endif
                    @endif
                </td>
                <td>
                    @if($item->profileStatus->name == 'New')
                        @if ($item instanceof \App\CarersProfile)
                            <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--reject"
                               onclick="event.preventDefault();document.getElementById('reject-form{{$item['id']}}').submit();">
                                reject
                            </a>
                            <form id="reject-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>
                                <input type="hidden" name="action" value="reject"/>
                                <input type="hidden" name="user_type" value={{$item->user_type}} />
                            </form>
                        @endif
                    @endif
                    <!-- IF Rejected has been clicked show recover -->
                    @if($item->profileStatus->name == 'Rejected')
                        @if ($item instanceof \App\CarersProfile)
                            <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--reject"
                               onclick="event.preventDefault();document.getElementById('recover-form{{$item['id']}}').submit();">
                                recover
                            </a>
                            <form id="recover-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>
                                <input type="hidden" name="action" value="recover"/>
                                <input type="hidden" name="user_type" value={{$item->user_type}} />
                            </form>
                        @endif
                    @endif
                    <!-- / IF Rejected has been clicked show recover -->
                </td>
                <td>
                    @if($item->user_type != 'service')
                        @if($item->profileStatus->name != 'Blocked')
                            <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--block"
                               onclick="event.preventDefault();document.getElementById('block-form{{$item['id']}}').submit();">
                                block
                            </a>
                            <form id="block-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>
                                <input type="hidden" name="action" value="block"/>
                                <input type="hidden" name="user_type" value={{$item->user_type}} />
                            </form>
                        @else
                            <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--accept"
                               onclick="event.preventDefault();document.getElementById('unblock-form{{$item['id']}}').submit();">
                                unblock
                            </a>
                            <form id="unblock-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>
                                <input type="hidden" name="action" value="accept"/>
                                <input type="hidden" name="user_type" value={{$item->user_type}} />
                            </form>
                        @endif
                    @endif
                </td>
            </tr>

        </table>
    </td>

    <td>
        <div class="profStatus">
                {{date("d-m-Y", strtotime($item->created_at))}}
        </div>
    </td>


</tr>


