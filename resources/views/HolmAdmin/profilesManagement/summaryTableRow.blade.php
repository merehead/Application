<tr>
    <td><span class="extraTitle">{{$item['type']}}</span></td>
    <td style="text-align: center;">{{(isset($item['New']))?$item['New']:0}}</td>
    <td style="text-align: center;">{{isset($item['Active'])?$item['Active']:0}}</td>
    <td style="text-align: center;">{{isset($item['Rejected'])?$item['Rejected']:0}}</td>
    <td style="text-align: center;">{{isset($item['Edited'])?$item['Edited']:0}}</td>
    <td style="text-align: center;">{{isset($item['Blocked'])?$item['Blocked']:0}}</td>
</tr>