<?php 
	  include('../../controllers/controladorProductos.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>

	<link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
	<link type="text/css" rel="stylesheet" href="../../public/css/formularios.css"/>
    <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
</head>
<body>
	<header>
			<div class="wrapper">
				<h1 class = "logo"> AVISERO </h1>

					<nav>
						<a href="../../index.php">Inicio</a></li>
					</nav>
			</div>
	</header>
	<section class="contenido wrapper">
		<h1> Lista de horarios </h1>
		<center>
		<table  border="1">
			<thead>
              <tr>
                <td>idMateria       </td>
                <td>NombresMateria  </td>
                <td>NombreDocente   </td>
                <td>Aula            </td>
                <td>Grupo           </td>
                <td>Dias            </td>
                
                <?php
                    if (isset($_SESSION['login_nombre'])){
                        if(($_SESSION['login_tipo_usuario'])==1){?>
                    <td>
                        Otros
                    </td>
                        <?php } else{?>
                    <td>
                        Otros
                    </td>
                    <?php }
                }?>

              </tr>
            </thead>

            <tbody>
            	<?php
                $materias = listaHorarios();
                

                foreach ($materias as $materia):
              ?>
            	<tr>
            			
            			<td><?php echo $producto['id_materia']?>          </td>
            			<td><?php echo $producto['nombre_materia']?>      </td>
            			<td><?php echo $producto['nombre_docente']?>     </td>
            			<td><?php echo $producto['nombre_aula']?> </td>
            			<td><?php echo $producto['grupo']?>   </td>
            			<td><?php echo $producto['dias']?>             </td>
                        
            		<?php
					if (isset($_SESSION['login_nombre'])){
						if(($_SESSION['login_tipo_usuario'])==1){?>
            		<td>
            			<a href="actualizar.php?id_materia=<?php echo $materia['id_materia'] ?>">Actualizar</a>
                  		| 
                  		<a href="../../controllers/controladorHorarios.php?id_materia=<?php echo $materia['id_materia'] ?>&eliminar=true">Eliminar</a>
            		</td>
            			<?php } else{?>
            		<td>
            			<a href="../compras/comprar.php?id_producto=<?php echo $producto['id_producto']?>">Comprar</a>
            		</td>
            		<?php }
            		}?>


            	</tr>
            	<?php endforeach; ?>
            </tbody>
		</table>
		</center>
		<?php
                //--

                //--
				if (isset($_SESSION['login_nombre']) && ($_SESSION['login_tipo_usuario'])==1){?>
					<a href="nuevoProducto.php">Registrar nuevo producto</a>
		<?php 	}	?>
	</section>
</body>
</html>