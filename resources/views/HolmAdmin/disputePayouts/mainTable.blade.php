<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        @include(config('settings.theme').'.disputePayouts.mainTableHead')

        <tbody>

        @foreach($appointments as $appointment)
            @include(config('settings.theme').'.disputePayouts.mainTableRow')
        @endforeach

        </tbody>
    </table>
</div>