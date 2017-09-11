<div class="logoWrap">
    <a href="/admin" class="themeLogo"></a>
</div>
<div class="adminProfile">
    <div class="adminProfile__photo">
        <img src={{asset("/img/admin/nik.png")}} alt="Nik_Seth" >
    </div>
    <h2 class="adminProfile__name">Nik Seth</h2>
    <p class="adminProfile__role">admin</p>
    <a href="{{ route('logout') }}" class="adminProfile__logout"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>