<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        @include(config('settings.theme').'.carerPayouts.mainTableHead')

        <tbody>

        @foreach($users as $user)
            @include(config('settings.theme').'.carerPayouts.mainTableRow')
        @endforeach

        </tbody>
    </table>
</div>