<?php include ("../../controllers/controladorAvisos.php");?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar</title>

          <link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
          <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">
    </head>

    <body>
        <header>
            <div class="wrapper">
                <h1 class="logo"> AVISERO </h1>
                <nav>
                    <a href="../../index.php">Inicio</a></li>
                    <a href="listaAvisos.php">Avisos</a></li>
                </nav>
            </div>
        </header>

        <section class="container">
          <h1 align="center">EDITAR AVISO</h1><br/>

            <?php
            $aviso = obtenerAviso($_REQUEST['codAviso']);
            ?>
           
            <form action="../../controllers/controladorAvisos.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-row">
                  
                    <div class="form-group col-md-6">
                      <label>Titulo: </label>
                      <input type="text" class="form-control" name="titulo" value="<?php echo $aviso['TITULO']?>" required>
                    </div>

                  
                    <div class="form-group col-md-6">
                      <label>Subtitulo: </label>
                      <input type="text" class="form-control" placeholder= "Opcional" name="subtitulo" value="<?php echo $aviso['SUBTITULO']?>">
                    </div>
              </div>

              <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Docente: </label>
                        <select class="form-control" name="docente">
                            <option value="<?php echo $aviso['IDDOC']?>"><?php echo $aviso['APELLIDODOC'].' '.$aviso['NOMBREDOC']?></option>
  
                          <?php
                          $docentes = listaDocentes();
                         foreach ($docentes as $docente):
                         ?>
                              <option value="<?php echo $docente['IDDOC'] ?>"><?php echo $docente['APELLIDODOC'].' '.$docente['NOMBREDOC'] ?></option>
                         <?php endforeach; ?>
                        </select>
                      </div>

                  <div class="form group col-md-6">
                    <!--<input type="text" class="form-control" name="materia" value="<?php echo $aviso['CODMAT']?>"><br>-->
                    <label>Materia: </label>
                    <select class="form-control" name="materia" >
                            <option value="<?php echo $aviso['CODMAT']?>"><?php echo $aviso['NOMBREMAT']?></option>
                             
                        <?php
                          $materias = listaMaterias();
                          foreach ($materias as $materia):
                        ?>
                          <option value="<?php echo $materia['CODMAT']?>"> <?php echo $materia['NOMBREMAT'] ?> </option>
                       <?php endforeach; ?>
                      </select>
                  </div>

                 </div>

              <div class="form-row">
                  
                  <div class="form-group col-md-12">
                      <label>Contenido: </label>
                      <textarea class="form-control" name="descripcion" rows="5" cols="75" required=""><?php echo $aviso['CONTENIDO']?></textarea>
                  </div>
              </div>

              <input type="hidden" name="idUser" value="<?php echo $_SESSION['login_id']?>">

              <input type="hidden" name="fecha" value="<?php echo $aviso['FECHA_HORA']?>">

              <input type="hidden" name="codAviso" value="<?php echo $aviso['CODAVISO']?>">


              <input type="submit" name="editar" value="Guardar" class="btn btn-success">
            </form>
        </section>
    </body>
</html>