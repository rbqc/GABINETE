<?php include('../../controllers/controladorAvisos.php'); ?>
<!DOCTYPE html>
<html>
    <head>

        <title>Avisos</title>
         <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">
          <link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
    </head>

    <body>
        <header>
            <div class="wrapper">
                <h1 class="logo"> Avisero </h1>
                <nav>
                    <a href="../../index.php">Inicio</a></li>
                    <?php
                    if (isset($_SESSION['login_nombre'])){?>
                    <a href="nuevoAviso.php">Nuevo Aviso</a>
                    <?php }?>
                </nav>
            </div>
        </header>


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


        <section class="contenido wrapper">
          <h1>Lista Avisos</h1>
          <center>
          <table id="customers" border="1" >
            <thead>
              <tr>

                <td>Codigo_materia  </td>
                <td>Id_docente      </td>
                <td>Titulo          </td>
                <td>Subtitulo       </td>
                <td>contenido       </td>
                <td>Fecha           </td>
                <?php
                if (isset($_SESSION['login_nombre'])){?>
                <td>Herramientas    </td>
                <?php }?>
              </tr>
            </thead>

            <tbody>
              <?php
                $avisos = listaAvisos();


                foreach ($avisos as $aviso):
              ?>
              <tr>
                <!--<td><?php echo $aviso['CODAVISO'] ?></td>-->
                <td><?php echo $aviso['NOMBREMAT'] ?></td>
                <td><?php echo $aviso['NOMBREDOC'].' '.$aviso['APELLIDODOC'] ?></td>
                
                <td><?php echo $aviso['TITULO'] ?></td>
                <td><?php echo $aviso['SUBTITULO'] ?></td>
                <td><?php echo $aviso['CONTENIDO'] ?></td>
                <td><?php echo $aviso['FECHA_HORA'] ?></td>
                <?php
                if (isset($_SESSION['login_nombre'])){?>
                <td>
                  <a href="editar.php?codAviso=<?php echo $aviso['CODAVISO'] ?>" class="btn btn-secondary">Editar</a>    
                </td>
                <?php }?>
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