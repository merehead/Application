<div class="tableWrap tableWrap--margin-t">
    <table class="adminTable">
        @include(config('settings.theme').'.bookingsDetails.mainTableHead')

        <tbody>
        @foreach($bookings as $booking)
        @include(config('settings.theme').'.bookingsDetails.mainTableBookingRow')
        @endforeach

        </tbody>
    </table>
</div>