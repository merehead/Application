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
                        <td class=" ordninary-td  ">
                    <span class="td-title td-title--actions">
                      Actions
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
                                <input required type="text" class="formItem formItem--input formItem--date-ico"
                                       placeholder="Name" value="{{$item->name}}" name="holiday[name][]">
                            </td>
                            <td>
                                <div class="formField formField--fixed">
                                    <div class="fieldWrap">
                                        <input required type="text"
                                               class="formItem formItem--input formItem--date-ico date-input"
                                               placeholder="06/06/2017" value="{{date('Y-m-d',strtotime
                                        ($item->date))}}" name="holiday[date][]">
                                        <span class="field-ico"><i class="fa fa-calendar"></i></span>
                                        <input type="hidden" name="holiday[id][]" value="{{$item->id}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-box">
                                    @if($loop->last)
                                    <button class="action-box__btn addBtn">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    @endif
                                    <button data-id="{{$item->id}}" class="action-box__btn action-box__btn--remove btn--remove">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="settingBtn settingBtn--centered">
                    <button type="submit" href="#"
                       class="actionsBtn actionsBtn--accept actionsBtn--big actionsBtn--no-centered">
                        save
                    </button>
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
        $(document).on('click',".btn--remove",function(e){
            var id=$(this).attr('data-id');
            if($(this).parent().find('.addBtn').length>0){
               var addBtn = $(this).parent().find('.addBtn').clone();
               $(this).parent().parent().parent().remove();
                $('.adminTable tbody tr:last').find('.btn--remove').before(addBtn);
            }else
            $(this).parent().parent().parent().remove();

            if(parseInt(id)>0)
                $.ajax({
                    url: '/admin/holidays/delete/'+id,
                    data: {id:id},
                    type: 'POST',
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 'true'){
                            var notify = $.notify('<strong>Deleting</strong> success...', {
                                type: 'success',
                                allow_dismiss: true
                            });
                        }else{
                            var notify = $.notify(data.message, {
                                type: 'success',
                                allow_dismiss: true
                            });
                        }
                    }
                });
        });

        $(document).on('click',".addBtn",function(e){
            e.preventDefault();
            var row = $('.adminTable tbody tr:last').clone();
            $('.adminTable tbody tr:last').find('.addBtn').remove();
            $('.adminTable tbody tr:last').after(row);
            $('.adminTable tbody tr:last').find('input').val('');
            $('.adminTable tbody tr:last').find('input').removeClass("hasDatepicker").removeAttr('id');
            $(".date-input").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                showAnim: "slideDown",
                yearRange: "0:+10"
            });
        });
    });
</script>