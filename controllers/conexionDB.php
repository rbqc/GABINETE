<?php
	$servidor 	= 'localhost';
	$username 	= 'root';
	$password 	= '';
	$db			= 'horarios_db';

	$conexion = mysqli_connect($servidor, $username, $password, $db)
			or die ('Error en la conexion de BD:'.mysqli_connect_error());
?>