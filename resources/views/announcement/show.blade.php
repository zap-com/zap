<x-app>

    <div class="container">
        <div id="accCol" class="row py-2  my-4 mx-1 mx-md-0">
            <div class="col flex-grow-0 my-auto">
                <img src="{{ asset('images/starstruck.png') }}" alt="{{ $announcement->user->name }}"
                    class="img-responsive profile-photo" width="75">
            </div>
            <div class="col mr-3 align-items-start my-auto">
                <h2 class="p h5 mb-1">{{ $announcement->user->name }}</h2>
                <!--<p class="text-muted mb-0">2 prodotti</p>-->
            </div>
            <div class="col d-none d-md-block align-items-start my-auto justify-content-right  flex-grow-2">
                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio"
                        name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating"
                        value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1"
                        id="1"><label for="1">☆</label>
                </div>
                <p class="text-muted text-right mr-2 mb-0"><span class="font-weight-bold">0</span> recensioni
                </p>
            </div>
        </div>
        <div id="prodCol" class="row mx-1 mx-md-0 mb-4">
            <div id="product-wrapper" class="col-12 flex-grow-0 p-0">
                <div class="d-flex flex-column card listings-card w-100 p-3 m-0">
                    <div class="small-gallery {{ 'small-gallery-' . $announcement->id }} swiper-container card-img-top w-100"
                        data-id="{{ $announcement->id }}">
                        @if (count($announcement->images) > 1)
                            <div class="swiper-wrapper {{ 's' . $announcement->id }}">
                                @foreach ($announcement->images as $image)
                                    <img src="{{ $image->getUrl(900, 500) }}" class="swiper-slide"
                                        alt="{{ $announcement->title }}" style="width: 100%;">
                                @endforeach
                            </div>
                            <div class="swiper-button-prev swiper-button-prev-{{ $announcement->id }}"></div>
                            <div class="swiper-button-next swiper-button-next-{{ $announcement->id }}"></div>
                        @elseif(count($announcement->images) == 1)
                            <div class="swiper-wrapper {{ 's' . $announcement->id }}">
                                @foreach ($announcement->images as $image)
                                    <img src="{{ $image->getUrl(900, 500) }}" class="swiper-slide"
                                        alt="{{ $announcement->title }}" style="width: 100%;">
                                @endforeach
                            </div>
                        @else
                            <div class="swiper-wrapper {{ 's' . $announcement->id }}">
                                <img src="{{ asset('images/placeholder.jpg') }}" class="swiper-slide"
                                    alt="{{ $announcement->title }}" style="width: 100%;">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body d-flex flex-column pt-1 pb-1">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex flex-column">
                            <h4 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold">
                                {{ $announcement->title }}
                            </h4>
                            <p class="pt-2 mb-2">
                                <a class="h6 text-uppercase" href="/category/{{ $announcement->category->slug }}">
                                    @if (session()->get('locale') == 'it')
                                        {{ $announcement->category->name_it }}
                                    @else
                                        {{ $announcement->category->name }}
                                    @endif
                                </a>
                                @if ($announcement->place->name ?? '')
                                    <span class="px-1 h6"> {{ __('global.inplace') }} </span>
                                    <span class="h6">{{ $announcement->place->name ?? '' }}</span>
                                @endif
                            </p>
                        </div>
                        <p class="product-price align-self-start align-self-md-end text-right mb-auto flex-grow-1">
                            {{ $announcement->price }} €
                        </p>
                    </div>
                    <p class="card-text text-muted pt-3 slide-description flex-grow-1">
                        {{ $announcement->description }}
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/globalslider.js') }}"></script>
</x-app>
