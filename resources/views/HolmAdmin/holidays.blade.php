<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-birthday-cake" aria-hidden="true"></i>
          </span>
        Holidays
    </h2>


    <div class="holiday-box">
        <div class="tableWrap tableWrap--margin-t">
            <form method="post" id="holidays-form" action="{{route('holidaysPost')}}">
                <table class="adminTable">
                    <thead>
                    <tr>
                        <td class=" ordninary-td ordninary-td ">
                    <span class="td-title td-title--name-holiday ">
                      Name holiday
                    </span>
                        </td>
                        <td class=" ordninary-td ordninary-td ">
                    <span class="td-title td-title--time">
                      date
                    </span>

                        </td>
                    </tr>

                    <tr class="extra-tr">
                        <td>

                        </td>
                        <td>
                        </td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($holiday as $item)
                        <tr>
                            <td>
                                <p>{{$item->name}}</p>
                            </td>
                            <td>
                                <div class="formField formField--fixed">
                                    <div class="fieldWrap">
                                        <input type="text"
                                               class="formItem formItem--input formItem--date-ico date-input "
                                               placeholder="06/06/2017" value="{{date('Y-m-d',strtotime
                                        ($item->date))}}" name="holiday[date][]">
                                        <span class="field-ico"><i class="fa fa-calendar"></i></span>
                                        <input type="hidden" name="holiday[id][]" value="{{$item->id}}">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="settingBtn settingBtn--centered">
                    <a href="#" onclick="event.preventDefault();document.getElementById('holidays-form').submit();"
                       class="actionsBtn actionsBtn--accept actionsBtn--big actionsBtn--no-centered">
                        save
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $(function () {
            $(".date-input").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                showAnim: "slideDown",
                yearRange: "0:+10"
            });
        });
    })
</script>