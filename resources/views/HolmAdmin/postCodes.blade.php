<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-list" aria-hidden="true"></i>
          </span>
        postcodes
    </h2>
    <div class="panelHead">
        <div class="filterGroup">
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
        </div>
        <a href="#" class="print">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a>
    </div>
    <div class="postcodes">
        <div class="tableWrap tableWrap--margin-t">
            <table class="adminTable">
                <thead>
                <tr>
                    <td class=" ordninary-td ordninary-td--big ">
                    <span class="td-title td-title--codes">
                    postcodes
                    </span>

                    </td>
                    <td class=" ordninary-td    ordninary-td--big ">
                    <span class="td-title td-title--amount">
                      amount
                    </span>
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($PostCodes as $code)
                <tr>
                    <td class="">
                        <span>{{$code->code}}</span>
                    </td>
                    <td>
                        <span>{{$code->amount}}</span>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>