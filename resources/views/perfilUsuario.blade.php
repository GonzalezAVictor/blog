<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	{!! Auth::user()->nombre !!}
	<br>
	{!! Auth::user()->email !!}

	<br>
	<br>

	@foreach($promocionesUsuario as $promocion)
	
		{!! $promocion->nombre !!} <br>

	@endforeach

	
</body>
</html>