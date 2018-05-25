
<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios</title>

          <link type="text/css" rel="stylesheet" href="../../public/css/estilos.css"/>
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
    </head>

    <body>
        <header>
            <div class="wrapper">
                <h1 class="logo"> AVISERO </h1>
                <nav>
                    <a href="../../index.php">Inicio</a></li>
                    <a href="listaHoraios.php">Horarios</a></li>
                </nav>
            </div>
        </header>

        <section class="contenido wrapper">
          <h1>Registrar Horario</h1>

          <fieldset>
            <legend>Datos</legend>
           
            <form action="../../controllers/controladorHoraios.php" method="POST" enctype="multipart/form-data">

              <label>Nombre Materia:</label>
              <input type="text" name="nombremateria" required><br>

              <label>Docente:</label>
              <input type="text" name="docente" required><br>

              <label>Aulas:</label>
              <input type="text" name="aula" required><br>

              <label>Grupo:</label>
              <input type="text" name="grupo" required><br>

              <label>Dias:</label>
              <input type="text" name="dias" required><br>

              <input type="submit" name="registrar" value="Guardar">
            </form>
          </fieldset>
        </section>
    </body>
</html>