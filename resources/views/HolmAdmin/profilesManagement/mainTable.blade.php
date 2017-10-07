<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        <thead>
        <tr>
            <td class="orderNumber">
                  <span class="td-title td-title--number">
                   №
                  </span>
            </td>
            <td class="bigger-td no-padding-l">
                  <span class="td-title td-title--mint">
                  user
                  </span>

            </td>
            <td class="ordninary-td">
                  <span class="td-title td-title--dark-mint ">
                    PROFILE STATUS
                  </span>
            </td>
            <td class="ordninary-td">
                  <span class="td-title td-title--light-brown">
                    Nta Answers
                  </span>
            </td>
            <td class="bigger-td">
                  <span class="td-title td-title--light-blue ">
                    ACTIONS
                  </span>
            </td>

        </tr>

        <tr class="extra-tr">
            <td></td>
            <td class="for-inner">
                <table class="innerTable">
                    <tr>
                        <td>
                            <span class="extraTitle">id</span>
                        </td>
                        <td>
                            <span class="extraTitle">name</span>
                        </td>
                        <td>
                            <span class="extraTitle">user type</span>
                        </td>
                    </tr>

                </table>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


        </thead>

        <tbody>
        @foreach($userList as $item)
            @include(config('settings.theme').'.profilesManagement.mainTableRow')
        @endforeach
        </tbody>
    </table>
</div>