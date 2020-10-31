<form method="POST" action="{{ route('login') }}" id='form'>
    @csrf

    <div class="form-inner" id='formInner'>
        <div class="form-group">
            <label for="email">{{ __('connect.email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('connect.password') }}</label>
            <input id="password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password">
    
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">{{ __('connect.remember') }}</label>
        </div>
        <div class="form-row align-items-center">
            <div class="col">
                <button type="submit" id="submit"
                    class="btn b-btn w-100">{{ __('connect.login-submit') }}</button>
            </div>
            <span class="px-3 text-muted">{{ __('connect.or') }}</span>
            <div class="col text-center">
                <a id="registerBtn" class="color-main" >Register now</a>
            </div>
        </div>

    </div>
    
</form>