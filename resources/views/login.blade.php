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
						{!! Form::text('nombre') !!}
						{!! Form::label('Email') !!}
						{!! Form::email('email') !!}
						{!! Form::label('Contraseña') !!}
						{!! Form::password('password') !!}
						{!! Form::label('Confirmar contraseña') !!}
						{!! Form::password('password_confirmation') !!}
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
						{!!Form::label('Email')!!}
						{!!Form::text('email')!!}
						{!! Form::label('Contraseña') !!}
						{!!Form::password('password')!!}
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