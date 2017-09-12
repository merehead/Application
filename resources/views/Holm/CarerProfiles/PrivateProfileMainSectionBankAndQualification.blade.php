<div id="carerBank" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">BANK ACCOUNT </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivateBank"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>

    </div>
</div>

{!! Form::model($user, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateBank']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','bank') !!}
<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                SORT CODE
              </span>

            </h2>
            {!! Form::text('sort_code',$carerProfile->sort_code,['class'=>'profileField__input','placeholder'=>'Sort code',
            'maxlength'=>16]) !!}
        </div>
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                ACCOUNT NUMBER
              </span>

            </h2>
            {!! Form::text('account_number',$carerProfile->account_number,['class'=>'profileField__input',
            'placeholder'=>'Account number','maxlength'=>32]) !!}
        </div>
    </div>
</div>
{!! Form::close()!!}

<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">QUALIFICATIONS </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivateAvailability"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>

    </div>
</div>

<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               NVQs
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input" placeholder="Name" >
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Care Certificates
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Health and Social
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Training certificates
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Additional training courses
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name"
                >
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Other relevant qualifications
              </span>
            </h2>
            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>
        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input"  placeholder="Name">
            </div>
        </div>

        <div class="profileField ">

            <div class="addContainer ">
                <a href="#" class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="addInfo">
                <input type="text" class="addInfo__input" placeholder="Name">
            </div>
        </div>
    </div>


</div>