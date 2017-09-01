<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        @include(config('settings.theme').'.carerPayouts.mainTableHead')

        <tbody>

        @foreach($appointments as $appointment)
            @include(config('settings.theme').'.carerPayouts.mainTableRow')
        @endforeach

        </tbody>
    </table>
</div>