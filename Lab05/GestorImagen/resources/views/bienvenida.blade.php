@extends('app')

@section('content')

@if(Session::has('error'))
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Al parecer algo esta mal joven <br><br>
		{{Session::get('error')}}
	</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					Bienvenido (usuario)
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
