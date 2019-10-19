<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Sistaz Share') }}</title>
	{{-- <!-- Custom CSS -->
	<link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet"> --}}
	<!-- Custom CSS -->
	<link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../assets/extra-libs/prism/prism.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	<link rel="icon" href="{{ asset('wp-content/uploads/2019/09/cropped-ss-icon-32x32.png') }}" sizes="32x32" />
	<link rel="icon" href="{{ asset('wp-content/uploads/2019/09/cropped-ss-icon-192x192.png') }}" sizes="192x192" />
	@yield('styles')
</head>


<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
			<div class="lds-ripple">
					<div class="lds-pos"></div>
					<div class="lds-pos"></div>
			</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			@include('layouts.shared.header')
			<!-- ============================================================== -->
			<!-- End Topbar header -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			@include('layouts.shared.sidebar')
			<!-- ============================================================== -->
			<!-- End Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Page wrapper  -->
			<!-- ============================================================== -->
			<div class="page-wrapper">
					<!-- ============================================================== -->
					<!-- Bread crumb and right sidebar toggle -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- End Bread crumb and right sidebar toggle -->
					<!-- ============================================================== -->
				 @if(Request::session()->has('success'))
					<div class="alert alert-success"> <i class="ti-user"></i> {{Request::session()->get('success', 'default') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					@endif
          @if(Request::session()->has('failure'))
					<div class="alert alert-danger"> <img src="{{asset('assets/images/users/1.jpg')}}" width="30" class="rounded-circle" alt="img"> {{Request::session()->get('failure', 'default') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					@endif
					<!-- ============================================================== -->
					<!-- Container fluid  -->
					<!-- ============================================================== -->
					@yield('content')
					<!-- ============================================================== -->
					<!-- End Container fluid  -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- footer -->
					<!-- ============================================================== -->
					@include('layouts.shared.footer')
					<!-- ============================================================== -->
					<!-- End footer -->
					<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- customizer Panel -->
	<!-- ============================================================== -->
	{{-- @include('layouts.shared.right-panel') --}}
	<div class="chat-windows"></div>
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	@include('layouts.shared.javascripts')
	@yield('scripts')
</body>

</html>
