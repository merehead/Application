<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-cog" aria-hidden="true"></i>
          </span>
        admin settings
    </h2>
    <div class="settingBox">
        <div class="settingContainer">
            <div class="settingCard">
                <div class="settingCard__head">
                    <h2>General</h2>
                </div>
                <div class="settingProfile">
                    <a href="#" class="settingProfile__img">
                        <img src="./dist/img/nik.png" alt="">
                        <span class="addIco">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>

                  </span>
                    </a>
                    <div class="settingProfile__info">
                        <div class="formField">
                            <h2 class="fieldLabel">First name</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--without-ico" placeholder="Nik">
                            </div>
                        </div>
                        <div class="formField">
                            <h2 class="fieldLabel">Last name</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--without-ico" placeholder="Seth">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="passWrap">
                    <div class="passBox">
                        <div class="fieldRow">
                            <div class="formField formField--half">
                                <h2 class="fieldLabel">Change password</h2>
                                <div class="fieldWrap">
                                    <input type="text" class="formItem formItem--without-ico" placeholder="*******">
                                </div>
                            </div>
                            <div class="formField formField--half">
                                <h2 class="fieldLabel">Repeat password</h2>
                                <div class="fieldWrap">
                                    <input type="text" class="formItem formItem--without-ico" placeholder="*********">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="settingCard">
                <div class="settingCard__head settingCard__head--payment">
                    <h2>General</h2>
                </div>
                <div class="settingPayment">
                    <div class="fieldRow">
                        <div class="formField formField--full ">
                            <h2 class="fieldLabel">card owners name</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--without-ico" placeholder=" Nil Seth">
                            </div>
                        </div>
                    </div>
                    <div class="fieldRow">
                        <div class="formField  formField--full">
                            <h2 class="fieldLabel">card number</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--pay-ico" placeholder=" Nil Seth">
                                <span class="payIco">
                        <img src="./dist/img/visa.png" alt="">
                      </span>
                            </div>
                        </div>
                    </div>
                    <div class="fieldRow">
                        <div class="formField formField--half ">
                            <h2 class="fieldLabel">valid until</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--without-ico" placeholder=" 05/07/2018">
                            </div>
                        </div>
                        <div class="formField formField--half ">
                            <h2 class="fieldLabel">cvc code</h2>
                            <div class="fieldWrap">
                                <input type="text" class="formItem formItem--without-ico" placeholder=" 345">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="settingBtn">
            <a href="#" class="actionsBtn actionsBtn--accept actionsBtn--big actionsBtn--no-centered">
                save
            </a>
        </div>

    </div>
    <div class="invite">
        <h2 class="invite__title">
            invite admins
        </h2>
        <form class="inviteForm">
            <div class="inviteForm__field">
                <input type="text" class="inviteForm__input" placeholder="Email">
            </div>
            <button class="inviteForm__btn">
                invite
            </button>
        </form>
    </div>

    <div class="settingsTable">
        <div class="tableWrap tableWrap--margin-t">
            <table class="adminTable adminTable--auto-width">
                <thead>
                <tr>

                    <td class=" ordninary-td  ordninary-td--big ">
                    <span class="td-title td-title--fees-name">
                      name
                    </span>

                    </td>
                    <td class="  ordninary-td ordninary-td--big   ">
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

                <tr class="extra-tr">
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody>
                            <tr>
                                <td class="idField ">
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
                    <td>

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
                                <td class="">
                                    <a href="#" class="tableLink">
                                        {{$user->first_name.' '.$user->family_name}}
                                    </a>
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