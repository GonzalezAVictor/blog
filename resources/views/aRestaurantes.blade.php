
@extends('layouts/application')
@section('content')

<div class="aRLeft">

	<div>
		<nav>
			{!!Form::open()!!}
			<input type="text">
			<select name="filtro">
				<option value="">--------</option>
				<option value="">Pizza</option>
				<option value="">Pasta</option>
				<option value="">Bar</option>
				<option value="">Dogos</option>
			</select>
			<a href="#" style="color: black;">GO</a>
			{!!Form::close()!!}
		</nav>
	</div>

	<div>
		
		<table class = 'aRLeft-TablaTRestaurantes'>
			<thead>
				<th>id</th>
				<th>Nombre</th>
				<th>Delete</th>
				<th>Edit</th>
			</thead>
			<tbody>

				@foreach($categoria as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->nombre }}</td>
						<td><a href=" {{ route('restaurante.destroy', $category->id) }} ">Delete</a></td>
						<td><a href=" {{ route('restaurante.edit' , $category->id) }} ">Edit</a></td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
		{{ $categoria->render()}}
	</div>
	
	<div>
		<a href="">Random</a>
	</div>

</div>


<div class="aRRight">
	<div>
		<img src="prueba.jpg" alt="Imagen">
		<input type="text" id="NombreR">
		<input type="text" id="HorarioAR">
		<input type="text" id="HorarioCR">
		<input type="text" id="UbicacionR">
		<a href="#">Menu</a>
	</div>
</div>




@endsection
