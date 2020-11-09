<x-app>


    <div style="visibility: hidden">{{ $secret }}</div>

    <div class="container">
        <div id="prodCol" class="row mx-1 mx-md-0 my-4 py-2">
            <form class="col-12 pt-3" method="POST" id="form" action="{{ route('announcement.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="title">{{ __('announcement.title') }}</label>
                            <input type="text" name="title" id="title"
                                class="form-control  @error('title') is-invalid @enderror"
                                placeholder="{{ __('announcement.title-ph') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('announcement.description') }}</label>
                            <textarea type="text" name="description" id="description"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="{{ __('announcement.description-ph') }}"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">{{ __('announcement.category') }}</label>
                            <select name="category_id" id="category"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="0" selected>{{ __('announcement.choose') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('announcement.price') }}</label>
                            <div class="input-group">
                                <input type="text" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="{{ __('announcement.price-ph') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">€</div>
                                </div>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group"><label for="address-input">Location/City/Address</label>
                            <input type="text" name="address-input" id="address-input" class="form-control    "
                                placeholder="Where are we going?">
                            <input type="hidden" id="hiddenplace" name="hiddenplace" value="">
                        </div>
                        {{-- <div class="form-group">
                            <label for="autocomplete"> Location/City/Address </label>
                            <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                                placeholder="Select Location">
                        </div>
                        <div class="form-group" id="lat_area">
                            <label for="latitude"> Latitude </label>
                            <input type="text" name="latitude" id="latitude" class="form-control">
                        </div>

                        <div class="form-group" id="long_area">
                            <label for="latitude"> Longitude </label>
                            <input type="text" name="longitude" id="longitude" class="form-control">
                        </div> --}}
                    </div>

                    <div class="col-12 col-md-6">
                        <input type="hidden" name="secret" value="{{ $secret }}">
                        <div id="drophere"
                            class="dropzone d-flex flex-row flex-wrap justify-content-center align-items-end">
                            <button type="button" class="nobtn finput mx-auto order-last">
                                <p>
                                    {{ __('announcement.image-tip') }} <span>{{ __('announcement.image-cta') }}
                                    </span>
                                </p>
                            </button>
                        </div>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mx-1 justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn b-btn">
                            {{ __('announcement.submit') }}
                        </button>
                    </div>
                </div>

            </form>


        </div>

    </div>

    {{-- <script
        src="https://maps.google.com/maps/api/js?key=AIzaSyC4OXMGHDDuDP9e0syC4Gv_QhGEatCPYRM&libraries=places"
        type="text/javascript"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

    <script src="{{ asset('js/places.js') }}"></script>

</x-app>
