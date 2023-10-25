<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Pagina de Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agrega un Dato Nuevo</a> | <a href="cerrar_sesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>id de venta</td>
			<td>Fecha de la venta</td>
			<td>Id del empleado</td>
			<td>Nombre del producto</td>
			<td>Cantidad de piezas</td>
			<td>Precio unitario</td>
			<td>Total</td>
			<td>Direccion</td>
			<td>Agregar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['fecha_venta']."</td>";
			echo "<td>".$res['id_empleado']."</td>";
			echo "<td>".$res['nombre_producto']."</td>";
			echo "<td>".$res['cantidad_piezas']."</td>";
			echo "<td>".$res['precio_unitario']."</td>";
			echo "<td>".$res['total']."</td>";
			echo "<td>".$res['direccion']."</td>";	
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"eliminar.php?id=$res[id]\" onClick=\"regresa para confirmar('Estas seguro que lo quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
