<?php include('../../controllers/controladorPublicidades.php'); ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>

        <title>Publicidades</title>
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
                    <!--<a href="nuevaPublicidad.php">Nueva Publicidad</a>-->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal">Nueva Publicidad</button>
                    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header" >
                              
                              <h4 class="modal-title" id="myModalLabel">Nueva publicidad</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="height: 20rem;">
                              <form action="../../controllers/controladorPublicidades.php" style="height: 20rem" method="POST" enctype="multipart/form-data">

                                <div class="form-row">
                                  <div class="form-group col-md-12" >
                                    <h5>Titulo: </h5>
                                      <input type="text" class="form-control" name="titulo" required>
                                  </div>
                                </div>

                                <h4>Imagen</h4>
                                <div style="height: 2rem;" class="btn btn-sm"><input type="file" name="archivo" required></div>

                                <input type="submit" name="registrar" value="Guardar" class="btn btn-success">
                              </form>
                           </div>
                          </div>
                       </div>
                      </div>
                    <?php }?>
                </nav>
            </div>
        </header>

        <section class="contenido wrapper">
          <h1>Lista Anuncios</h1>
          <center>
          <table id="customers" border="1" >
            <thead>
              <tr>

                <td>Titulo  </td>
                <td>Imagen      </td>
                <td>Fecha          </td>
               <?php
                if (isset($_SESSION['login_nombre'])){?>
                <td>Herramientas    </td>
                <?php }?>
              </tr>
            </thead>

            <tbody>
              <?php
                $imagenes = listaImagenes();


                foreach ($imagenes as $imagen):
              ?>
              <tr>
                
                <td><?php echo $imagen['titulo'] ?></td>
                <td><img src="../../<?php echo $imagen['ubicacion']?>" width="400"></td>
                <!--<td>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_img">Ver imagen... </button>
                
                <div class="modal fade" id="modal_img" role="dialog">
                  <div class="modal-dialog">
                  
                    
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><?php echo $imagen['titulo'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <img src="../../<?php echo $imagen['ubicacion']?>" width="400">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    
                  </div>
                </div> 
                  </td>-->
                <td><?php echo $imagen['fecha_hora'] ?></td>
                <?php
                    if (isset($_SESSION['login_nombre'])){?>
                      <td><a class="btn btn-primary" href="../../controllers/controladorPublicidades.php?id_imagen=<?php echo $imagen['id_imagen'] ?>&eliminar=true">Eliminar</a></td>

                <?php }?>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          </center>
        </section>
            <script src="../../public/css/js/jquery.js"></script>
            <script src="../../public/css/js/bootstrap.js"></script>
    </body>
</html>