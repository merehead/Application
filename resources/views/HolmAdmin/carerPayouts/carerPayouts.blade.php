<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-money" aria-hidden="true"></i>
          </span>
        payouts to carers
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
                    <td class="orderNumber">
                      <span class="td-title td-title--number">
                       №
                      </span>
                    </td>
                    <td class=" ordninary-td ordninary-td--wider no-padding-l">
                      <span class="td-title td-title--orange">
                      carer
                      </span>
                    </td>
                    <td class="bigger-td bigger-td--middle">
                      <span class="td-title td-title--booking ">
                        booking
                      </span>
                    </td>
                </tr>
                <tr class="extra-tr">
                    <td></td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="idField">
                                    <span class="extraTitle">id</span>
                                </td>
                                <td class="nameField">
                                    <span class="extraTitle">name</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="">
                                    <span class="extraTitle">total</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">actions</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">payout status</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </thead>
            <tbody>
            @if($transfers->count() > 0)
                @foreach($transfers as $transfer)
                <tr>
                    <td>
                        {{$transfer->id}}
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="idField">
                                    <span>{{$transfer->booking->bookingCarer->id}}</span>
                                </td>
                                <td class="nameField">
                                    <a href="#" class="tableLink">{{$transfer->booking->bookingCarerProfile->full_name}}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="">
                                    <span>{{$transfer->amount/100}}</span>
                                </td>
                                <td class="nameField">
                                    <div class="actionsGroup">
                                        {{--<a href="#" class="actionsBtn actionsBtn--accept">--}}
                                            {{--payout bookings--}}
                                        {{--</a>--}}
                                        -
                                    </div>
                                </td>
                                <td>
                                    <div class="profStatus profStatus--left">
                                        <span class="profStatus__item profStatus__item--new">paid</span>
                                        {{--<span class="profStatus__item profStatus__item--progress">pending</span>--}}

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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