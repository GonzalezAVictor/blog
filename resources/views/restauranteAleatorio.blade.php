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
		Aqui se deben de mostrar las pormociones que éste restaurante tenga
		<br>
		<button>Regresar</button>

	</div>
</body>
</html>