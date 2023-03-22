<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>MindTracker | @yield('adminTitle')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />


	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!--font-awesome CDN  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
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
	@stack('style')
</head>

<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('admin/vender/images/deskapp-logo.svg')}}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	@include('partials.backend.header')
	@include('partials.backend.sidebar')
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			@yield('container')

			<div class="footer-wrap pd-20 mb-0 card-box" style="margin-top: 70px;margin-bottom: 80px;">
				Develop By <a href="#" target="_blank">Mindtracker</a>
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="{{asset('backend/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('backend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('backend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('backend/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('backend/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('backend/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('backend/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('backend/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('backend/vendors/scripts/dashboard.js')}}"></script>

	<!-- buttons for Export datatable -->
	<!-- <script src="{{asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script> -->
	<!-- Datatable Setting js -->
	<script src="{{asset('backend/vendors/scripts/datatable-setting.js')}}"></script>
	<!-- Sweat Alert 2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- Ck Editor -->
	<script src="https://cdn.ckeditor.com/4.20.2/standard-all/ckeditor.js"></script>

	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	@stack('script')
</body>

</html>