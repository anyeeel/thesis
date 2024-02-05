<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">


	</head>
    @section('content')
	<body>
    <img src="{{ asset('assets/img/logo.png') }}" class="logo">
		<p class="nmpc">MSU-IIT ENERGY<br>MANAGEMENT SYSTEM</p>
	<!--	
		<div class="title-container">
			<img src="images\nmpc-logo.png" class="logo">
			<div class="nmpc">
				<p>MSU-IIT</p> 
				<p>NATIONAL MULTI-PURPOSE</p>
				<p>COOPERATIVE</p>
			</div>
			</div>-->
		
	
	
		<svg class="yellow" xmlns="http://www.w3.org/2000/svg" width="1203" height="202" viewBox="0 0 1203 202" fill="none">
			<path d="M0 0C0 0 553.527 96.2186 906 58C1037.62 43.729 1240 0 1240 0V202H0V0Z" fill="#FFF84E"/>
		  </svg>
		  
		  <svg class="red" xmlns="http://www.w3.org/2000/svg" width="1920" height="488" viewBox="0 0 1920 488" fill="none">
			<path d="M0 6.00001C0 6.00001 258.634 -7.11384 423.5 6.00001C552.08 16.2276 623.749 28.5903 750.5 52.5C977.706 95.3592 1093.51 170.499 1321.5 209C1443.78 229.65 1513 246.602 1637 245C1748.4 243.561 1920 209 1920 209V528H0V6.00001Z" fill="#941E1E"/>
		  </svg>
		  
		  
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user"></span>
		      	</div>
		      	<h3 class="text-center mb-4">{{ __('Login') }}</h3>

                  <form method="POST" action="{{ route('login') }}">
                        @csrf

		      		<div class="form-group">
		      			<input type="email" id="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="off" autofocus>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		      		</div>

	            <div class="form-group d-flex">
	              <input type="password" id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	            </div>

	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('Login') }}</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>
	

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>


	</body>
</html>
