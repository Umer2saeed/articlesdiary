@include('includes.login-system.header-files')

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="#" class="logo">
                <img src=" {{ URL::asset('assets/images/articlesdiary-logo.png') }}" width="120" alt="" />
            </a>

            <p class="description">Dear user, log in to access the admin area!</p>

            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login In
                    </button>
                </div>
            </form>

            <div class="login-bottom-links">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <div>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>


@include('includes.login-system.bottom-files')
