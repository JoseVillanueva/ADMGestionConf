@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sistema de gestión de vacunas</div>

				<div class="panel-body">	
					{{ Auth::user()->name }} bienvenido al sistema de gestion de vacunas de FASTHEALTH
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
