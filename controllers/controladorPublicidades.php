<?php
	require_once('conexionDB.php');

	if (isset($_REQUEST['registrar'])) {
		
		$titulo		    = $_REQUEST['titulo'];
		//$fecha_hora   = $_REQUEST['fecha_hora'];

		$ubicacion= cargarArchivo();


		registrarImagen($titulo, $ubicacion);

		header('Location: ../index.php');
		
	}

	if (isset($_REQUEST['eliminar'])) {
		$id_imagen = $_REQUEST['id_imagen'];

		eliminarImagen($id_imagen);

		header('Location: ../views/publicidades/listaPublicidades.php');
	}

	function eliminarImagen($id_imagen) {
		global $conexion;

		$query = "DELETE FROM publicidad WHERE id_imagen=$id_imagen";

		mysqli_query($conexion, $query)
		or die('Revise su consulta DELETE');
		mysqli_close($conexion);
	}

	function registrarImagen($titulo, $ubicacion) {
		global $conexion;

		$query = "INSERT INTO publicidad (titulo, ubicacion, fecha_hora) 
		          VALUES('$titulo', '$ubicacion', now())";

		echo "$titulo";
		mysqli_query($conexion, $query) or die('Revise su consulta de insercion');
		//mysqli_close($conexion);
	}

	function listaImagenes() {
		global $conexion;

		$query     = 'SELECT * FROM publicidad';
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT');
		//mysqli_close($conexion);

		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;
	}



	function cargarArchivo() {
		if (!empty($_FILES['archivo']['name'])) {
			$ruta_archivos  = 'uploads/img_publicidad/';
			$ext_permitidas = ['jpg', 'jpeg', 'png'];
			$nombre         = $_FILES['archivo']['name'];
			$nombre_tmp     = $_FILES['archivo']['tmp_name'];
			$tipo           = $_FILES['archivo']['type'];
			$tamaño         = $_FILES['archivo']['size']/1024;

			$partes_nombre  = explode('.', $nombre);
			$ext_archivo    = end($partes_nombre);
			$ext_correcta   = in_array($ext_archivo, $ext_permitidas);
			$tam_max        = 1.5 * 1024;

			if ($ext_correcta && ($tamaño <= $tam_max)) {
				if ($_FILES['archivo']['error'] > 0) {
					echo "Error ". $_FILES['archivo']['error'];
				} else {
					if (file_exists($ruta_archivos.$nombre)) {
						echo 'ERROR ARCHIVO YA CARGADO, VUELVA A INTENTAR
						     <a href="../views/publicidades/nuevaPublicidad.php">Nueva publicidad</a>';
					} else {
						$guardar = "../$ruta_archivos.$nombre";
						move_uploaded_file($nombre_tmp, $guardar);
						return $ruta_archivos.$nombre;
					}
				}
			} else {
				echo 'ERROR DE EXTENCION, 
				     SELECCIONE UN ARCHIVO CON EXTENCION:
				     jpg, jpeg, png <br>
						 <a href="../views/publicidades/nuevaPublicidad.php">Nueva Publicidad</a>';
			}

		} else {
			header('Location: ../views/publicidades/nuevaPublicidad.php"');
		}
	}
?>