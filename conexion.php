<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$bdhost = 'localhost';
$nombrebd = 'bdautopartesmeza';
$usuariobd = 'root';
$contraseñabd = '';

$mysqli = mysqli_connect($bdhost, $usuariobd, $contraseñabd, $nombrebd); 
	
?>
