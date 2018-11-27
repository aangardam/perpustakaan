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

	<!-- Toastr style -->
	{{-- <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet"> --}}

	<!-- Gritter -->
	{{-- <link href="{{asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet"> --}}

	<link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">

	{{-- data table --}}
	<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

	{{-- select2 --}}
	<link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

	{{-- date picker --}}
	{{-- <link href="{{asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet"> --}}
	<link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
	{{-- <link href="{{asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet"> --}}

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>
	<div id="wrapper">
		@guest 
            @yield('login') 
        @else 
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<center>
						<div class="dropdown profile-element"> 
							<span>
								<img alt="image" class="img-circle" src="{{asset('img/books-42701_640.png')}}" width="100px" />
							</span>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear"> 
								<span class="block m-t-xs"> <strong class="font-bold">{{auth::user()->name }} <br> {{ auth::user()->email }}</strong> <b class="caret"></b></span>
							</span>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="profile.html">Profile</a></li>
								<li><a href="contacts.html">Contacts</a></li>
								<li><a href="mailbox.html">Mailbox</a></li>
								<li class="divider"></li>
								<li><a href="login.html">Logout</a></li>
							</ul>
						</div>
						<div class="logo-element">
							IN+
						</div>
					</center>
					</li>
					<li>
						<a href="{{ url('/dasboard' )}}"><i class="fa fa-tachometer"></i><span class="nav-label"> Dasboard </span> </a>
					</li>
					<li>
						<a href="{{ url('/Master' )}}"><i class="fa fa-wrench"></i><span class="nav-label"> Master </span> </a>
					</li>
					<li>
						<a href="{{ url('Transaksi' )}}"><i class="fa fa-gear"></i><span class="nav-label"> Transaksi </span> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-gear"></i> <span class="nav-label"> Laporan </span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ url('Laporan/Peminjaman') }}"> Peminjaman </a></li>
							<li><a href="{{ url('Laporan/Pengembalian') }}"> Pengembalian </a></li>
							<li><a href="{{ url('Laporan/Hilang') }}"> Hilang </a></li>
						</ul>
					</li>
					<li>
						<a href="{{ url('Log' )}}"><i class="fa fa-gear"></i><span class="nav-label"> Log Activity </span> </a>
					</li>
				</ul>

			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top  white-bg page-heading" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<a href="{{ url('/logout') }}"> 
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>

				</nav>
			</div>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-12">
					<?php 
						$segment1 = Request::segment(1);
						$segment2 = Request::segment(2); 
					?>
					@if (strtolower($segment1) != strtolower("home")  )
						<h2>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</h2>
						<ol class="breadcrumb">
							<li>
								<a href="{{ url('/home') }}">Home</a>
							</li>
							@if (isset($title))
								@if (strtolower($segment1) != strtolower($title)) 
									@if (strtolower($segment1) == strtolower("Master")  )
										<li>
											<a href="{{ url($segment1) }}"> {{ ucfirst($segment1) }} </a>
										</li>
									@endif
								@endif
							@endif
							{{-- @if (strtolower($segment2) != '' && strtolower($segment2) != strtolower($title) && strtolower($segment1) !=
                            strtolower("process") && strtolower($segment1) != strtolower("reject") && strtolower($segment1)
                            != strtolower("reporting") && strtolower($segment1) != strtolower("log") )
                            <li>
                                <a href="{{ url($segment1.'/'.$segment2) }}"> {{ ucfirst($segment2) }} </a>
                            </li>
							@endif --}}
							
							@if (strtolower($segment2) != '' && strtolower($segment2) != strtolower($title) && strtolower($segment1) != strtolower("Transaksi") )
                            <li>
                                <a href="{{ url($segment1.'/'.$segment2) }}"> {{ ucfirst($segment2) }} </a>
                            </li>
                            @endif
							<li class="active">
								<strong>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</strong>
							</li>
						</ol>
					@endif
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
			{{-- <div class="footer">
				<div>
					<strong>Copyright</strong> Aang Ardam &copy; 2018
				</div>
			</div> --}}
		</div>
		@endif
	</div>
<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
{{-- <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script> --}}

<!-- Peity -->
{{-- <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/demo/peity-demo.js')}}"></script> --}}

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

{{-- Select2 --}}
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
<!-- Data picker -->
<script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<!-- Toastr -->
{{-- <script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
@if (isset($js))
    <script src="{{ mix('js/' . $js) }}"></script>
 @endif

</body>
</html>
