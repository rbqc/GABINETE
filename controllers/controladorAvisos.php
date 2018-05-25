<?php session_start();?>
<?php 
	
	require_once('conexionDB.php');

	if (isset($_REQUEST['guardar'])) {


		$titulo    		= $_REQUEST['titulo'  ];
		$subtitulo   	= $_REQUEST['subtitulo'];

		$docente 		= $_REQUEST['docente'];
		$materia 		= $_REQUEST['materia'];
		$descripcion	= $_REQUEST['descripcion'];
		//$id 			= "RONQUI";
		$id_usuario		= $_REQUEST['idUser'];

		$login_nombre	= $_SESSION['login_nombre'];

		$fecha			= '2018-04-16 00:19:00'	;

		echo $materia. $docente. $id_usuario. $titulo. $subtitulo. $descripcion. $fecha;
		registrarAviso($materia, $docente, $id_usuario, $titulo, $subtitulo, $descripcion, $fecha, $login_nombre);
		
		header('Location: ../');
	}

	if (isset($_REQUEST['editar'])) {

		$id_aviso		= $_REQUEST['codAviso'];
		$titulo    		= $_REQUEST['titulo'  ];
		$subtitulo   	= $_REQUEST['subtitulo'];

		$docente 		= $_REQUEST['docente'];
		$materia 		= $_REQUEST['materia'];
		$descripcion	= $_REQUEST['descripcion'];

		$id_usuario		= $_REQUEST['idUser'];

		

		$login_nombre	= $_SESSION['login_nombre'];
		$fecha			= '2018-04-16 00:19:00'	;


		editarAviso($id_aviso, $titulo, $subtitulo, $docente, $materia, $descripcion, $id_usuario, $login_nombre, $fecha);

		header('Location: ../views/avisos/listaAvisos.php');
	}
	//--
	if (isset($_REQUEST['eliminar'])) {

		$id_aviso		= $_REQUEST['codAviso'];
		$titulo    		= $_REQUEST['titulo'  ];
		$subtitulo   	= $_REQUEST['subtitulo'];

		$docente 		= $_REQUEST['docente'];
		$materia 		= $_REQUEST['materia'];
		$descripcion	= $_REQUEST['descripcion'];

		$id_usuario		= $_REQUEST['idUser'];

		$login_nombre	= $_SESSION['login_nombre'];
		$fecha			= '2018-04-16 00:19:00'	;


		eliminarAviso($id_aviso, $login_nombre, $descripcion);

		header('Location: ../views/avisos/listaAvisos.php');
	}
	//--

	function registrarAviso($materia, $docente, $id, $titulo, $subtitulo, $descripcion, $fecha, $nombreUsuario) {
		global $conexion;

		
		echo $materia. $docente. $id. $titulo. $subtitulo. $descripcion.$nombreUsuario. $fecha;

		$query = "INSERT INTO avisos (CODMAT, IDDOC, IDUSUARIO, TITULO, SUBTITULO, CONTENIDO, FECHA_HORA) VALUES ('$materia', '$docente', '$id', '$titulo', '$subtitulo', '$descripcion', now() )";

		$query1 = "INSERT INTO `bitacora`(`IDBITA`, `IDUSUARIO`, `ACCION`, `ANTIGUO`, `NUEVO`, `FECHA`) VALUES ( null, '$nombreUsuario','INSERT', null, '$descripcion', now() )";

		mysqli_query($conexion, $query) or die('Revise su consulta de insercion');
		mysqli_query($conexion, $query1) or die('Revise su consulta de insercion2');

		mysqli_close($conexion);
	}

	function editarAviso($idAv, $tituloAv, $subtituloAv, $docenteAv, $materiaAv, $descripcionAv, $id_usuarioAv, $nombreUsuario, $fechaAv) {
		global $conexion;
		//----
		$queryR = "SELECT CONTENIDO FROM avisos WHERE CODAVISO = $idAv";

		$res_query = mysqli_query($conexion, $queryR) or die ('Revise su consulta SELECT');
		//mysqli_close($conexion);
		//$num_reg = mysqli_num_rows($res_query);

		//for ($i = 0; $i < $num_reg; $i++) { 
		$lista = mysqli_fetch_array($res_query, MYSQLI_ASSOC);

		$cadena = $lista['CONTENIDO'];
		var_dump($cadena);
		//var_dump($lista);
		//----
		//$queryRec = "SELECT CONTENIDO FROM avisos WHERE CODAVISO = $idAv";

		//$variable = mysqli_query($conexion, $queryRec)or die('Revise su consulta UPDATE');

		$query1 = "INSERT INTO `bitacora`(`IDBITA`, `IDUSUARIO`, `ACCION`, `ANTIGUO`, `NUEVO`, `FECHA`) VALUES ( null, '$nombreUsuario','INSERT', '$cadena', '$descripcionAv', now() )";

		mysqli_query($conexion, $query1)or die('Revise su consulta UPDATE');

		$query = "UPDATE avisos 
			SET 
			TITULO		=	'$tituloAv',
			SUBTITULO	=	'$subtituloAv',
			IDDOC		=	'$docenteAv',
			CODMAT		=	'$materiaAv',
			CONTENIDO	=	'$descripcionAv',
			IDUSUARIO	=	'$id_usuarioAv',
			FECHA_HORA	= 	now()
		    WHERE 
		    CODAVISO	=	'$idAv'";

		//mysqli_query($conexion, $queryRec)or die('Revise su consulta UPDATE');
		//mysqli_query($conexion, $query1)or die('Revise su consulta UPDATE');
		mysqli_query($conexion, $query)or die('Revise su consulta UPDATE');

		mysqli_close($conexion);
	}

	function eliminarAviso($id_aviso, $nombreUsuario, $descripcion) {
		global $conexion;

		$query = "DELETE FROM avisos WHERE CODAVISO=$id_aviso";
		$query1 = "INSERT INTO `bitacora`(`IDBITA`, `IDUSUARIO`, `ACCION`, `ANTIGUO`, `NUEVO`, `FECHA`) VALUES ( null, '$nombreUsuario', 'INSERT', '$descripcion', null, now() )";

		mysqli_query($conexion, $query)or die('Revise su consulta DELETE');
		mysqli_query($conexion, $query1)or die('Revise su consulta DELETE 1');
		mysqli_close($conexion);
	}

	function listaAvisos() {

		global $conexion;

		$query = 'SELECT * FROM avisos INNER join docente on avisos.IDDOC = docente.IDDOC INNER JOIN materia on avisos.CODMAT = materia.CODMAT ' ;

		//$query = "SELECT * FROM avisos INNER join docente on avisos.IDDOC = docente.IDDOC INNER JOIN materia on avisos.CODMAT = materia.CODMAT WHERE FECHA_HORA between date_sub(now(),INTERVAL 1 WEEK) and now()";
		

		$res_query = mysqli_query($conexion, $query) or die ('Revise su consulta SELECT');
		//mysqli_close($conexion);
		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;

	}

	function obtenerAviso($codAviso) {

		global $conexion;

		$query = "SELECT * FROM avisos INNER join docente on avisos.IDDOC = docente.IDDOC INNER JOIN materia on avisos.CODMAT = materia.CODMAT WHERE CODAVISO=$codAviso";
		//$query     = "SELECT * FROM avisos WHERE CODAVISO=$codAviso";

		$res_query = mysqli_query($conexion, $query) or die ('Revise su consulta SELECT 2');
	  	//mysqli_close($conexion);

	  	$aviso = mysqli_fetch_array($res_query, MYSQLI_ASSOC);

	  	return $aviso;

	}

	function listaDocentes() {
		global $conexion;

		$query     = 'SELECT * FROM docente ';
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT');
		//mysqli_close($conexion);

		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;
	}

	function listaMaterias() {
		global $conexion;

		$query2     = 'SELECT * FROM materia';
		$res_query2 = mysqli_query($conexion, $query2)
		  					   or die('Revise su consulta SELECT');
		mysqli_close($conexion);

		$num_reg2 = mysqli_num_rows($res_query2);

		for ($i = 0; $i < $num_reg2; $i++) { 
			$lista2[$i] = mysqli_fetch_array($res_query2, MYSQLI_ASSOC);
		}

		return $lista2;
	}

?>