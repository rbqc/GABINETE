
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
                    <a href="../avisos/listaAvisos.php">Avisos</a></li>
                </nav>
            </div>
        </header>

        <section class="container">
          <h1 align="center">NUEVA PUBLICIDAD</h1><br/>

           
            <form action="../../controllers/controladorPublicidades.php" method="POST" enctype="multipart/form-data">


              <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Titulo: </label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>
              </div>

              <label>Imagen</label>
              <input type="file" name="archivo" required><br>


              <input type="submit" name="registrar" value="Guardar" class="btn btn-success">
            </form>
        </section>

    </body>
</html>