<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-money" aria-hidden="true"></i>
          </span>
        payouts to carers
    </h2>
    <div class="panelHead">
{{--        <div class="filterBox">


            <div class="formField formField--fix-biger">
                <div class="fieldWrap">
                    <input type="search" class="formItem formItem--input formItem--search" placeholder="Search...">
                    <button class="searchBtn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </div>--}}


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
{{--            <a href="#" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>--}}
        </div>

        <div class="panelHead__group">
            <a href="javascript: window.print();" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>


    </div>

    @include(config('settings.theme').'.carerPayouts.mainTable')


</div>
