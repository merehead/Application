
<?php
$extraGet = '';
if(isset($_GET['userName'])) $extraGet.='&userName='.$_GET['userName'];
if(isset($profileTypeFilter)) $extraGet.='&profileType='.$profileTypeFilter;
if(isset($statusTypeFilter)) $extraGet.='&statusType='.$statusTypeFilter;
?>

@if($pages>1)
<div class="paginationContainer">
    <div class="pagination">
        <a href="{{$link.'/?page='.$previousPage.$extraGet}}" class="paginationArrow paginationArrow--left" @if(($previousPage < 1))style="pointer-events: none;" @endif >
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        @for($page=1; $page<=$pages; $page++)
            <a href="{{$link}}/?page={{$page.$extraGet}}" class="pagination__item @if($curr_page==$page) act @endif "><span>{{$page}}</span></a>
        @endfor

        <a href="{{$link.'/?page='.$nextPage.$extraGet}}" class="paginationArrow paginationArrow--right" @if(($nextPage > $pages))style="pointer-events: none;" @endif >
            <span><i class="fa fa-angle-right"></i></span>
        </a>
    </div>
</div>
@endif