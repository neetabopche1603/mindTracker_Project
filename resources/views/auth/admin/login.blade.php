@extends('auth.admin.app')
@section('adminAuthTitle','Sign In !')
@section('auth-content')

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="#">
					<img src="{{asset('backend/vendors/images/Mindtacker (purple).png')}}" alt="">
                    <!-- <h2>ADMIN</h2> -->
				</a>
			</div>
			<!-- <div class="login-menu">
				<ul>
					<li><a href="#">ADMIN LOGIN</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset('backend/vendors/images/login-page-img.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Admin</h2>
						</div>
						<form action="{{route('admin.loginPost')}}" method="post">
                            @csrf
							@include('partials.alertMessages');
							<div class="input-group custom">
								<input type="text" name="email" class="form-control form-control-lg" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
							</div>
							<div class="input-group custom">
								<input type="password" name="password"  class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
											<!-- use code for form submit -->
											<input class="btn btn-primary btn-lg w-100" type="submit" value="Sign In">
										<!-- <a class="btn btn-primary btn-lg btn-block" href="#">Sign In</a> -->
									</div>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection