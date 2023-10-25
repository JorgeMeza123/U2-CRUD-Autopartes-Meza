<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<html>
<head>
	<title>Agregar Datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['submit'])) {	
	$fecha_venta = $_POST['fecha_venta'];
	$id_empleado = $_POST['id_empleado'];
	$nombre_producto = $_POST['nombre_producto'];
	$cantidad_piezas = $_POST['cantidad_piezas'];
	$precio_unitario = $_POST['precio_unitario'];
	$total = $_POST['total'];
	$direccion = $_POST['direccion'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($fecha_venta) || empty($id_empleado) || empty($nombre_producto) || empty($cantidad_piezas) || empty($precio_unitario) || empty($total) || empty($direccion)) {
				
		if(empty($fecha_venta)) {
			echo "<font color='red'>Fecha de la Venta.</font><br/>";
		}
		
		if(empty($id_empleado)) {
			echo "<font color='red'>Id del empleado.</font><br/>";
		}
		
		if(empty($nombre_producto)) {
			echo "<font color='red'>Nombre del producto.</font><br/>";
		}

		if(empty($cantidad_piezas)) {
			echo "<font color='red'>Cantidad de piezas.</font><br/>";
		}

		if(empty($precio_unitario)) {
			echo "<font color='red'>Precio unitario.</font><br/>";
		}

		if(empty($total)) {
			echo "<font color='red'>Total a pagar.</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>Direccion.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Ir atras</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$resultado = mysqli_query($mysqli, "INSERT INTO ventas (fecha_venta, id_empleado, nombre_producto, cantidad_piezas, precio_unitario, total, direccion, login_id) VALUES('$fecha_venta','$id_empleado','$nombre_producto', '$cantidad_piezas', '$precio_unitario', '$total', '$direccion', '$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
