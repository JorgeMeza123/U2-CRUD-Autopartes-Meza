<?php session_start(); ?>
<html>
<head>
	<title>Pagina de Inicio</title>
	<link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi negocio de Autopartes!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$resultado = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrar_sesion.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='ver.php'>Ve y agrega Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe de iniciar sesion para ver esta página.<br/><br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar sesion</a> | <a href='registro.php'>Registrarse</a>";
		
	}
	?>
	<div id="footer">
		Creado Por <a href="https://jorgemeza123.github.io/MezaJorge/webmaster.html" title="Jorge Arturo Meza Mendez">Jorge Arturo Meza Mendez</a>
	</div>
</body>
</html>
