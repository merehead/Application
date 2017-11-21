<div class="tableWrap">
    <table class="adminTable">
        <thead>
        <tr>
            <td>
                  <span class="td-title td-title--dark-blue">
                    Profile Status
                  </span>
            </td>
            <td>
                  <span class="td-title  td-title--dark-green">
                  New
                  </span>
            </td>
            <td>
                  <span class="td-title  td-title--light-green">
                    ACTIVE
                  </span>
            </td>
            <td>
                  <span class="td-title  td-title--red">
                    REJECTED
                  </span>
            </td>
            <td>
                  <span class="td-title td-title--lighten-blue">
                    EDITED
                  </span>
            </td>
            <td>
                  <span class="td-title td-title--grey">
                  BLOCKED
                  </span>
            </td>
        </tr>
        <tr class="extra-tr">
            <td><span class="extra-tr__title">total</span></td>
            <td>{{$totals['New']}}</td>
            <td>{{$totals['Active']}}</td>
            <td>{{$totals['Rejected']}}</td>
            <td>{{$totals['Edited']}}</td>
            <td>{{$totals['Blocked']}}</td>
        </tr>

        </thead>
        <tbody>
        @foreach($totalsByUserType as $item)
            @include(config('settings.theme').'.profilesManagement.summaryTableRow')
        @endforeach
        </tbody>
    </table>
    $totalsByUserType
</div>