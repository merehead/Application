<div class="justifyContainer justifyContainer--smColumn">
    <div class="breadcrumbs">
        <a href="index.html" class="breadcrumbs__item">
            Home
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="SearchPage.html" class="breadcrumbs__item">
            Carers
        </a>
        <span class="breadcrumbs__arrow">&gt;</span>
        <a href="Carer_Public_profile_page.html" class="breadcrumbs__item">

            {{$carerProfile->first_name.'&nbsp'.mb_substr($carerProfile->family_name,0,1).'.'}}

        </a>
    </div>
<!--    <div class="backBtn">-->
<!--        <a href="SearchPage.html" class="backBtn__item ">-->
<!--            <i class="fa fa-arrow-left"></i>-->
<!--            BACK TO SEARCH RESULTS-->
<!--        </a>-->
<!--    </div>-->
</div>