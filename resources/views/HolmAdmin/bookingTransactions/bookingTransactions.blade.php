<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-gbp" aria-hidden="true"></i>
          </span>
        Bookings transactions
    </h2>

    <div class="panelHead">
        <div class="filterBox">
            <div class="formField formField--fix-biger">
                <div class="fieldWrap">
                    <input type="search" class="formItem formItem--input formItem--search" placeholder="Search...">
                    <button class="searchBtn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </div>


        <div class="panelHead__group">
            <div class="filterBox">
                <div class="formField formField--fixed">
                    <div class="fieldWrap">
                        <input type="text" class="formItem formItem--input formItem--search" name="daterange" value="10/10/2017 - 10/31/2017">
                        <button class="searchBtn">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <div class="panelHead__group">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    sort by
                </h2>
                <div class="formField formField--fixed">
                    <select class="formItem formItem--select">
                        <option value="#">
                            --Text--
                        </option>
                    </select>
                </div>

            </div>
            <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">
                filter
            </a>
            <a href="#" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>

    </div>



    <div class="tableWrap tableWrap--margin-t">
        <table class="adminTable">
            <thead>
            <tr>
                <td class=" ordninary-td no-padding-l">
                  <span class="td-title td-title--transaction">
                    transaction id
                  </span>

                </td>
                <td class=" ordninary-td ordninary-td--small no-padding-l">
                  <span class="td-title td-title--time">
                    date and time
                  </span>

                </td>
                <td class=" ordninary-td ordninary-td--big ">
                  <span class="td-title td-title--light-green ">
                  purchaser
                  </span>

                </td>
                <td class=" ordninary-td  ordninary-td--big no-padding-l">
                  <span class="td-title td-title--orange">
                    carer
                  </span>

                </td>
                <td class=" ordninary-td  no-padding-l">
                  <span class="td-title td-title--booking">
                    booking
                  </span>
                </td>

                <td class=" ordninary-td  no-padding-l">
                  <span class="td-title td-title--pay-type">
                    PAYMENT type
                  </span>
                </td>
                <td class="ordninary-td">
                  <span class="td-title td-title--trans-status ">
                  transaction status
                  </span>
                </td>


            </tr>

            <tr class="extra-tr">
                <td>

                </td>
                <td>

                </td>
                <td class="for-inner">
                    <table class="innerTable ">
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
                <td class="for-inner">
                    <table class="innerTable ">
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
                <td class="for-inner">
                    <table class="innerTable ">
                        <tbody><tr>
                            <td class="idField">
                                <span class="extraTitle">id</span>
                            </td>
                            <td class="">
                                <span class="extraTitle">amount</span>
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

            @if($transactions->count() > 0)
                @foreach($transactions as $transaction)
                    <tr>
                        <td align="center">
                          <span>
                            {{$transaction->id}}
                          </span>

                        </td>
                        <td>
                            <span>{{$transaction->created_at->format("H:i")}}</span>
                            <p>{{$transaction->created_at->format("d/m/Y")}}</p>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$transaction->booking->bookingPurchaser->id}}</span>
                                    </td>
                                    <td class="">
                                        <a href="#" class="tableLink">{{$transaction->booking->bookingPurchaserProfile->full_name}}</a>
                                    </td>

                                </tr>
                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$transaction->booking->bookingCarer->id}}</span>
                                    </td>
                                    <td class="">
                                        <a href="#" class="tableLink">{{$transaction->booking->bookingCarerProfile->full_name}}</a>
                                    </td>

                                </tr>
                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span><a href="{{url('/bookings/'.$transaction->booking->id.'/details')}}" target="_blank">{{$transaction->booking->id}}</a></span>
                                    </td>
                                    <td class="">
                                        <span><i class="fa fa-gbp" aria-hidden="true"></i> {{$transaction->amount}}</span>
                                    </td>

                                </tr>
                                </tbody></table>
                        </td>
                        <td>
                          <span>
                            @if($transaction->booking->payment_method == 'credit_card')
                                Credit Card
                            @elseif($transaction->booking->payment_method == 'bonus_wallet')
                                Bonuses Wallet
                            @endif
                          </span>
                        </td>
                        <td>
                            <div class="profStatus profStatus--left">
                                <span class="profStatus__item profStatus__item--complete"> completed</span>
                                {{--<span class="profStatus__item profStatus__item--progress"> pending</span>--}}
                                {{--<span class="profStatus__item profStatus__item--canceled">canceled  </span>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" align="center">
                        -
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>