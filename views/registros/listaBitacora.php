<?php include('../../controllers/controladorAvisos1.php'); ?>
<!DOCTYPE html>
<html>
    <head>

        <title>Avisos</title>
         <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">
          <link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
    </head>

    <body>
        
        <!--<header>
          <div class="wrapper">
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
              <h1 class="h1" align="" style="color: white">AVISERO</h1>

        
                <a href="../../index.php">Inicio</a></li>
                  <?php
                    if (isset($_SESSION['login_nombre'])){
                  ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="views/avisos/listaAvisos.php">Avisos</a>
                            <a class="dropdown-item" href="views/publicidades/listaPublicidades.php">Anuncios</a>
                         <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="controllers/registro/bitacora.php">Bitacora</a>
                            <a class="dropdown-item" href="controllers/logout.php">Logout</a>
                        
                        </div>
                    </li>
                  <?php 
                    }
                  ?>
              
              
            </nav>
          <div>
        </header>-->

        <header>
            <div class="wrapper">
                <h1 class="logo"> Avisero </h1>
                <nav>
                    <a href="../../index.php">Inicio</a></li>
                </nav>
            </div>
        </header>


        <section class="contenido wrapper">
          <h1>Registro de Actividades</h1>
          <center>
          <table id="customers" border="1" >
            <thead>
              <tr>

                <td>Usuario           </td>
                <td>Accion            </td>
                <td>Contenido Antiguo </td>
                <td>Contenido Nuevo   </td>
                <td>Fecha             </td>
                
              </tr>
            </thead>

            <tbody>
              <?php
                $bitacoras = listaBitacoras();


                foreach ($bitacoras as $bitacora):
              ?>
              <tr>
                
                <td><?php echo $bitacora['IDUSUARIO'] ?></td>
                <td><?php echo $bitacora['ACCION']?></td>
                <td><?php echo $bitacora['ANTIGUO'] ?></td>
                <td><?php echo $bitacora['NUEVO'] ?></td>
                <td><?php echo $bitacora['fecha'] ?></td>
                
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          </center>
        </section>

      <script src="public/css/js/jquery.js"></script>
      <script src="public/css/js/bootstrap.js"></script>

    </body>
</html>