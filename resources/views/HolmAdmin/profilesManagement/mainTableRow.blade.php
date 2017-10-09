<tr>
    <td>

    </td>
    <td class="for-inner">
        <table class="innerTable">
            <tr>
                <td>
                    <span>{{$item->id}}</span>
                </td>
                <td>
                    @if($item->user_type == 'service')
                        <a href="{{route('ServiceUserSetting',[$item->id])}}" class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @elseif($item->user_type == 'purchaser')
                        <a href="{{route('purchaserSettings',[$item->id])}}" class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @elseif($item->user_type == 'carer')
                        <a href="{{route('carerSettings',[$item->id])}}" class="tableLink"><span>{{$item->first_name}} {{$item->family_name}}</span></a>
                    @endif
                </td>
                <td>
                    <span>{{$item->user_type}}</span>
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
        </div>
    </td>

    <div class="modal fade" id="myModal{{$item->id}}" role="dialog">
        <div class="modal-dialog">
            {{var_dump($item->nta)}}
        </div>
    </div>


    {{--

    @include(config('settings.theme').'.profilesManagement.ntaAnswers')

    --}}


    {{--    <div id="popupWrap{{$item->id}}" class="popupWrap" style="display:none;position: fixed; top:50%; left:50%; transform: translate(-50%, -50%);">
        <div class="adminPopup ">
            <div class="adminPopup__head popupHead">
                <a href="#" class="closeModal"
                   onclick="event.preventDefault();document.getElementById('popupWrap{{$item->id}}').style.display = 'none';">
                    <i class="fa fa-times"></i>
                </a>
                <p>{{$item->first_name}} {{$item->family_name}}</p>
            </div>
            <div class="adminPopup__body">
                <h2 class="themeTitle  themeTitle--small">
                    answer
                </h2>
                <div class="popupAnswer">
                    <p>
                        {{var_dump($item->nta)}}
                    </p>
                </div>
            </div>
        </div>
    </div>--}}
    <td class="for-inner">
        <table class="innerTable innerTable--fixed">
            <tr>
                <td>
                    @if($item->profileStatus->name != 'Active')
                        @if ($item instanceof \App\CarersProfile)
                        <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--accept"
                           onclick="event.preventDefault();document.getElementById('accept-form{{$item['id']}}').submit();">
                            accept
                        </a>
                        <form id="accept-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put" />
                            <input type="hidden" name="action" value="accept" />
                            <input type="hidden" name="user_type" value={{$item->user_type}} />
                        </form>
                        @endif
                    @endif
                </td>
                <td>
                    @if($item->profileStatus->name != 'Rejected')
                        @if ($item instanceof \App\CarersProfile)
                    <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--reject"
                       onclick="event.preventDefault();document.getElementById('reject-form{{$item['id']}}').submit();">
                        reject
                    </a>
                    <form id="reject-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="action" value="reject" />
                        <input type="hidden" name="user_type" value={{$item->user_type}} />
                    </form>
                            @endif
                    @endif
                </td>
                <td>
                    @if($item->profileStatus->name != 'Blocked')
                    <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--block"
                       onclick="event.preventDefault();document.getElementById('block-form{{$item['id']}}').submit();">
                        block
                    </a>
                    <form id="block-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="action" value="block" />
                        <input type="hidden" name="user_type" value={{$item->user_type}} />
                    </form>
                        @else
                        <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--accept"
                           onclick="event.preventDefault();document.getElementById('unblock-form{{$item['id']}}').submit();">
                            unblock
                        </a>
                        <form id="unblock-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put" />
                            <input type="hidden" name="action" value="accept" />
                            <input type="hidden" name="user_type" value={{$item->user_type}} />
                        </form>
                    @endif
                </td>
            </tr>

        </table>
    </td>

</tr>


