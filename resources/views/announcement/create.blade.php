<x-app>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="container">

        {{-- remove --}}
        {{$secret}}
        {{-- remove --}}


        <div id="prodCol" class="row mx-1 mx-md-0 my-4 py-2">
            <form class="col-12 col-md-6 pt-3" method="POST" action="{{ route('announcement.store') }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="secret" value="{{$secret}}">

                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{old('title')}}"
                        class="form-control  @error('title') is-invalid @enderror" placeholder="What are you selling?">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" 
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Describe in short what are you selling">{{old('description')}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="0" selected>Choose...</option>
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
                    <label for="price">Price</label>
                    <div class="input-group">
                        <input type="text" name="price" id="price" value="{{old('price')}}"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="How much are you selling it for?">
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

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Post your ad
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>
</x-app>
