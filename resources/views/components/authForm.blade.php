
<div class="container-form">
<form method="POST" action="{{ route('login') }}" id="formLogin" >
    @csrf

    <div class="form-inner " id='formInner'>
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
        
            
        </div>

    </div>
    
</form>

<form method="POST" action="{{ route('register') }}" id="formRegister" class="d-none">
    @csrf
    
    <div class="form-group">
        <label for="name">{{ __('connect.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" id="emailReg" aria-describedby="emailHelp" value="{{ old('email') }}"
            required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">{{ __('connect.password') }}</label>
        <input id="passwordReg" type="password"
            class="form-control @error('password') is-invalid @enderror" name="password"
            required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirmation">{{ __('connect.confirmation') }}</label>
        <input id="password-confirmation" type="password"
            class="form-control @error('password') is-invalid @enderror"
            name="password_confirmation" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-row align-items-center">
        <div class="col">
            <button type="submit"
                class="btn b-btn w-100">{{ __('connect.signup-submit') }}</button>
        </div>
      
        
    </div>
</form>
  <span class="px-3 text-muted or">{{ __('connect.or') }}</span>
<span class="col text-center toogle-btn">
    <a id="registerBtn" class="color-main" >Register now</a>
</span>
</div>


