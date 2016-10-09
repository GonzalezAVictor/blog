<!DOCTYPE html>
<html>
<head>

	<meta charset='utf-8'>
	<link href="css/stylesLogin.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<div class="left">
		<div class="ED">
			Registro
				{!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
					<div>
						{!! Form::label('Nombre') !!}
						{!! Form::text('nombreUsuario') !!}
						{!! Form::label('Email') !!}
						{!! Form::email('emailUsuario') !!}
						{!! Form::label('Contraseña') !!}
						{!! Form::password('pwUsuario') !!}
						{!! Form::label('Confirmar contraseña') !!}
						{!! Form::password('confirmarPW') !!}
						{!! Form::submit('GO') !!}
					</div>
				{!! Form::close() !!}
			</div>
	</div>
	<div class="right">
			Login
			<div class="ED">
				{!! Form::open(['route' => 'validarIngresoUsuario', 'method' => 'POST']) !!}
					<div>
						{!!Form::label('Nombre')!!}
						{!!Form::text('nombreUsuario')!!}
						{!! Form::label('Contraseña') !!}
						{!!Form::password('pwUsuario')!!}
						{!! Form::submit('GO') !!}
					</div>
				{!! Form::close() !!}
			</div>
	</div>

	<footer>
	  <p><a href="#">Acerca de nosotros</a></p>
	</footer>
</body>
</html>