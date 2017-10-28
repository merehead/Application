<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-list" aria-hidden="true"></i>
          </span>
        Statistic
    </h2>


    <div class="panelHead">
        <div class="panelHead__group">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    select date or period
                </h2>
                <div class="formField formField--fixed">
                    <div class="fieldWrap">
                        <input type="text" class="formItem  formItem--date-ico " name="daterange" value="10/10/2017 - 10/31/2017">
                        <span class="dateIco">
                      <i class="fa fa-calendar"></i>
                    </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="panelHead__group">
            <a href="#" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>

    </div>



    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                  </span>
                        BOOKINGS STATISTIC
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                       booking
                      </span>
                        </td>
                        <td class=" textCenter  ">
                      <span class="ordinaryTitle td-stat">
                      booking amount
                      </span>
                        </td>
                        <td class="textCenter    ">
                      <span class="ordinaryTitle td-stat">
                        Bookings value, £
                      </span>
                        </td>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookingsStatistic as $item)
                        <tr class="statisticRow">
                            <td class="">
                          <span>
                           @if($item->status_id == '2')
                                  New
                              @elseif($item->status_id == '5')
                                  In Progress
                              @elseif($item->status_id == '7')
                                  Completed
                              @endif
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->amount}}
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->price}}
                          </span>
                            </td>
                        </tr>
                    @endforeach
                    @if($bookingsStatisticTotal[0])
                        <tr class="statisticRow statisticRow--total">
                            <td>
                          <span class="">
                            total
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$bookingsStatisticTotal[0]->amount}}
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$bookingsStatisticTotal[0]->price}}
                          </span>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
                        user statistics
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class="">
                      <span class="ordinaryTitle td-stat td-stat--start">
                       User type
                      </span>
                        </td>
                        <td class=" textCenter  ">
                      <span class="ordinaryTitle td-stat">
                      Registered amount
                      </span>
                        </td>
                        <td class="textCenter   ">
                      <span class="ordinaryTitle td-stat">
                        Incomplete <br>Registrations AMOUNT
                      </span>
                        </td>


                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Purchaser
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['purchasers_amount']}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['incomplete_purchasers_amount']}}
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                        Service user
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['service_users_profiles']}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['incomplete_service_users_profiles']}}
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                        Cares
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['carers_amount']}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['incomplete_carers_amount']}}
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow statisticRow--total">
                        <td>
                      <span class="">
                        total
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['purchasers_amount'] + $usersStatistic['service_users_profiles'] + $usersStatistic['incomplete_carers_amount']}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$usersStatistic['incomplete_purchasers_amount'] + $usersStatistic['incomplete_carers_amount'] + $usersStatistic['incomplete_service_users_profiles']}}
                      </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                  </span>
                        THE MOST ACTIVE carers
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat">
                       №
                      </span>
                        </td>
                        <td class=" textCenter no-padding   ">
                      <span class="ordinaryTitle td-stat td-title td-title--orange">
                       Carer
                      </span>
                        </td>
                        <td class="textCenter    ">
                      <span class="ordinaryTitle td-stat">
                        APPOINTMENTS <br>PER WEEK
                      </span>
                        </td>
                        <td class="textCenter    ">
                      <span class="ordinaryTitle td-stat">
                        APPOINTMENTS <br>PER month
                      </span>
                        </td>
                    </tr>
                    <tr class="extra-tr">
                        <td>

                        </td>
                        <td class="for-inner">
                            <table class="innerTable " style="height: 65px;">
                                <tbody><tr>
                                    <td class="idField">
                                        <span class="extraTitle">id</span>
                                    </td>
                                    <td class="">
                                        <span class="extraTitle">name</span>
                                    </td>

                                </tr>

                                </tbody></table>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>

                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($mostActiveCarers as $item)
                        <tr class="statisticRow">
                            <td>
                          <span>
                           {{$i}}
                          </span>
                            </td>
                            <td class="for-inner">
                                <table class="innerTable " style="height: 97px;">
                                    <tbody><tr>
                                        <td class="idField">
                                            <span> {{$item->id}}</span>
                                        </td>
                                        <td class="">
                                            <a href="#" class="tableLink"> {{$item->first_name.' '.$item->family_name}}</a>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->appointments_per_last_week}}
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->appointments_per_last_month}}
                          </span>
                            </td>
                        </tr>
                        @php(++$i)
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-male" aria-hidden="true"></i>
                  </span>
                        THE MOST ACTIVE PURCHERS
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat">
                       №
                      </span>
                        </td>
                        <td class=" textCenter no-padding   ">
                      <span class="ordinaryTitle td-stat td-title td-title--light-green">
                       Purchaser
                      </span>
                        </td>
                        <td class="textCenter    ">
                      <span class="ordinaryTitle td-stat">
                        APPOINTMENTS <br>PER WEEK
                      </span>
                        </td>
                        <td class="textCenter    ">
                      <span class="ordinaryTitle td-stat">
                        APPOINTMENTS <br>PER month
                      </span>
                        </td>


                    </tr>
                    <tr class="extra-tr">
                        <td>

                        </td>
                        <td class="for-inner">
                            <table class="innerTable " style="height: 65px;">
                                <tbody><tr>
                                    <td class="idField">
                                        <span class="extraTitle">id</span>
                                    </td>
                                    <td class="">
                                        <span class="extraTitle">name</span>
                                    </td>

                                </tr>

                                </tbody></table>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>

                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($mostActiveCarers as $item)
                        <tr class="statisticRow">
                            <td>
                          <span>
                           {{$i}}
                          </span>
                            </td>
                            <td class="for-inner">
                                <table class="innerTable " style="height: 97px;">
                                    <tbody><tr>
                                        <td class="idField">
                                            <span> {{$item->id}}</span>
                                        </td>
                                        <td class="">
                                            <a href="#" class="tableLink"> {{$item->first_name.' '.$item->family_name}}</a>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->appointments_per_last_week}}
                          </span>
                            </td>
                            <td class="textCenter">
                          <span>
                            {{$item->appointments_per_last_month}}
                          </span>
                            </td>
                        </tr>
                        @php(++$i)
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                  </span>
                        HOLM INCOME STATISTIC
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      GROWTH, £
                      </span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                  </span>
                        New carers
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      GROWTH,  (IN %)
                      </span>
                        </td>





                    </tr>


                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                  </span>
                        NUMBER OF ACTIVE CARERS
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                        GROWTH,  (IN %)
                      </span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                  </span>
                        Number of Transactions
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                        GROWTH, £
                      </span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                  </span>
                        NEW PURCHASERS
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT,  £
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                        GROWTH,  (IN %)
                      </span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                       130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <div class="statisticHead">
                    <h2 class="statisticHead__title">
                  <span class="statisticHead__ico">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                  </span>
                        NUMBER OF ACTIVE Purchasers
                    </h2>

                </div>
                <table class="statisticTable">
                    <thead>
                    <tr>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      PERIOD
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      PREVIOUS
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      CURRENT
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                        GROWTH,  (IN %)
                      </span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       week
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                        123
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="negativeValue">
                        - 2
                      </span>
                        </td>
                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       month
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                      347
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                       130
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="positiveValue">
                        + 41
                      </span>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="chartBox">
        <div class="statisticHead">
            <h2 class="statisticHead__title">
              <span class="statisticHead__ico">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
              </span>
                Number of Transactions on Graff by weeks
            </h2>

        </div>
        <div class="chartWrap">
            <div class="chart" id="chart_div"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 1411px; height: 400px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="1411" height="400" aria-label="A chart." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_0"><rect x="172" y="77" width="1067" height="247"></rect></clipPath></defs><rect x="0" y="0" width="1411" height="400" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="1254" y="77" width="142" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="1254" y="77" width="142" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="1290" y="89.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#222222">transaction</text></g><path d="M1254,84.5L1284,84.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g><rect x="172" y="77" width="1067" height="247" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://dev.frevend.com/holmAdmin/statistic.html#_ABSTRACT_RENDERER_ID_0)"><g><rect x="172" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="404" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="635" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="867" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="1099" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="172" y="323" width="1067" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="172" y="262" width="1067" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="172" y="200" width="1067" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="172" y="139" width="1067" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="172" y="77" width="1067" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="172" y="77" width="1" height="247" stroke="none" stroke-width="0" fill="#333333"></rect><rect x="172" y="323" width="1067" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M172.5,323.5L187.94927536231884,298.9L203.3985507246377,266.92L218.8478260869565,281.68L234.29710144927537,279.22L249.7463768115942,301.36L265.195652173913,296.44L280.6449275362319,257.08L296.09420289855075,242.32L311.54347826086956,225.1L326.9927536231884,244.78L342.44202898550725,237.4L357.89130434782606,249.7L373.3405797101449,225.1L388.78985507246375,220.18L404.2391304347826,207.88L419.68840579710144,215.26L435.13768115942025,205.42000000000002L450.5869565217391,195.57999999999998L466.03623188405794,190.66L481.4855072463768,220.18L496.9347826086956,188.2L512.3840579710145,185.74L527.8333333333333,183.28L543.2826086956521,175.9L558.731884057971,200.5L574.1811594202898,195.57999999999998L589.6304347826087,198.04000000000002L605.0797101449275,202.96L620.5289855072464,193.12L821.3695652173913,168.52L836.8188405797101,161.14000000000001L852.268115942029,158.68L867.7173913043478,153.76L883.1666666666666,153.76L898.6159420289855,151.3L914.0652173913043,146.38L929.5144927536231,156.22L944.963768115942,161.14000000000001L960.4130434782609,163.6L975.8623188405796,158.68L991.3115942028985,151.3L1006.7608695652174,148.84L1022.2101449275362,146.38L1037.659420289855,143.92000000000002L1053.108695652174,139L1068.5579710144928,151.3L1084.0072463768115,156.22L1099.4565217391305,166.06L1114.9057971014493,175.9L1130.355072463768,163.6L1145.804347826087,158.68L1161.2536231884058,156.22L1176.7028985507245,153.76L1192.1521739130435,151.3L1207.6014492753623,146.38L1223.050724637681,139L1238.5,126.69999999999999" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="172.5" y="345.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="404.2391304347826" y="345.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">15</text></g><g><text text-anchor="middle" x="635.9782608695652" y="345.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">30</text></g><g><text text-anchor="middle" x="867.7173913043478" y="345.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">45</text></g><g><text text-anchor="middle" x="1099.4565217391305" y="345.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">60</text></g><g><text text-anchor="end" x="157" y="328.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="157" y="267.25" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="end" x="157" y="205.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="end" x="157" y="144.25" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="end" x="157" y="82.75" font-family="Arial" font-size="15" stroke="none" stroke-width="0" fill="#444444">100</text></g></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>X</th><th>transaction</th></tr></thead><tbody><tr><td>0</td><td>0</td></tr><tr><td>1</td><td>10</td></tr><tr><td>2</td><td>23</td></tr><tr><td>3</td><td>17</td></tr><tr><td>4</td><td>18</td></tr><tr><td>5</td><td>9</td></tr><tr><td>6</td><td>11</td></tr><tr><td>7</td><td>27</td></tr><tr><td>8</td><td>33</td></tr><tr><td>9</td><td>40</td></tr><tr><td>10</td><td>32</td></tr><tr><td>11</td><td>35</td></tr><tr><td>12</td><td>30</td></tr><tr><td>13</td><td>40</td></tr><tr><td>14</td><td>42</td></tr><tr><td>15</td><td>47</td></tr><tr><td>16</td><td>44</td></tr><tr><td>17</td><td>48</td></tr><tr><td>18</td><td>52</td></tr><tr><td>19</td><td>54</td></tr><tr><td>20</td><td>42</td></tr><tr><td>21</td><td>55</td></tr><tr><td>22</td><td>56</td></tr><tr><td>23</td><td>57</td></tr><tr><td>24</td><td>60</td></tr><tr><td>25</td><td>50</td></tr><tr><td>26</td><td>52</td></tr><tr><td>27</td><td>51</td></tr><tr><td>28</td><td>49</td></tr><tr><td>29</td><td>53</td></tr><tr><td>42</td><td>63</td></tr><tr><td>43</td><td>66</td></tr><tr><td>44</td><td>67</td></tr><tr><td>45</td><td>69</td></tr><tr><td>46</td><td>69</td></tr><tr><td>47</td><td>70</td></tr><tr><td>48</td><td>72</td></tr><tr><td>49</td><td>68</td></tr><tr><td>50</td><td>66</td></tr><tr><td>51</td><td>65</td></tr><tr><td>52</td><td>67</td></tr><tr><td>53</td><td>70</td></tr><tr><td>54</td><td>71</td></tr><tr><td>55</td><td>72</td></tr><tr><td>56</td><td>73</td></tr><tr><td>57</td><td>75</td></tr><tr><td>58</td><td>70</td></tr><tr><td>59</td><td>68</td></tr><tr><td>60</td><td>64</td></tr><tr><td>61</td><td>60</td></tr><tr><td>62</td><td>65</td></tr><tr><td>63</td><td>67</td></tr><tr><td>64</td><td>68</td></tr><tr><td>65</td><td>69</td></tr><tr><td>66</td><td>70</td></tr><tr><td>67</td><td>72</td></tr><tr><td>68</td><td>75</td></tr><tr><td>69</td><td>80</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 1421px; white-space: nowrap; font-family: Arial; font-size: 15px;">transaction</div><div></div></div></div>
        </div>
    </div>
    <div class="statisticGroup">
        <div class="statisticBox">
            <div class="tableWrap">
                <table class="statisticTable">
                    <thead>
                    <tr class="greenRow">
                        <td class="">
                      <span class="ordinaryTitle td-stat td-stat--start">
                      gender
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      MALE AMOUNT
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      FEMALE AMOUNT
                      </span>
                        </td>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Service user
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$genderStatistic['service_users']->male}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$genderStatistic['service_users']->female}}
                      </span>
                        </td>

                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Purchaser
                      </span>
                        </td>

                        <td class="textCenter">
                      <span>
                          {{$genderStatistic['purchasers']->male}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{$genderStatistic['purchasers']->female}}
                      </span>
                        </td>

                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Carer
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{$genderStatistic['carers']->male}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$genderStatistic['carers']->female}}
                      </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="statisticBox">
            <div class="tableWrap">
                <table class="statisticTable">
                    <thead>
                    <tr class="greenRow">
                        <td class="">
                      <span class="ordinaryTitle td-stat td-stat--start">
                       age
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                       &lt; 19
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                       20 - 39
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                       40 - 59
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      60 - 79
                      </span>
                        </td>
                        <td class=" ">
                      <span class="ordinaryTitle td-stat ">
                      80 +
                      </span>
                        </td>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Service user
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                      {{$ageStatistic['service_users']->{'19'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['service_users']->{'20_39'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['service_users']->{'40_59'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['service_users']->{'60_79'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['service_users']->{'80'} }}
                      </span>
                        </td>

                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Purchaser
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                      {{$ageStatistic['purchasers']->{'19'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['purchasers']->{'20_39'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['purchasers']->{'40_59'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['purchasers']->{'60_79'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['purchasers']->{'80'} }}
                      </span>
                        </td>

                    </tr>
                    <tr class="statisticRow">
                        <td>
                      <span>
                       Carer
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                      {{$ageStatistic['carers']->{'19'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['carers']->{'20_39'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                        {{$ageStatistic['carers']->{'40_59'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['carers']->{'60_79'} }}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                         {{$ageStatistic['carers']->{'80'} }}
                      </span>
                        </td>

                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>