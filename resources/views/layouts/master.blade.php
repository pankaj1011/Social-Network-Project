<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>myfurbook</title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body id="app-layout">

@if (!Auth::guest())
<div class="collapse navbar-collapse" id="app-navbar-collapse">
	<!-- Right Side Of Navbar -->
	<ul class="nav navbar-nav navbar-right">
		<!-- Logout Link -->
		<li class="dropdown">
			<a href="{{ url('/logout') }} " class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<!--
			<ul class="dropdown-menu" role="menu">
				<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
			</ul>
			-->
		</li>
	</ul>
</div>
@endif

<div class="container">
<div class="page-header">
@yield('header')
</div>
@if (Session::has('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
</div>
@endif
@yield('content')
</div>
</body>
</html>
