<x-app>
    <div class="container">
        <div id="prodCol" class="row mx-1 mx-md-0 my-4 py-2">
            <form class="col-12 col-md-6 pt-3" method="POST" action="{{ route('announcement.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="What are you selling?"
                        required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control"
                        placeholder="Describe in short what are you selling" required></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option selected>Choose...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <input type="text" name="price" id="price" class="form-control"
                            placeholder="How much are you selling it for?" required>
                        <div class="input-group-append">
                            <div class="input-group-text">€</div>
                        </div>
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
