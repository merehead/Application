<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-cog" aria-hidden="true"></i>
          </span>
        admin settings
    </h2>
    <div class="settingBox">
        <form action="{{route('settingsAdminPost')}}" method="post" id="general">
            <?php echo e(csrf_field()); ?>
            <input type="hidden" name="type" value="password">
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="settingContainer">
                <div class="settingCard">
                    <div class="settingCard__head">
                        <h2>Change password</h2>
                    </div>
                    <div class="passWrap">
                        <div class="passBox" style="margin-top: 20px;">
                            <div class="fieldRow">
                                <div class="formField formField--half">
                                    <h2 class="fieldLabel">Change password</h2>
                                    <div class="fieldWrap">
                                        <input type="password" name="password" class="formItem formItem--without-ico"
                                               placeholder="*******">
                                    </div>
                                </div>
                                <div class="formField formField--half">
                                    <h2 class="fieldLabel">Repeat password</h2>
                                    <div class="fieldWrap">
                                        <input type="password" name="newPassword" class="formItem formItem--without-ico"
                                               placeholder="*********">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div style="padding-top: 50px;">
                <a href="#" class="actionsBtn actionsBtn--accept actionsBtn--big  actionsBtn--no-centered"
                   onclick="event.preventDefault();saveGeneral();">
                    save
                </a>
            </div>
        </form>
    </div>
    <div class="invite">
        <h2 class="invite__title">
            invite admins
        </h2>
        <form class="inviteForm" id="invite-form" method="post" action="{{route('settingsAdminPost')}}">
            <input type="hidden" name="type" value="invite">
            <?php echo e(csrf_field()); ?>
            <div class="inviteForm__field">
                <input type="email" id="invite" name="email" class="inviteForm__input" placeholder="Email">
            </div>
            <button class="inviteForm__btn" onclick="event.preventDefault();sendInvite();">
                invite
            </button>
        </form>
    </div>

    <div class="settingsTable">
        <div class="tableWrap tableWrap--margin-t">
            <table class="adminTable adminTable--auto-width">
                <thead>
                <tr>

                    <td class=" ordninary-td  ordninary-td--small ">
                    <span class="td-title td-title--fees-name">
                      id
                    </span>

                    </td>
                    <td class="  ordninary-td ordninary-td--big" width="800px">
                    <span class="td-title td-title--email">
                      email
                    </span>

                    </td>
                    <td class=" ordninary-td  ordninary-td--big ">
                    <span class="td-title td-title--actions">
                    actions

                    </span>

                    </td>
                </tr>




                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody>
                                <tr>
                                    <td class=" ">
                                        <span>{{$user->id}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                    <span>
                      {{$user->email}}
                    </span>
                        </td>
                        <td>
                            <div class="actionsGroup">
                                <a href="#" class="actionsBtn actionsBtn--delete  ">
                                    delete
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
    function sendInvite() {
        var form = $('form#invite-form');
        var token = $(form).find('input[name="_token"]').val();
        console.log(form.serialize());
        $.ajax({
            url: $(form).attr('action'),
            headers: {'X-CSRF-TOKEN': token},
            data: $(form).serialize(),
            type: 'POST',
            dataType: "json",
            success: function (response) {
                if(response.result=='true') {
                    var notify = $.notify('<strong>Saving</strong> success...', {
                        type: 'success',
                        allow_dismiss: true
                    });
                    $('#invite').val('');
                }else{
                    var notify = $.notify('<strong>'+response.msg+'</strong>', {
                        type: 'danger',
                        allow_dismiss: false
                    });
                }
            },
            error: function (response) {
                console.log(response)
                var notify = $.notify('<strong>'+response.msg+'</strong>', {
                    type: 'danger',
                    allow_dismiss: false
                });
            }
        });
    }

    function saveGeneral() {
        var form = $('form#general');
        var token = $(form).find('input[name="_token"]').val();
        console.log(form.serialize());
        $.ajax({
            url: $(form).attr('action'),
            headers: {'X-CSRF-TOKEN': token},
            data: $(form).serialize(),
            type: 'POST',
            dataType: "json",
            success: function (response) {
                var notify = $.notify('<strong>Saving</strong> success...', {
                    type: 'success',
                    allow_dismiss: true
                });
                $(form).reset();
            },
            error: function (response) {
                console.log(response)
            }
        });
    }
</script>