<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-stack-overflow" aria-hidden="true"></i>
          </span>
        Fees managment
    </h2>
    <div class="fees">
        <form action="{{route('feespost')}}" method="post" id="fees-form">
        <div class="tableWrap tableWrap--margin-t">
            <table class="adminTable">
                <thead>
                <tr>
                    <td class=" ordninary-td  ">
                    <span class="td-title td-title--fees-name">
                      fee name
                    </span>
                    </td>
                    <td class=" ordninary-td  ">
                    <span class="td-title td-title--light-blue">
                      carer rate
                    </span>
                    </td>
                    <td class=" ordninary-td   ">
                    <span class="td-title td-title--fees-type">
                      type
                    </span>
                    </td>
                    <td class=" ordninary-td ordninary-td--small  ">
                    <span class="td-title td-title--amount">
                    amount
                    </span>
                    </td>
                    <td class=" ordninary-td  ">
                    <span class="td-title td-title--orange">
                      purchaser rate
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
                            <tbody>
                            <tr>
                                <td class=" ">
                                    <span class="extraTitle">FLAT,  £</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">%</span>
                                </td>


                            </tr>

                            </tbody>
                        </table>
                    </td>

                    <td>

                    </td>
                    <td>

                    </td>
                </tr>


                </thead>

                <tbody>
                @foreach($fees as $item)
                    <tr>
                    <td>
                        <span>{{$item->fee_name}}</span>

                    </td>
                    <td>
                        <span>{{$item->carer_rate}}</span>

                    </td>

                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody>
                            <tr>
                                <td class=" ">
                                    <div class="onoffswitch">
                                        <input type="radio" name="onoffswitch{{$item->id}}" class="onoffswitch-checkbox"
                                               id="myonoffswitch{{$item->id}}" dd="" @if($item->type_flat==1) checked @endif>
                                        <label class="onoffswitch-label" for="myonoffswitch{{$item->id}}">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>

                                </td>
                                <td class="">
                                    <div class="onoffswitch">
                                        <input type="radio" name="onoffswitch{{$item->id}}" class="onoffswitch-checkbox"
                                               id="myonoffswitch2{{$item->id}}" d="" @if($item->type_percent==1) checked @endif>
                                        <label class="onoffswitch-label" for="myonoffswitch2{{$item->id}}">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </td>
                    <td>
                        <div class="formField formField--hour-rate">
                            <div class="fieldWrap">
                                <input type="text" id="amount{{$item->id}}" name="fees[amount][]" value="{{$item->amount}}" class="formItem formItem--input">
                                <input type="hidden"  value="{{$item->id}}" name="fees[id][]" class="formItem formItem--input" readonly="">
                            </div>
                        </div>
                    </td>
                    <td>
                    <span class="amount{{$item->id}}">
                      {{$item->purchaser_rate}}
                    </span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="settingBtn settingBtn--centered">
            <a href="#" onclick="event.preventDefault();document.getElementById('fees-form').submit();" class="actionsBtn actionsBtn--accept actionsBtn--big actionsBtn--no-centered">
                save
            </a>
        </div>
        </form>
    </div>
</div>