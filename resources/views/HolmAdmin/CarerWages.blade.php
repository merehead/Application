<div class="mainPanel" id="to_print">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-address-card" aria-hidden="true"></i>
          </span>
        carers wages
    </h2>
    <div class="carerWages">
        <div class="panelHead">

            <div class="panelHead__group">
                <div class="filterBox">

                    <div class="formField formField--search">
                        <div class="fieldWrap">
                            <input type="search" class="formItem formItem--input formItem--search"
                                   placeholder="Search..." id="search">
                        </div>

                    </div>

                </div>
                <a href="#" id="print" class="print">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </a>
            </div>

        </div>


        <div class="tableWrap tableWrap--margin-t">
            <table class="adminTable" id="Carer-wages">
                <thead>
                <tr>
                    <td class="orderNumber">
                    <span class="td-title td-title--number">
                     №
                    </span>
                    </td>


                    <td class=" ordninary-td ordninary-td--big ">
                    <span class="td-title td-title--orange">
                    carer
                    </span>

                    </td>
                    <td class=" ordninary-td   no-padding-l">
                    <span class="td-title td-title--hour-rate">
                      Hour rate, £
                    </span>
                    </td>
                    <td class=" ordninary-td   ordninary-td--wider no-padding-l">
                    <span class="td-title td-title--light-blue">
                      actions
                    </span>
                    </td>


                </tr>

                <tr class="extra-tr">
                    <td>

                    </td>


                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody>
                            <tr>
                                <td class="idField">
                                    <span class="extraTitle">id</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">name</span>
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
                @foreach($carers as $carer)

                <tr>
                    <td>
                        <span>{{$loop->index+1}}</span>

                    </td>


                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody>
                            <tr>
                                <td class="idField">
                                    <span>{{$carer->id}}</span>
                                </td>
                                <td class="">
                                    <a target="_blank" href="{{route('carerPublicProfile',['user_id'=>$carer->id])}}"
                                       class="tableLink">{{$carer->full_name}}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>


                    <td>
                        <div class="formField formField--hour-rate">
                            <div class="fieldWrap">
                                <form method="post" id="wages{{$carer->id}}" action="{{route('CarerWagesPost')}}">
                                    {{ csrf_field() }}
                                <input type="text" value="{{$carer->wage}}" class="formItem
                                formItem--input" placeholder="13"  name="hour_rate">
                                <input type="hidden" name="carer_id" value="{{$carer->id}}">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="actionsGroup actionsGroup--row">
                            <a href="#" id="#wages{{$carer->id}}" class="actionsBtn actionSave actionsBtn--accept
                                    actionsBtn--small">
                                save
                            </a>
                            <a href="#" class="actionsBtn actionsBtn--block actionsBtn--small" style="display: none">
                                edit
                            </a>
                        </div>
                    </td>

                </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.actionSave').on('click',function (e) {
            var form = $(this).attr('id');
            var token = $(form).find('input[name="_token"]').val();
            e.preventDefault();
            $.ajax({
                url: $(form).attr('action'),
                headers: {'X-CSRF-TOKEN': token},
                data: $(form).serialize(),
                type: 'POST',
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    var notify = $.notify('<strong>HOUR RATE FOR CARER: </strong> SAVE DONE.', { allow_dismiss: true,
                            type:
                            "success" },
                        {placement: {
                        from: "top",
                        align: "right"
                    }});
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });

        });
        $("#search").keyup(function(){
            _this = this;

            $.each($("#Carer-wages tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }});
        });

        $('#print').click(function(e) {
            e.preventDefault();
//            var printing_css = '<style media=print>@import url("/css/main2.min.css")</style>';
//            var html_to_print = printing_css + $('#to_print').html();
//            var iframe = $('<iframe id="print_frame">');
//            $('body').append(iframe);
//            var doc = $('#print_frame')[0].contentDocument || $('#print_frame')[0].contentWindow.document;
//            var win = $('#print_frame')[0].contentWindow || $('#print_frame')[0];
//            doc.getElementsByTagName('body')[0].innerHTML = html_to_print;
//            win.print();
//            $('iframe').remove();
            window.print();
        });
    });
</script>