@extends('layouts/application')
@section('content')
	<div class="left">
		<nav>
			<ul>
				<li><a href="#">Usuarior</a></li>
				<li><a href="#">Restaurante</a></li>
			</ul>
		</nav>
		{!!Form::open(['route' => 'restaurante.store', 'method' => 'POST' ,'class' => 'register', 'files' => true])!!}
			{!! Form::label('Restaurante') !!}
			{!! Form::text('nombreRestaurante') !!}
			{!! Form::label('Horario inicio') !!}
			{!! Form::time('horarioInicioRestaurante') !!}
			{!! Form::label('Horario Final') !!}
			{!! Form::time('horarioFinalRestaurante') !!}
			{!! Form::label('Ubucación') !!}
			{!! Form::text('ubucacionRestaurante') !!}
			{!! Form::label('Eslogan') !!}
			{!! Form::text('esloganRestaurante') !!}
			{!! Form::label('Descripcion') !!}
			{!! Form::text('descripcionRestaurante') !!}
			{!! Form::label('Logo') !!}
			{!! Form::file('logoRestaurante') !!}
			{!! Form::label('codigo restaurante') !!}
			{!! Form::text('codigoRestaurante') !!}

			{!! Form::select('categorias[]', $categoria, null, ['multiple']) !!}

			{!!Form::submit('GO')!!}
		{!! Form::close() !!}

	</div>
	<div class="right">
		<div>
			imagen
			Datos Resaurante
		</div>
		<div>
			Asignacion de promociones
		</div>
	</div>
@stop
