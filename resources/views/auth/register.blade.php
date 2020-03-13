@include('includes.login-system.header-files')

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="#" class="logo">
                <img src=" {{ URL::asset('assets/images/articlesdiary-logo.png') }}" width="120" alt="" />
            </a>

            <p class="description">Create an account, it's free and takes few moments only!</p>

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

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                    </div>

                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                    </div>

                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>

                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">

                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-login">
                        <i class="entypo-right-open-mini"></i>
                        Register
                    </button>
                </div>
            </form>


            <div>
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>


@include('includes.login-system.bottom-files')
