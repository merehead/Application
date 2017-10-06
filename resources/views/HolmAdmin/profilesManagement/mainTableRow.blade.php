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
                    <a href="#" class="tableLink"><span>{{$item->first_name}}</span></a>
                </td>
                <td>
                    <span>{{$item->family_name}}</span>
                </td>
            </tr>

        </table>
    </td>
    <td>
        <div class="profStatus">
          {{--  <span class="profStatus__item profStatus__item--{{$rowClass}}">{{$item['userStatus']}}</span>--}}
        </div>
    </td>
    <td>
        <div class="tdBox">
            {{--<span class="tdValue">{{$item['nta']}}</span>--}}
            <a href="#" class="actionsBtn actionsBtn--view"
               onclick="event.preventDefault();document.getElementById('popupWrap1').style.display = 'block';">
                view
            </a>
        </div>
    </td>
    <td class="for-inner">
        <table class="innerTable innerTable--fixed">
            <tr>
                <td>
                    <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--accept"
                       onclick="event.preventDefault();document.getElementById('accept-form{{$item['id']}}').submit();">
                        accept
                    </a>
                    <form id="accept-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="action" value="accept" />
                    </form>
                </td>
                <td>

                    <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--reject"
                       onclick="event.preventDefault();document.getElementById('reject-form{{$item['id']}}').submit();">
                        reject
                    </a>
                    <form id="reject-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="action" value="reject" />
                    </form>

                </td>
                <td>
                    <a href="{{ route('user.update',$item['id']) }}" class="actionsBtn actionsBtn--block"
                       onclick="event.preventDefault();document.getElementById('block-form{{$item['id']}}').submit();">
                        block
                    </a>
                    <form id="block-form{{$item['id']}}" action="{{ route('user.update',$item['id']) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="action" value="block" />
                    </form>
                </td>
            </tr>

        </table>
    </td>

</tr>
