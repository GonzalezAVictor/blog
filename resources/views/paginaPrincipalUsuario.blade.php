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
			{!!Form::open(['route' => 'mostrarRestauranteAleatorio',  'method' => 'POST'])!!}
			{!! Form::select('tags[]', $categoria, null, ['multiple']) !!}
			{!!Form::submit('Random')!!}
			{!!Form::close()!!}
		</div>
	</div>

	<div clas = "ppuRight">
		
	</div>







</body>
</html>