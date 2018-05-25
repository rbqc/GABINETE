<?php include('../../controllers/controladorProductos.php'); ?>
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
                <h1 class="logo"> TIENDA </h1>
                <nav>
                    <a href="../../index.php">Inicio</a></li>
                </nav>
            </div>
        </header>

        <section class="contenido wrapper">
          <h1>Actualizar Producto</h1>

          <fieldset>
            <legend>Datos</legend>
            <?php 
              $producto = obtenerProducto($_REQUEST['id_producto']);
             ?>
            <form action="../../controllers/controladorProductos.php" method="POST">
              
              <label>Id producto:</label>
              <input type="text" name="id_producto" value="<?php echo $producto['id_producto'] ?>">
              <br>

              <label>Nombre:</label>
              <input type="text" name="nombre" value="<?php echo $producto['nombre_producto'] ?>">
              <br>

              <label>Empresa:</label>
              <input type="text" name="empresa" value="<?php echo $producto['empresa_producto'] ?>">
              <br>

              <label>Descripcion:</label>
              <input type="text" name="descripcion" value="<?php echo $producto['descripcion_producto'] ?>">
              <br>

              <label>Categoria:</label>
              <input type="text" name="categoria" value="<?php echo $producto['categoria_producto'] ?>">
              <br>

              <label>Cantidad:</label>
              <input type="text" name="cantidad" value="<?php echo $producto['cantidad'] ?>">
              <br>

              <label>imagen:</label>
              <input type="text" name="imagen" value="<?php echo $producto['ruta_imagen'] ?>">
              <br>

              <input type="submit" name="actualizar" value="Actualizar Producto">
            </form>
          </fieldset>
        </section>
    </body>
</html>