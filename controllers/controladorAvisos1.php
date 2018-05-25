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
		$fecha			= '2018-04-16 00:19:00'	;

		echo $materia. $docente. $id_usuario. $titulo. $subtitulo. $descripcion. $fecha;
		registrarAviso($materia, $docente, $id_usuario, $titulo, $subtitulo, $descripcion, $fecha);

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
		$fecha			= '2018-04-16 00:19:00'	;


		editarAviso($id_aviso, $titulo, $subtitulo, $docente, $materia, $descripcion, $id_usuario, $fecha);

		header('Location: ../views/avisos/listaAvisos.php');
	}

	function listaBitacoras() {

		global $conexion;

		$query = 'SELECT * FROM bitacora' ;

		//$query = 'SELECT * FROM avisos INNER join docente on avisos.IDDOC = docente.IDDOC INNER JOIN materia on avisos.CODMAT = materia.CODMAT WHERE FECHA_HORA between date_sub(now(),INTERVAL 1 WEEK) and now()';

		$res_query = mysqli_query($conexion, $query) or die ('Revise su consulta SELECT');
		//mysqli_close($conexion);

		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;

	}

	function editarAviso($idAv, $tituloAv, $subtituloAv, $docenteAv, $materiaAv, $descripcionAv, $id_usuarioAv, $fechaAv) {
		global $conexion;

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

		mysqli_query($conexion, $query)
		or die('Revise su consulta UPDATE');
		mysqli_close($conexion);
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
	
	function registrarAviso($materia, $docente, $id, $titulo, $subtitulo, $descripcion, $fecha) {
		global $conexion;

		
		echo $materia. $docente. $id. $titulo. $subtitulo. $descripcion. $fecha;

		$query = "INSERT INTO avisos (CODMAT, IDDOC, IDUSUARIO, TITULO, SUBTITULO, CONTENIDO, FECHA_HORA) VALUES ('$materia', '$docente', '$id', '$titulo', '$subtitulo', '$descripcion', now())";

		mysqli_query($conexion, $query) or die('Revise su consulta de insercion');
		mysqli_close($conexion);
	}

	function obtenerAviso($codAviso) {

		global $conexion;

		$query     = "SELECT * FROM avisos WHERE CODAVISO=$codAviso";
		$res_query = mysqli_query($conexion, $query) or die ('Revise su consulta SELECT 2');
	  	//mysqli_close($conexion);

	  	$aviso = mysqli_fetch_array($res_query, MYSQLI_ASSOC);

	  	return $aviso;

	}

?>