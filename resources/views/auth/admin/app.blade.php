<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Laravel | @yield('adminAuthTitle')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/src/plugins/jquery-steps/jquery.steps.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<!-- Notifications Start-->
@if ($msg = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $msg }}</strong>
</div>

@elseif (Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ Session::get('error') }}</strong>
</div>

@elseif (Session::get('delete'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ Session::get('delete') }}</strong>
</div>
@endif
<!-- Notifications End-->

@yield('auth-content')

<!-- success Popup html Start -->
<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
		<div class="modal-content">
			<div class="modal-body text-center font-18">
				<h3 class="mb-20">Form Submitted!</h3>
				<div class="mb-30 text-center"><img src="{{asset('backend/vendors/images/success.png')}}"></div>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			</div>
			<div class="modal-footer justify-content-center">
				<a href="#" class="btn btn-primary">Done</a>
			</div>
		</div>
	</div>
</div>
<!-- success Popup html End -->
<!-- js -->
<script src="{{asset('backend/vendors/scripts/core.js')}}"></script>
<script src="{{asset('backend/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('backend/vendors/scripts/process.js')}}"></script>
<script src="{{asset('backend/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('backend/src/plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{asset('backend/vendors/scripts/steps-setting.js')}}"></script>
</body>

</html>