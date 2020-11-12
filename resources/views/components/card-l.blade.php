@props(['ad'])

<a href="{{ route('announcement.show', $ad) }}">
    <div class="d-flex flex-column flex-md-row card listings-card w-100 my-3 p-1">
        <div class="small-gallery {{ 'small-gallery-' . $ad->id }} swiper-container card-img-top"
            data-id="{{ $ad->id }}">
            @if (count($ad->images) > 1)
                <div class="swiper-wrapper {{ 's' . $ad->id }}">
                    @foreach ($ad->images as $image)
                        <img src="{{ $image->getUrl(200, 150) }}" class="swiper-slide" alt="{{ $ad->title }}"
                            style="width: 100%;">
                    @endforeach
                </div>
                <div class="swiper-button-prev swiper-button-prev-{{ $ad->id }}"></div>
                <div class="swiper-button-next swiper-button-next-{{ $ad->id }}"></div>
            @elseif (count($ad->images) == 1)
                <div class="swiper-wrapper {{ 's' . $ad->id }}">
                    @foreach ($ad->images as $image)
                        <img src="{{ $image->getUrl(200, 150) }}" class="swiper-slide" alt="{{ $ad->title }}"
                            style="width: 100%;">
                    @endforeach
                </div>
            @else
                <div class="swiper-wrapper {{ 's' . $ad->id }}">
                    <img src="{{ asset('images/placeholder_small.jpg') }}" class="swiper-slide" alt="{{ $ad->title }}"
                        style="width: 100%;">
                </div>
            @endif
        </div>

        <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
            <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">
                {{ $ad->title }}
            </h5>
            <p class="small">{{ $ad->place->name ?? '' }}</p>

            <!--
                <div class="d-flex d-row align-items-center py-0 location-row">
                <i class="icon-location-pin pr-1"></i>
                {{-- <p class="my-0 location-text">{{ $location }}</p> --}}
            </div> -->
            <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">
                {{ substr($ad->description, 0, 200) }}...
            </p>
            <div class="info d-flex flex-row justify-content-between">
                <button type="button"
                    onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                    class="btn nobtn font-weight-bold">
                    @if (session()->get('locale') == 'it')
                        {{ $ad->category->name_it }}
                    @else
                        {{ $ad->category->name }}
                    @endif
                </button>
                <p class="product-price text-right mb-auto p-2">{{ $ad->price }} €</p>
            </div>
        </div>
    </div>
</a>
