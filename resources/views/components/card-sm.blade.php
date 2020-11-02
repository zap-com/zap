@props(['ad'])
<a class="d-flex card product-card swiper-slide mb-0 h-100" href="{{ route('announcement.show', $ad) }}">
    <img src="https://placehold.it/200x150/999/CCC" class="card-img-top px-1 pt-1 pb-0" alt="{{ $ad->title }}">
    <div class="card-body pt-1 px-2">
        <h5 class="p font-weight-bold card-title slide-title pt-1 pb-0 mb-0">{{ $ad->title }}</h5>
        <button type="button"
            onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
            class="btn">{{ $ad->category->name }}</button>
        <!--<div class="d-flex d-row align-items-center py-0 location-row mb-2">
            <i class="icon-location-pin pr-1"></i>
            <p class="my-0 location-text">[City]</p>
        </div>-->
        <p class="card-text text-muted pt-0 slide-description">{{ substr($ad->description, 0, 200) }}...
        </p>
    </div>
    <p class="product-price align-self-end text-right mb-0 p-2">{{ $ad->price }} €</p>
</a>
