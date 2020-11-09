<x-app>

    <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
        <div class="container">
            <div id="prodCol" class="row mx-1 mx-md-0 my-4 py-2">
                <form class="col-12 pt-3" method="POST" id="form" action="{{ route('profile.update', Auth::user()) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('profile.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="{{ __('profile.name-ph') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('profile.email') }}</label>
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('announcement.email-ph') }}"></input>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('profile.password') }}</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('announcement.password-ph') }}"></input>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mx-1 justify-content-center">
                        <div class="form-group">
                            <button type="submit" class="btn b-btn">
                                {{ __('announcement.submit') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app>
