<x-app>
    <x-profile>
        <form id="prodCol" class="col-12 pt-3" method="POST" id="form" autocomplete="nope"
            action="{{ route('profile.update', Auth::user()) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <h1 class="mb-5">{{ __('profile.edit-title') }}</h1>
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
                            placeholder="{{ __('profile.email-ph') }}" autocomplete="false"></input>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mx-1 justify-content-end mt-5">
                <div
                    class="col-12 d-flex flex-column flex-md-row align-items-start align-items-md-end justify-content-between px-0">
                    <div class="form-group flex-grow-1  pr-0 pr-md-3">
                        <label for="password">{{ __('profile.password') }}</label>
                        <input type="password" name="password" id="password"
                            class="form-control w-100 @error('email') is-invalid @enderror"
                            placeholder="{{ __('profile.password-ph') }}" autocomplete="off"></input>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button id="editprofile" type="submit" class="btn b-btn">
                            {{ __('profile.edit-submit') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </x-profile>
</x-app>
