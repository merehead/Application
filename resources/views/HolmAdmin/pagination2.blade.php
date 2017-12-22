<?php
$search = '';
if(isset($profileTypeFilter)&&!empty($profileTypeFilter)) $search.='&profileType='.$profileTypeFilter;
if(isset($statusTypeFilter)&&!empty($statusTypeFilter)) $search.='&statusType='.$statusTypeFilter;
//if(isset($queryString)&& !empty($queryString)) $search = '&'.$queryString;
$search = '';
?>

@if($pages>1)
<div class="paginationContainer">
    <div class="pagination">
        <a href="{{($previousPage>=1)?$link.'?page='.$previousPage.$search:'#'}}" class="paginationArrow paginationArrow--left">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        @for($page=1; $page<=$pages; $page++)
            <a href="{{$link}}?page={{$page.$search}}" class="pagination__item @if($curr_page==$page) act @endif "><span>{{$page}}</span></a>
        @endfor
        <a href="{{($nextPage<=$pages)?$link.'?page='.$nextPage.$search:'#'}}" class="paginationArrow paginationArrow--right">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
    </div>
</div>
@endif