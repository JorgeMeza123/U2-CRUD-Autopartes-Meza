<?php session_start(); ?>
<html>
<head>
	<title>Iniciar sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contraseña = mysqli_real_escape_string($mysqli, $_POST['contraseña']);

	if($usuario == "" || $contraseña == "") {
		echo "Cualquier campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='iniciar_sesion.php'>Ir atras</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM login WHERE usuario='$usuario' AND contraseña=md5('$contraseña')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$row = mysqli_fetch_assoc($resultado);
		
		if(is_array($row) && !empty($row)) {
			$validarusuario = $row['usuario'];
			$_SESSION['valid'] = $validarusuario;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "usuario o contraseña invalido.";
			echo "<br/>";
			echo "<a href='iniciar_sesion.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contraseña"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Aceptar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
