<!doctype html>
<html lang="en">
  <head>
  	<title>Verify Your Email Address</title>
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
								<h2>Verify Your Email Address</h2>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                      <form method="POST" class="signin-form" action="{{ route('verification.resend') }}">
                        @csrf
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('click here to request another') }}</button>
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

