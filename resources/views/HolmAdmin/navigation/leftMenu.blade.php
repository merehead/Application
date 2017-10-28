<nav class="adminNav">
    <ul class="adminNav__list">
        <li class="adminNav__item">
            <a href="#" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Statistics
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('financial')}}" class="adminNav__link {{\Request::route()->getName() == 'financial' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-gbp" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Financials
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('user.index')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Profiles managment
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('booking.index')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Bookings details
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('BookingTransactions')}}" class="adminNav__link {{\Request::route()->getName() == 'BookingTransactions' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-gbp" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Bookings transactions
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('PayoutsToPurchasers')}}" class="adminNav__link {{\Request::route()->getName() == 'PayoutsToPurchasers' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-money" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Payouts to purchasers
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('PayoutsToCarers')}}" class="adminNav__link {{\Request::route()->getName() == 'PayoutsToCarers' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Payouts to carers
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('DisputePayouts')}}" class="adminNav__link {{\Request::route()->getName() == 'DisputePayouts' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-check-square" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Dispute payouts
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('BonusesCarers')}}" class="adminNav__link {{\Request::route()->getName() == 'BonusesCarers' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-gift" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Bonuses carers
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('BonusesPurchasers')}}" class="adminNav__link {{\Request::route()->getName() == 'BonusesPurchasers' ? 'active' : ''}}">
                <span class="adminNav__ico">
                  <i class="fa fa-gift" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Bonuses purchasers
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('fees')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                  Fees managment
                </span>
            </a>
        </li>
        <li class="adminNav__item">
            <a href="{{route('CarerWages')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Carer's wages
                </span>
            </a>
        </li>

        <li class="adminNav__item">
            <a href="{{route('blog.index')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Blog
                </span>
            </a>
        </li>

        <li class="adminNav__item">
            <a href="{{route('holidays')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Holidays
                </span>
            </a>
        </li>

        <li class="adminNav__item">
            <a href="{{route('settingsAdmin')}}" class="adminNav__link">
                <span class="adminNav__ico">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                </span>
                <span class="adminNav__text">
                   Admin Settings
                </span>
            </a>
        </li>
    </ul>
</nav>
