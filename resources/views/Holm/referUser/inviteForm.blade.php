            <form class="referal-form" method="POST" action="{{route('inviteReferUsersPost')}}">
                    {{ csrf_field() }}
                <div class="referal-row">
                    <div class="referal-field">
                        <h2 class="formLabel">
                            email addresses
                        </h2>
                        <div class="inputWrap">
                            <input type="email" name="email[1]" class="formInput" placeholder="Email addresses" required />
                        </div>
                    </div>
                    <a href="#" class="referal-field-btn referal-field-btn--add">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>





                <div class="referal-btn">
                    <button class=" centeredLink referal-btn__item" type="submit">
                        send
                    </button>
                </div>
            </form>
