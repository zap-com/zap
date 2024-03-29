@props(['ad'])



<a id="{{ $ad->id }}" href="{{ route('announcement.show', $ad) }}">
    <div class="d-flex flex-column flex-md-row card listings-card w-100 my-3 p-1 revcard">
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
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-column">
                    <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">
                        {{ $ad->title }}
                    </h5>
                    <div>
                        {{ __('global.in') }}
                        <button type="button"
                            onClick="location.href='{{ route('category.index', $ad->category) }}'; event.preventDefault(); event.stopPropagation()"
                            class="nobtn font-weight-bold">
                            @if (session()->get('locale') == 'it')
                                {{ $ad->category->name_it }}
                            @else
                                {{ $ad->category->name }}
                            @endif
                        </button>,
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
                <p class="product-price text-right mb-auto pt-0 pr-2 pl-2 d-none d-md-inline">{{ $ad->price }} €</p>
            </div>
            <!--
                <div class="d-flex d-row align-items-center py-0 location-row">
                <i class="icon-location-pin pr-1"></i>
                {{-- <p class="my-0 location-text">{{ $location }}</p> --}}
            </div> -->
            <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1 mb-0">
                <span class="text-desc">{{ $ad->description }}</span>
                @if (strlen($ad->description) > 200)
                    <button onClick="event.preventDefault(); event.stopPropagation();"
                        class="nobtn myBtn">{{ __('revisor.readmore') }}</button>
                @endif
            </p>

            <div
                class="info d-flex flex-row {{ $ad->problems() > 0 ? 'justify-content-between' : 'justify-content-end' }}">

                @if ($ad->problems() > 0)
                    <button onClick="event.preventDefault()" type="button" class="nobtn text-danger" data-toggle="modal"
                        data-target="#warn-modal-{{ $ad->id }}" title="{{ __('revisor.learnmore') }}">
                        <span class="d-flex align-items-middle"><i class="icon-exclamation large-icons pr-2"></i>
                            {{ $ad->problems() }}
                            {{ __('revisor.problem') }}
                        </span>
                    </button>
                @endif




                @if ($ad['status_id'] == 4)
                    <div class="d-flex flex-row">
                        <form action="{{ route('revisor.delete', $ad) }}" method="POST">
                            @csrf
                            <button class='btn b-btn mr-1 text-white' type='submit'>{{ __('revisor.delete') }}</button>
                        </form>
                        <form action="{{ route('revisor.restore', $ad) }}" method="POST">
                            @csrf
                            <button class='btn alt-btn' type='submit'>{{ __('revisor.restore') }}</button>
                        </form>


                    </div>
                @else
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
                @endif
            </div>
        </div>
    </div>
</a>
