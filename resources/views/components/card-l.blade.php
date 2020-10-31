<div class="d-flex flex-column flex-md-row card listings-card w-100 my-3 p-1">
    <!--<div
        class="small-gallery swiper-container card-img-top swiper-container-fade swiper-container-initialized swiper-container-horizontal">
        <div class="swiper-wrapper s0" id="swiper-wrapper-dcc92a682754ce49" aria-live="polite">
            <img src="https://placehold.it/200x150/999/CCC" alt="hero Product" class="swiper-slide swiper-slide-active"
                role="group" aria-label="1 / 1"
                style="width: 310px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
        </div>
        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide"
            aria-controls="swiper-wrapper-dcc92a682754ce49" aria-disabled="true"></div>
        <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide"
            aria-controls="swiper-wrapper-dcc92a682754ce49" aria-disabled="true"></div>
    </div>-->
    <div class="small-gallery swiper-container card-img-top">
        <div class="swiper-wrapper s0">
            <img src="https://placehold.it/200x150/999/CCC" alt="{{ $title }}" style="width: 100%;">
        </div>
    </div>
    <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
        <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">{{ $title }}</h5>
        <!--
            <div class="d-flex d-row align-items-center py-0 location-row">
            <i class="icon-location-pin pr-1"></i>
            <p class="my-0 location-text">{{ $location }}</p>
        </div> -->
        <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">{{ $description }}
        </p>
        <p class="product-price align-self-end text-right mb-auto p-2">{{ $price }}</p>
    </div>
</div>
