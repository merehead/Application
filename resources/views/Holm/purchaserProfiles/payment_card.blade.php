<div class="card-list-box">
    <p class="card-list__item">
        xxxx xxxx xxxx {{ substr(str_replace(' ','',$card->number), 12)}}
    </p>
    <div class="payment-control payment-control--for-card ">
        <a href="#" class="payment-control__item payment-control__item--delete">
            <i class="fa fa-trash"></i>
            <span>delete</span>
        </a>
    </div>
</div>