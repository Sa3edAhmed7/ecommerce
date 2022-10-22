<!doctype html>
<html lang="en">
  <head>
  	<title>reset</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('assets')}}/auth/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-first">
							<div class="text w-100">
								<h2>Reset Password</h2>
								<p>Do Reset Password an account?</p>
                                @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-white btn-outline-white">{{ __('Register') }}</a>
                        @endif
							</div>
			      </div>
					<div class="login-wrap p-4 p-lg-5">
                      <form method="POST" class="signin-form" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
			      		<div class="form-group mb-3">
			      			<label class="label" for="email">{{ __('Email Address') }}</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		            </div>
                    <div class="form-group mb-3">
                    <label for="password-confirm" for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Reset Password') }}</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('assets')}}/auth/js/jquery.min.js"></script>
  <script src="{{asset('assets')}}/auth/js/popper.js"></script>
  <script src="{{asset('assets')}}/auth/js/bootstrap.min.js"></script>
  <script src="{{asset('assets')}}/auth/js/main.js"></script>

	</body>
</html>

