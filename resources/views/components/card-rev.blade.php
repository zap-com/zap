@props(['ad'])

<a href="{{ route('announcement.show', $ad) }}">
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
                <img src="https://placehold.it/200x150/999/CCC" alt="{{ $ad->title }}" style="width: 100%;">
            </div>
        </div>
        <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
            <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">
                {{ $ad->title }}
            </h5>
            <div>
                {{ __('in') }}
                <button type="button"
                    onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                    class="nobtn font-weight-bold">{{ $ad->category->name }}</button>
                {{ __('on') }}
                {{ $ad->created_at }}
                {{ __('by') }}
                <button type="button"
                    onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                    class="nobtn font-weight-bold">{{ $ad->user->name }}</button>
            </div>
            <!--
                <div class="d-flex d-row align-items-center py-0 location-row">
                <i class="icon-location-pin pr-1"></i>
                {{-- <p class="my-0 location-text">{{ $location }}</p> --}}
            </div> -->
            <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">
                {{ substr($ad->description, 0, 200) }}...
            </p>
            <div class="info d-flex flex-row justify-content-between">
                <p class="product-price text-right mb-auto p-2">{{ $ad->price }} €</p>
            </div>
        </div>
    </div>
</a>
