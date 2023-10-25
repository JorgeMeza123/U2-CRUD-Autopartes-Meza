<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['submit']))
{	
	$id = $_POST['id'];
	$fecha_venta = $_POST['fecha_venta'];
	$id_empleado = $_POST['id_empleado'];
	$nombre_producto = $_POST['nombre_producto'];
	$cantidad_piezas = $_POST['cantidad_piezas'];
	$precio_unitario = $_POST['precio_unitario'];
	$total = $_POST['total'];
	$direccion = $_POST['direccion'];
	
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
		
	} else {	
		//updating the table
		$resultado = mysqli_query($mysqli, "UPDATE ventas SET fecha_venta='$fecha_venta', id_empleado='$id_empleado', nombre_producto='$nombre_producto', cantidad_piezas='$cantidad_piezas', precio_unitario='$precio_unitario', total='$total', direccion='$direccion' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id=$id");

while($res = mysqli_fetch_array($resultado))
{
	$fecha_venta = $res['fecha_venta'];
	$id_empleado = $res['id_empleado'];
	$nombre_producto = $res['nombre_producto'];
	$cantidad_piezas = $res['cantidad_piezas'];
	$precio_unitario = $res['precio_unitario'];
	$total = $res['total'];
	$direccion = $res['direccion'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar_sesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>fecha de la Venta</td>
				<td><input type="date" name="fecha_venta" value="<?php echo $fecha_venta;?>"></td>
			</tr>
			<tr> 
				<td>Id del Empleado</td>
				<td><input type="text" name="id_empleado" value="<?php echo $id_empleado;?>"></td>
			</tr>
			<tr> 
				<td>Nombre del Producto</td>
				<td><input type="text" name="nombre_producto" value="<?php echo $nombre_producto;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad de Piezas</td>
				<td><input type="text" name="cantidad_piezas" value="<?php echo $cantidad_piezas;?>"></td>
			</tr>
			<tr> 
				<td>Precio Unitario</td>
				<td><input type="text" name="precio_unitario" value="<?php echo $precio_unitario;?>"></td>
			</tr>
			<tr> 
				<td>Total a Pagar</td>
				<td><input type="text" name="total" value="<?php echo $total;?>"></td>
			</tr>
			<tr> 
				<td>Direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="submit" value="Aceptar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
