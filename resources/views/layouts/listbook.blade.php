<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<link href="{{asset('img/books-42701_640.png')}}" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
	<title>{{ isset($title) ?  $title : config('app.name', 'Laravel') }} - Sistem Perpustakaan</title>

	<!-- Scripts -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	{{-- <link href="{{asset('admin/css/jquery-ui.css')}}" rel="stylesheet" /> --}}
	<link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">


	<link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">

	{{-- data table --}}
	<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>
	<div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<center>
							<div class="dropdown profile-element"> 
								<span>
									<img alt="image" class="img-circle" src="{{asset('img/books-42701_640.png')}}" width="100px" />
								</span>
							</div>
							<div class="logo-element">
								IN+
							</div>
						</center>
					</li>
				</ul>
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-12">
					<h2>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</h2>
					
				</div>
			</div>
			<div class="wrapper wrapper-content">
				@yield('content')
				<div class="footer">
					<div>
						<strong>Copyright</strong> Aang Ardam &copy; 2018
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Mainly scripts -->
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
	<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>


	<!-- Custom and plugin javascript -->
	<script src="{{asset('js/inspinia.js')}}"></script>
	<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script> 

	<!-- jQuery UI -->
	<script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

	<!-- GITTER -->
	{{-- <script src="{{asset('js/plugins/gritter/jquery.gritter.min.js')}}"></script> --}}

	<!-- Sparkline -->
	{{-- <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script> --}}

	<!-- Sparkline demo data  -->
	{{-- <script src="{{asset('js/demo/sparkline-demo.js')}}"></script> --}}

	<!-- ChartJS-->
	{{-- <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script> --}}

	{{-- data table --}}
	<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
	@if (isset($js))
	<script src="{{ mix('js/' . $js) }}"></script>
	@endif

</body>
</html>
