<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-list" aria-hidden="true"></i>
          </span>
        Statistic
    </h2>


    <div class="panelHead">
        <div class="panelHead__group">

        </div>
        <div class="panelHead__group">
            <a href="javascript: window.print()" class="print">
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
                        {{(int)$incomeStatistic['week']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$incomeStatistic['week']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$incomeStatistic['week']->current - $incomeStatistic['week']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$incomeStatistic['week']->current - $incomeStatistic['week']->last < 0 ? '' : '+'}}
                          {{$incomeStatistic['week']->current - $incomeStatistic['week']->last}}
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
                        {{(int)$incomeStatistic['month']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$incomeStatistic['month']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$incomeStatistic['month']->current - $incomeStatistic['month']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$incomeStatistic['month']->current - $incomeStatistic['month']->last < 0 ? '' : '+'}}
                          {{$incomeStatistic['month']->current - $incomeStatistic['month']->last}}
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
                        GROWTH
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
                        {{(int)$transactionsStatistic['week']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$transactionsStatistic['week']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$transactionsStatistic['week']->current - $transactionsStatistic['week']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$transactionsStatistic['week']->current - $transactionsStatistic['week']->last < 0 ? '' : '+'}}
                          {{$transactionsStatistic['week']->current - $transactionsStatistic['week']->last}}
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
                        {{(int)$transactionsStatistic['month']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$transactionsStatistic['month']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last < 0 ? '' : '+'}}
                          {{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last}}
                      </span>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="statisticGroup">

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
                        GROWTH
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
                        {{(int)$newPurchaserStatistic['week']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$newPurchaserStatistic['week']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$newPurchaserStatistic['week']->current - $newPurchaserStatistic['week']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$newPurchaserStatistic['week']->current - $newPurchaserStatistic['week']->last < 0 ? '' : '+'}}
                          {{$newPurchaserStatistic['week']->current - $newPurchaserStatistic['week']->last}}
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
                        {{(int)$transactionsStatistic['month']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$transactionsStatistic['month']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last < 0 ? '' : '+'}}
                          {{$transactionsStatistic['month']->current - $transactionsStatistic['month']->last}}
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
                      GROWTH
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
                        {{(int)$newCarersStatistic['week']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$newCarersStatistic['week']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$newCarersStatistic['week']->current - $newCarersStatistic['week']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$newCarersStatistic['week']->current - $newCarersStatistic['week']->last < 0 ? '' : '+'}}
                          {{$newCarersStatistic['week']->current - $newCarersStatistic['week']->last}}
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
                        {{(int)$newCarersStatistic['month']->last}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span>
                          {{(int)$newCarersStatistic['month']->current}}
                      </span>
                        </td>
                        <td class="textCenter">
                      <span class="{{$newCarersStatistic['month']->current - $newCarersStatistic['month']->last < 0 ? 'negativeValue' : 'positiveValue'}}">
                        {{$newCarersStatistic['month']->current - $newCarersStatistic['month']->last < 0 ? '' : '+'}}
                          {{$newCarersStatistic['month']->current - $newCarersStatistic['month']->last}}
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
                Number of Transactions on Graff by month
            </h2>

        </div>
        <div class="chartWrap">
            <div class="chart" id="chart_div"></div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function(){
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Transactions');
            data.addRows([
                @foreach($dataForTransactionsChart as $item)
                {!!'["'.$item->month.'", '.$item->amount.'],'!!}
                @endforeach
            ]);
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data);
        }
    });
</script>