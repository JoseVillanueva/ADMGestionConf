<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Gestión de vacunas</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>


       
	<nav class="navbar navbar-default">
		<div class="container-fluid">

					<div class="navbar-header">
						<a class="navbar-brand" href="#"><B>FASTHEALTH</B></a>
					</div>	
		</div>			
	</nav>	
	<nav class="navbar navbar-default">
		<div class="container-fluid">



			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistema Gestión de vacunas</a>
			</div>
    		@if(isset(Auth::user()->name))
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Configuración</a></li>
					<li><a href="{{ url('/') }}">Inventario de vacunas</a></li>
					<li><a href="{{ url('/') }}">Solicitud de transferencia de vacunas</a></li>
					<li><a href="{{ url('/requestvaccines') }}">Adquisición de vacunas</a></li>
					<li><a href="{{ url('/') }}">Control de vacunas</a></li>
					<!--<li><a href="{{ url('/suppliers') }}">Proveedores</a></li>
					<li><a href="{{ url('/vaccines') }}">Vacunas</a></li>
					<li><a href="{{ url('/requestvaccines') }}">Solicitud de vacunas</a></li>
					<li><a href="{{ url('/') }}">Adquisición de vacunas</a></li>-->
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Ingresar</a></li>
						<li><a href="{{ url('/auth/register') }}">Registrarse</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Cerrar sesión</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
			@endif
		</div>
	</nav>
    
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
