@props(['ad'])

<a id="{{ $ad->id }}" href="{{ route('announcement.show', $ad) }}">
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
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-column">
                    <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">
                        {{ $ad->title }}
                    </h5>
                    <div>
                        {{ __('global.in') }}
                        <button type="button"
                            onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                            class="nobtn font-weight-bold">{{ $ad->category->name }}</button>,
                        @if ($ad->created_at >= $ad->updated_at)
                            {{ __('revisor.created') }}
                            {{ $ad->created_at }}
                        @else
                            {{ __('revisor.modified') }}
                            {{ $ad->updated_at }}
                        @endif
                        {{ __('global.by') }}
                        <button type="button"
                            onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                            class="nobtn font-weight-bold">{{ $ad->user->name }}</button>
                    </div>
                </div>
                <p class="product-price text-right mb-auto pt-0 pr-2 pl-2">{{ $ad->price }} €</p>
            </div>
            <!--
                <div class="d-flex d-row align-items-center py-0 location-row">
                <i class="icon-location-pin pr-1"></i>
                {{-- <p class="my-0 location-text">{{ $location }}</p> --}}
            </div> -->
            <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1 mb-0">
                <span class="text-desc">{{ $ad->description }}</span>
                <button onClick="event.preventDefault(); event.stopPropagation();" class="nobtn myBtn">Read
                    more</button>
            </p>

            <div class="info d-flex flex-row justify-content-between">
                <button onClick="event.preventDefault()" type="button" class="nobtn text-danger align-self-end"
                    data-toggle="modal" data-target="#warn-modal-{{ $ad->id }}" title="Click to learn more...">
                    <span class="d-flex align-items-middle"><i class="icon-exclamation large-icons pr-2"></i> 2
                        {{ __('revisor.problem') }}
                    </span>
                </button>

                <div class="d-flex flex-row">
                    <form action="{{ route('revisor.reject', $ad) }}" method="POST">
                        @csrf
                        <button class='btn alt-btn mr-1' type='submit'>{{ __('revisor.decline') }}</button>
                    </form>
                    <form action="{{ route('revisor.accept', $ad) }}" method="POST">
                        @csrf
                        <button class='btn alt-btn' type='submit'>{{ __('revisor.accept') }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</a>

<div class="modal" id="warn-modal-{{ $ad->id }}" tabindex="-1" role="dialog" aria-labelledby="warn-modal-{{ $ad->id }}"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content warn-modal">
            <div class="justify-content-end pt-3 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
