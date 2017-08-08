<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
        Profiles managment
    </h2>
    {!! Form::open(['method'=>'POST','route'=>'user.store']) !!}
    <div class="panelHead">
        <div class="filterGroup">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    Type of profile:
                </h2>

                <div class="formField formField--fixed">
                    {!! Form::select('profileType',[''=>'Any']+$profileType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    status
                </h2>
                <div class="formField formField--fixed">
                    {!! Form::select('statusType',[''=>'Any']+$statusType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
        </div>
        <a href="#" class="print">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a>
    </div>
    {!! Form::close()!!}
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


            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            </tbody>
        </table>
    </div>

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
                    Nta Unswers
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

            <tr>
                <td>

                </td>
                <td class="for-inner">
                    <table class="innerTable">
                        <tr>
                            <td>
                                <span>1</span>
                            </td>
                            <td>
                                <span>chris</span>
                            </td>
                            <td>
                                <span>purchaser</span>
                            </td>
                        </tr>

                    </table>

                </td>
                <td>
                    <div class="profStatus">
                        <span class="profStatus__item profStatus__item--new">new</span>
                        <span class="profStatus__item profStatus__item--active">active</span>
                        <span class="profStatus__item profStatus__item--canceled">canceled</span>
                        <span class="profStatus__item profStatus__item--edit">Edited</span>
                    </div>
                </td>
                <td>
                    <div class="tdBox">
                        <span class="tdValue">5</span>
                        <a href="#" class="actionsBtn actionsBtn--view">
                            reject

                        </a>
                    </div>


                </td>
                <td class="for-inner">
                    <table class="innerTable innerTable--fixed">
                        <tr>
                            <td>

                                <a href="#" class="actionsBtn actionsBtn--accept">
                                    accept

                                </a>
                            </td>
                            <td>
                                <a href="#" class="actionsBtn actionsBtn--reject">
                                    reject

                                </a>

                            </td>
                            <td>
                                <a href="#" class="actionsBtn actionsBtn--block">
                                    block

                                </a>

                            </td>
                        </tr>

                    </table>
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td class="for-inner">
                    <table class="innerTable">
                        <tr>
                            <td>
                                <span>1</span>
                            </td>
                            <td>
                                <span>chris</span>
                            </td>
                            <td>
                                <span>purchaser</span>
                            </td>
                        </tr>

                    </table>
                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>

            </tr>
            </tbody>
        </table>
    </div>
</div>