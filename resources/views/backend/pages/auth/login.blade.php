<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/backend/css/login/login.css')}}">
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img"
							style="">
							<img width="100" src="{{asset('assets/backend/img/banner/cta-square-3.jpg')}}" alt="">
						</div>
						<div class="login-wrap p-4">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-facebook"></span></a>
										<a href="#"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<form action="{{route('admin.login')}}" method="POST" class="signin-form">
                                @csrf
								<div class="form-group mb-3">
									<label class="label" for="name">Email Address</label>
									<input name="email" type="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror" placeholder="Enter Email Address" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input name="password" type="password" class="form-control @error('password')
                                        is-invalid
                                    @enderror" placeholder="Password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input name="remember_me" type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>
