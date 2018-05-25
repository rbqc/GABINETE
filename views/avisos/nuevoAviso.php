

<?php include ("../../controllers/controladorAvisos.php");?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">
   
        <title>Nuevo</title>

          <link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
          


          
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
          <h1 align="center">NUEVO AVISO</h1><br/>

           
            <form action="../../controllers/controladorAvisos.php" method="POST" enctype="multipart/form-data">


              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Titulo: </label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>
              
                <div class="form-group col-md-6">
                  <label>Subtitulo: </label>
                  <input type="text" class="form-control" placeholder= "Opcional" name="subtitulo">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                
                      <label>Docente: </label>
                      <select class="form-control" name="docente">

                        <?php
                        $docentes = listaDocentes();
                       foreach ($docentes as $docente):
                       ?>
                            <option value="<?php echo $docente['IDDOC'] ?>"><?php echo $docente['APELLIDODOC'].' '.$docente['NOMBREDOC'] ?></option>
                       <?php endforeach; ?>
                      </select>
                </div>  
                <div class="form-group col-md-6">

                     <label>Materia: </label>
                      <select class="form-control" name="materia">
            
                        <?php
                          $materias = listaMaterias();
                          foreach ($materias as $materia):
                        ?>
                            <!--<td><?php echo $materia['NOMBREMAT'] ?></td>-->
                            <option value="<?php echo $materia['CODMAT']?>"> <?php echo $materia['NOMBREMAT'] ?> </option>
                       <?php endforeach; ?>
                      </select>
                      </div>
                 </div>


              <div class="form-row">
                <div class="form-group col-md-12"> 
                  <label>Contenido: </label>
                  <textarea class="form-control" name="descripcion" rows="5" required=""></textarea>
                </div> 
              </div>

              <input type="hidden" name="idUser" value="<?php echo $_SESSION['login_id']?>">


              <input type="submit" name="guardar" value="Guardar" class="btn btn-success">
            </form>
        </section>

    </body>
</html>