<?php 
	
	require_once('conexionDB.php');

	if (isset($_REQUEST['editar'])) {
		$id        = $_REQUEST['id'       ];
		$id_tipo   = $_REQUEST['id_tipo'  ];
		$nombres   = $_REQUEST['nombres'  ];
		$apellidos = $_REQUEST['apellidos'];

		editarUsuario($id, $id_tipo, $nombres, $apellidos);

		header('Location: ../views/usuarios/lista.php');
	}

	if (isset($_REQUEST['eliminar'])) {
		$id_usuario = $_REQUEST['id_usuario'];

		eliminarUsuario($id_usuario);

		header('Location: ../views/usuarios/lista.php');
	}

	if (isset($_REQUEST['registrar'])) {
		$id_tipo   = $_REQUEST['id_tipo'  ];
		$nombres   = $_REQUEST['nombres'  ];
		$apellidos = $_REQUEST['apellidos'];
		$cuenta	   = $_REQUEST['cuenta'];
		$contrasenia = $_REQUEST['contrasenia'];

		registrarUsuario($id_tipo, $nombres, $apellidos, $cuenta, $contrasenia);

		if (isset($_SESSION['login_nombre'])){
			header('Location: ../views/usuarios/lista.php');
		}else{
			echo 'REGISTRO EXITOSO: 
					<a href="../views/login.php">INICIE SESION</a>';
		}
	}

	function listaUsuarios() {
		global $conexion;

		$query     = 'SELECT * FROM usuario';
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT');
		mysqli_close($conexion);

		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;
	}


	function obtenerUsuario($id_usuario) {
		global $conexion;

		$query     = "SELECT * FROM usuario WHERE id_usuario=$id_usuario";
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT usuario');
	  mysqli_close($conexion);

	  $usuario = mysqli_fetch_array($res_query, MYSQLI_ASSOC);

	  return $usuario;
	}

	function obtenerTipo($id_tipo_usuario) {
		global $conexion;

		$query     = "SELECT nombre_tipo_usuario FROM tipo_usuario WHERE id_tipo_usuario=$id_tipo_usuario";
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT usuario');
	  mysqli_close($conexion);


	  return $res_query;
	}

	function editarUsuario($id, $id_tipo, $nombres, $apellidos) {
		global $conexion;

		$query = "UPDATE usuario SET 
			nombres='$nombres',
		    apellidos='$apellidos',
		    id_tipo_usuario= '$id_tipo'
		    WHERE id_usuario='$id'";

		mysqli_query($conexion, $query)
		or die('Revise su consulta UPDATE');
		mysqli_close($conexion);
	}
	
	function eliminarUsuario($id_usuario) {
		global $conexion;

		$query = "DELETE FROM usuario WHERE id_usuario=$id_usuario";

		mysqli_query($conexion, $query)
		or die('Revise su consulta DELETE');
		mysqli_close($conexion);
	}

	function registrarUsuario($id_tipo, $nombres, $apellidos, $cuenta, $contrasenia) {
		global $conexion;

		$query = "INSERT INTO usuario (id_tipo_usuario, nombres, apellidos, cuenta, contrasenia) 
		          VALUES('$id_tipo', '$nombres', '$apellidos', '$cuenta', '$contrasenia')";

		mysqli_query($conexion, $query) or die('Revise su consulta de insercion');
		mysqli_close($conexion);
	}
?>