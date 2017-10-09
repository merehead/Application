<tr>
    <td><span class="extraTitle">{{$item['type']}}</span></td>
    <td>{{(isset($item['New']))?$item['New']:0}}</td>
    <td>{{isset($item['Active'])?$item['Active']:0}}</td>
    <td>{{isset($item['Rejected'])?$item['Rejected']:0}}</td>
    <td>{{isset($item['Edited'])?$item['Edited']:0}}</td>
    <td>{{isset($item['Blocked'])?$item['Blocked']:0}}</td>
</tr>