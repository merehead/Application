<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-gift" aria-hidden="true"></i>
          </span>
        BONUSES PURCHASERS
    </h2>
    <div class="panelHead">
        {!! Form::open(['method'=>'GET','route'=>'BonusesPurchasers']) !!}
        <div class="filterBox">
            <div class="formField formField--search">
                <div class="fieldWrap">
                    {!! Form::text('userName',null,['class'=>'formItem formItem--input formItem--search','maxlength'=>'60','placeholder'=>'Name']) !!}
                </div>

            </div>
            {!! Form::submit('filter',['class'=>'actionsBtn actionsBtn--filter actionsBtn--bigger']) !!}
        </div>
        {!! Form::close()!!}
        <div class="panelHead__group">
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

                <td class=" ordninary-td ordninary-td--small no-padding-l">
                  <span class="td-title td-title--time">
                    date
                  </span>

                </td>
                <td class=" ordninary-td ordninary-td--big ">
                  <span class="td-title td-title--light-green">
                  purchasers
                  </span>
                </td>
                <td class=" ordninary-td ordninary-td--small  ">
                  <span class="td-title td-title--invition">
                    INVITATION CODE
                  </span>

                </td>
                <td class=" ordninary-td  ">
                  <span class="td-title td-title--paid-bonus">
                    paid bonuses
                  </span>
                </td>
                <td class=" ordninary-td  no-padding-l">
                  <span class="td-title td-title--amount">
                    amount
                  </span>
                </td>
                <td class=" ordninary-td   no-padding-l">
                  <span class="td-title td-title--light-blue">
                    actions
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

                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            </thead>

            <tbody>
            @if($bonusPayouts->count())
                @foreach($bonusPayouts as $bonusPayout)
                    <tr>
                        <td align="center">
                            <span>{{$bonusPayout->id}}</span>

                        </td>
                        <td>
                            <p>{{$bonusPayout->created_at->format('d/m/Y')}}</p>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$bonusPayout->user->id}}</span>
                                    </td>
                                    <td class="">
                                        <a href="#" class="tableLink">{{$bonusPayout->user->full_name}}</a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td>
                          <span>
                            {{$bonusPayout->user->referral_code ? $bonusPayout->user->referral_code : 'REGISTER'}}
                          </span>
                        </td>
                        <td>
                          <span>
                             <i class="fa fa-gbp" aria-hidden="true"></i> {{$bonusPayout->user->paid_bonuses}}
                          </span>
                        </td>
                        <td>
                          <span>
                            <i class="fa fa-gbp" aria-hidden="true"></i> {{$bonusPayout->amount}}
                          </span>
                        </td>
                        <td>
                            <div class="actionsGroup">
                                @if(!$bonusPayout->payout)
                                <button data-bonus_id="{{$bonusPayout->id}}" class="payoutBonus actionsBtn actionsBtn--accept actionsBtn--wider">
                                    payout bonus
                                </button>
                                <button data-bonus_id="{{$bonusPayout->id}}" class="cancelBonus actionsBtn actionsBtn--reject actionsBtn--wider">
                                    cancel bonus
                                </button>
                                @else
                                    -
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" align="center">-</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.payoutBonus').click(function () {
        showSpinner();
        var bonus_id = $(this).attr('data-bonus_id');
        $.post('/admin/payout-bonus/'+bonus_id, function (data) {
            if(data.status == 'success'){
                location.reload();
            } else {
                showErrorModal({title: 'Error', description: data.message});
            }

            hideSpinner();
        });
    });

    $('.cancelBonus').click(function () {
        showSpinner();
        var bonus_id = $(this).attr('data-bonus_id');
        $.post('/admin/cancel-bonus/'+bonus_id, function (data) {
            if(data.status == 'success'){
                location.reload();
            } else {
                showErrorModal({title: 'Error', description: data.message});
            }

            hideSpinner();
        });
    });
</script>