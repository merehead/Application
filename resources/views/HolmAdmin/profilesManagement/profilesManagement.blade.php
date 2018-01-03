<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
        Profiles managment
    </h2>
   {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}
    {!! Form::open(['method'=>'GET','action'=>'Admin\User\UserController@index','id'=>'user_filter']) !!}
    <div class="panelHead">
        <div class="filterGroup">
            <div class="filterBox">
                <div class="formField formField--fix-biger">
                    <div class="fieldWrap">
                        <input class="formItem formItem--input formItem--search" type="text" name="userName" placeholder="Search name" value="@if(isset($_GET["userName"])){{$_GET["userName"]}}@endif">
                        {{--{!! Form::text('userName',null,['class'=>'formItem formItem--input formItem--search','maxlength'=>'60','placeholder'=>'Search name']) !!}--}}
                    </div>
                </div>
            </div>
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
        <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger"
           onclick="event.preventDefault();document.getElementById('user_filter').submit();">
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