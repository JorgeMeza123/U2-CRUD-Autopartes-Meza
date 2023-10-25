<html>
<head>
	<title>Registrar</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['Aceptar'])) {
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];

	if($usuario == "" || $contraseña == "" || $nombre == "" || $email == "") {
		echo "Todos los campos deben estar llenos. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='registro.php'>Ir atras</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, email, usuario, contraseña) VALUES('$nombre', '$email', '$usuario', md5('$contraseña'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contraseña"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="Aceptar" value="Aceptar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
