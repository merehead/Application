<div class="paginationContainer">
    <div class="pagination">
        <a href="#" class="paginationArrow paginationArrow--left">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        @for($page=1;$page<=$pages;$page++)
        <a href="/admin/user/page/" class="pagination__item @if($curr_page==$page) active @endif "><span>{{$page}}</span></a>
        @endfor
        <a href="#" class="paginationArrow paginationArrow--right">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
    </div>
</div>