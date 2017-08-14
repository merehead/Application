<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
        Profiles managment
    </h2>
    {!! Form::open(['method'=>'POST','route'=>'user.store']) !!}
    <div class="panelHead">
        <div class="filterGroup">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    Type of profile:
                </h2>

                <div class="formField formField--fixed">
                    {!! Form::select('profileType',[''=>'Any']+$profileType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    status
                </h2>
                <div class="formField formField--fixed">
                    {!! Form::select('statusType',[''=>'Any']+$statusType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
        </div>
        <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">
            filter
        </a>

        <div class="panelHead__group">
        <a href="#" class="print">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a>
        </div>
    </div>
    {!! Form::close()!!}

    @include(config('settings.theme').'.profilesManagement.summaryTable')

    @include(config('settings.theme').'.profilesManagement.mainTable')

</div>

<div id="popupWrap1" class="popupWrap" style="display:none;position: fixed;top: 0; right: 30%;">
    <div class="adminPopup ">
        <div class="adminPopup__head popupHead">
            <a href="#" class="closeModal"
               onclick="event.preventDefault();document.getElementById('popupWrap1').style.display = 'none';">
                <i class="fa fa-times"></i>
            </a>
            <p>Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per?</p>
        </div>
        <div class="adminPopup__body">
            <h2 class="themeTitle  themeTitle--small">
                answer
            </h2>
            <div class="popupAnswer">
                <p>
                    Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran ende salutandi no per. Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per.
                </p>
            </div>
        </div>
    </div>
</div>