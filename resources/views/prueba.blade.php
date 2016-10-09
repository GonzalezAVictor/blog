@extends('layouts/application')
@section('content')
	<div class="left">
		<nav>
			<ul>
				<li><a href="#">Usuarior</a></li>
				<li><a href="#">Restaurante</a></li>
			</ul>
		</nav>
		{!!Form::open(['route' => 'restaurante.store', 'method' => 'POST' ,'class' => 'register'])!!}
			{!!Form::label('Restaurante')!!}
			{!!Form::text('nombreRestaurante')!!}
			{!!Form::label('Horario inicio')!!}
			{!!Form::time('horarioInicioRestaurante')!!}
			{!!Form::label('Horario Final')!!}
			{!!Form::time('horarioFinalRestaurante')!!}
			{!!Form::label('Ubucación')!!}
			{!!Form::text('ubucacionRestaurante')!!}
			{!!Form::label('Eslogan')!!}
			{!!Form::text('esloganRestaurante')!!}
			{!!Form::label('Descripcion')!!}
			{!!Form::text('descripcionRestaurante')!!}
			{!!Form::label('Logo')!!}
			{!!Form::file('logoRestaurante')!!}

			{!! Form::select('categorias[]', $categoria, null, ['multiple']) !!}

			{!!Form::submit('GO')!!}
		{!! Form::close() !!}

	</div>
	<div class="right">
		<div class="rightTop">
			<div class="rightTL">
				<img class="image" src="prueba.jpg" alt="Imagen">
			</div>
			<div class="rightTR">
				<ul>
					<li>...</li>
					<li>...</li>
					<li>...</li>
				</ul>
			</div>
		</div>
		<div class="rightBot">
			<ul>
				<li>...</li>
				<li>...</li>
				<li>...</li>
				<li>...</li>
			</ul>
		</div>
	</div>
@stop
