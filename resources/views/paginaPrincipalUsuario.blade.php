<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/styles.css" rel="stylesheet">
	<title></title>
</head>
<body>

	<div class = "ppuLeft">
		<div>
			{{Form::open(['route' => 'mostrarRestaurantes',  'method' => 'POST'])}}
			{{Form::text('elementoABuscar')}}
			{{Form::submit('GO')}}
			{{Form::close()}}
		</div>
		<div>
			{!!Form::open(['route' => 'mostrarRestauranteAleatorio',  'method' => 'GET'])!!}
			{!! Form::select('tags[]', $categoria, null, ['multiple']) !!}
			{!!Form::submit('Random')!!}
			{!!Form::close()!!}
		</div><div>
			{!! link_to_route('promocionesSiguiendo', $title = 'Perfil', $parameters = null , $attributes = [ 'class' => 'btn btn-info']); !!}
		</div>
	</div><div class = "ppuRight">
		{{ Form::open(['route' => 'validarCodigoRestaurante', 'method' => 'POST']) }}
		{{ Form::label('Codigo Promocion') }} <br>
		{{ Form::text('codigoPromocion') }}
		{{ Form::submit('GO') }}
		{{ Form::close() }}
	</div>







</body>
</html>