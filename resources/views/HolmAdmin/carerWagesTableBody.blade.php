@foreach($data as $d)

    <tr>
        <td>
            <span></span>

        </td>


        <td class="for-inner">
            <table class="innerTable ">
                <tbody>
                <tr>
                    <td class="idField">
                        <span>{{$d->id}}</span>
                    </td>
                    <td class="">
                        <a target="_blank" href="{{route('carerPublicProfile',['user_id'=>$d->id])}}"
                           class="tableLink">{{$d->full_name}}</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>


        <td>
            <div class="formField formField--hour-rate">
                <div class="fieldWrap">
                    <form method="post" id="wages{{$d->id}}" action="{{route('CarerWagesPost')}}">
                        {{ csrf_field() }}
                        <input type="text" value="{{$d->wage}}" class="formItem
                                formItem--input" placeholder="13"  name="hour_rate">
                        <input type="hidden" name="carer_id" value="{{$d->id}}">
                    </form>
                </div>
            </div>
        </td>
        <td>
            <div class="actionsGroup actionsGroup--row">
                <a href="#" id="#wages{{$d->id}}" class="actionsBtn actionSave actionsBtn--accept
                                    actionsBtn--small">
                    save
                </a>
                <a href="#" class="actionsBtn actionsBtn--block actionsBtn--small" style="display: none">
                    edit
                </a>
            </div>
        </td>

    </tr>

@endforeach