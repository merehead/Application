<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        @include(config('settings.theme').'.purchaserPayouts.mainTableHead')

        <tbody>

        @foreach($appointments as $appointment)
            @include(config('settings.theme').'.purchaserPayouts.mainTableRow')
        @endforeach

        </tbody>
    </table>
</div>