<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link href="css/styles.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<header>
		<nav class="menu">
			<ul>
				<li>
					<a href="#">Registro</a>
					<ul>
						<li><a href="#">Usuario</a></li>
						<li><a href="#">Restaurant</a></li>
					</ul>
				</li>
				<li><a href="#">Restaurantes</a>
					<ul>
						<li><a href="#">Restaurantes</a></li>
						<li><a href="#">Estadisticas</a></li>
					</ul>
				</li>	
				<li><a href="#">Usuarios</a></li>
				<li><a href="#">Promociones</a></li>
				<li style="float: right;"><a href="#">Salir</a></li>
			</ul>
		</nav>
	</header>
	
	@yield('content')

	<script src='jquery.min.js'></script>
	<script src='script.js'></script>
</body>
</html>