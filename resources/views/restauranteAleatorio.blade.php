<!DOCTYPE html>
<html lang="en">
<head>
	<link href="css/styles.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class = "rAU">

		<div>
			<img src="images\logosRestaurantes\{{$restaurante->logo}}" alt="algo">
		</div>
	</div>
	<div class = "rAD">
		{{$restaurante->nombre}} <br>
		{{$restaurante->eslogan}} <br>
		{{$restaurante->horarioInicio}}  -  {{$restaurante->horarioFinal}} <br>
		{{$restaurante->ubicacion}} <br>
		{{$restaurante->descripcion}} <br>

		@foreach($restaurante->categorias as $categories)
			{{$categories->nombre}}
		@endforeach
		<br>
		<br>
			@foreach($promociones as $promocion)
				{{$promocion->id}} , {{ $promocion->nombre }} , {{ $promocion->tipo_promocion }} 
				{!! link_to_route('usuario.seguirPromocion', $title = 'Activar', $parameters = $promocion->id, $attributes = [ 'class' => 'btn btn-info']); !!}     
				{!! link_to_route('compartirPromocion', $title = 'Compartir', $parameters = $promocion->id, $attributes = [ 'class' => 'btn btn-info']); !!} <br>
			@endforeach
		<br>
		<button>Regresar</button>

	</div>
</body>
</html>