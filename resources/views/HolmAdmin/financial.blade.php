<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-gbp" aria-hidden="true"></i>
          </span>
        Financials
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
    <div class="financialsContainer">
        <div class="financialsCard">
            <div class="financialsCard__header">
                <div class="financialsCard__title">
                    <h2>
                        HOLM BALANCE
                    </h2>
                    <h2>
                        AMOUNT, £
                    </h2>
                </div>
            </div>
            <div class="financialsRow">
                <div class="financialsColumn">
                    <div class="">
                        <img src="{{asset('img/admin/stripe.png')}}" alt="">
                    </div>
                </div>
                <div class="financialsColumn">
                    <span>{{$balance}}</span>
                </div>
            </div>
            <div class="financialsRow financialsRow--total">
                <div class="financialsColumn">
                    <span class="total">total</span>
                </div>
                <div class="financialsColumn">
                    <span>{{$balance}}</span>
                </div>
            </div>
        </div>
        <div class="financialsCard">
            <div class="financialsCard__header">
                <div class="financialsCard__title">
                    <h2>
                        COMMISION PAYMENTS
                        <span>(how much were spent on PS fees)</span>

                    </h2>
                    <h2>
                        AMOUNT, £
                    </h2>
                </div>
            </div>
            <div class="financialsRow">
                <div class="financialsColumn">
                    <div class="">
                        <img src="{{asset('img/admin/stripe.png')}}" alt="">
                    </div>
                </div>
                <div class="financialsColumn">
                    <span>{{$fee}}</span>
                </div>
            </div>
            <div class="financialsRow financialsRow--total">
                <div class="financialsColumn">
                    <span class="total">total</span>
                </div>
                <div class="financialsColumn">
                    <span>{{$fee}}</span>
                </div>
            </div>
        </div>
        <div class="financialsCard">
            <div class="financialsCard__header">
                <div class="financialsCard__title">
                    <h2>
                        HOLM INCOME

                    </h2>
                    <h2>
                        AMOUNT, £
                    </h2>
                </div>
            </div>
            <div class="financialsRow">
                <div class="financialsColumn">
                    <div class="">
                        <img src="{{asset('img/admin/stripe.png')}}" alt="">
                    </div>
                </div>
                <div class="financialsColumn">
                    <span>{{$income}}</span>
                </div>
            </div>
            <div class="financialsRow financialsRow--total">
                <div class="financialsColumn">
                    <span class="total">total</span>
                </div>
                <div class="financialsColumn">
                    <span>{{$income}}</span>
                </div>
            </div>
        </div>
    </div>
</div>