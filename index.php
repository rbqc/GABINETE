<?php 
	include('controllers/controladorAvisos.php');
	include('controllers/controladorPublicidades.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<script language="JavaScript">
    function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
    

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
    segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
    minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
    hora = "0" + hora


    horaImprimible = hora + ":" + minuto + ":" + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
    }
	</script>
	
	<link rel="stylesheet" type="text/css" href="public/css/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	 <!-- Bootstrap CSS -->

	<title>Principal</title>

</head>



<body onload="mueveReloj()" background="uploads/fondoF.jpg" style="overflow-x: hidden;">
				<header class="">
					<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
						

						<div class="col-md-8" align="center">
							<h1 style="color: white ; font-family: Roboto;" >LABORATORIOS INFORMATICA-SISTEMAS</h1>
						</div>

						<div class=" col-md-3 offset-md-0 text-align text-center">
						
									<form name="form_reloj">
										
    										<input type="text" name="reloj" size="7" class="display-3 text-center" onfocus="window.document.form_reloj.reloj.blur()" style="background-color: #343a40; color: white; border:#343a40; font-family: Roboto; ">
    										
									</form>
						</div>

						
						
  						<div class="collapse navbar-collapse col-md-1" id="navbarTogglerDemo01">
							<div class="navbar-nav ml-auto text-center">
								
								<li class="nav-item dropdown">
							        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							          
							        </a>
							        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
							        <?php 
							         	if (!isset($_SESSION['login_nombre'])){?>
							        	<a class="dropdown-item" data-toggle="modal" data-target="#modalLogin">Iniciar sesion</a>
							        <?php } ?>
							          	<a class="dropdown-item" href="views/avisos/listaAvisos.php">Avisos</a>
							          	<a class="dropdown-item" href="views/publicidades/listaPublicidades.php">Anuncios</a>
							         <div class="dropdown-divider"></div>
							         <?php 
							         	if (isset($_SESSION['login_nombre'])){
							         		if(($_SESSION['login_tipo_usuario'])=="ADMIN"){
							         ?>
							         	<a class="dropdown-item" href="views/registros/listaBitacora.php">Bitacora</a>
							         		<?php } ?>
							          	<a class="dropdown-item" href="controllers/logout.php">Logout</a>
							      	<?php } ?>
							        </div>
							    </li>

							</div>
						</div>
						
					
							<div class="modal fade " id="modalLogin" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="moddal-header">
											<button type="button" class="close" data-dismiss="modal" style="padding-right: 1rem;">&times;</button>
										</div>
										<div class="modal-body">
											<header>
												<div class="wrapper">
													<h1 class="logo">INICIAR SESION</h1>
												</div>
											</header>
											<section class="contenido wrapper">
												<fieldset>
													<br><br>
													<form action="controllers/autentificar.php" method="POST">
														<label>cuenta</label>
														<input type="text" name="cuenta" required="">
														<br>
														<label>contrasenia</label>
														<input type="password" name="contrasenia" required>
														<br>
														<input type="submit" name="auth" value="Ingresar">
													</form>
												</fieldset>
											</section>
										</div>
										<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
					</nav>
				</header>
			
    <section>

		<div class="container-fluit">
    		<div class="row text-center">

    			<div class="col-xs-10 col-md-8 col-sm-8 sin_padding portada" >
    				<marquee direction="up" align="center" width="100%" height="550rem" scrollAmount="3">
				
						<?php

	                	$avisos = listaAvisos();
    	        	    foreach ($avisos as $aviso):

	        	    	?>
    		          	<table border="2" align="center" class="table table-bordered">
	    	          		<tr align="center" >
            	    			<td colspan="2" height="50px" class="bg-dark" style="color: white; text-transform: uppercase; font-family: Roboto;"><h4><b><?php echo $aviso['TITULO'] ?></b></h4></td>
              				</tr>

            			<?php 
	        	      		if (!empty($aviso['SUBTITULO'])) { 	
    		        	?>
			              	<tr align="center" >
    	    	      			<td colspan="2" height="30px" class="table-light " style="font-family: Roboto;"><?php echo $aviso['SUBTITULO'] ?></td>
        	    		  	</tr>
            			<?php
	    	      			}
	    		        ?>
		        	      	<tr align="center">
        	    	    		<td width="50%" class="bg-info" style="font-family: Roboto;"><?php echo $aviso['NOMBREDOC'].' '.$aviso['APELLIDODOC'] ?></td>
            	    			<td class="table-secondary" style="font-family: Roboto;"><?php echo $aviso['NOMBREMAT'] ?></td>
	            		   	</tr>
    	    	    	   	<tr align="center">
        		        		<td colspan="2" class="table-info" style="font-family: Roboto;"><?php echo $aviso['CONTENIDO'] ?></td>
	    	        	    </tr>
		                	<tr align="right">
        	        			<td colspan="2" class="table-light" style="font-family: Roboto;"><?php echo $aviso['FECHA_HORA'] ?></td>                
	        	      		</tr>
    	        		</table>      

		            	<?php 
    	        		endforeach;
        	    		?>

    	    	    	

					</marquee>
    			</div>

    			<div class="col-xs-2 col-md-4 col-sm-4 sin_padding">
    				
  					<div class="container-fluit">

  						<div class="row">
  
 							<div class="col-md-12">

   								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      							<div class="carousel-inner">

      								<div class="carousel-item active">
          								<img class="" width="100%" height="550rem" src="uploads/log2.png">
        							</div>

      								<?php
   										$imagenes = listaImagenes();

   										foreach ($imagenes as $imagen):
   									?>
   										<div class="carousel-item">
          									<img class="d-block" width="100%" height="550rem" src="<?php echo $imagen['ubicacion']?>">
       									</div>
   									<?php
   										endforeach;
   									?>
       								<!--<div class="carousel-item active">
          								<img class="d-block w-100" src="img_publicidad/java.jpg" alt="Screenshot 11">
        								<!-div class="carousel-caption d-none d-md-block">
        								  <h3>Titulo</h3>
        								  <p>Descripcion</p>
        								  <a href="" class="btn btn-primary">Mas informacion</a>

        								</div->
        							</div>
       								<div class="carousel-item">
          								<img class="d-block w-100" src="img_publicidad/javaSwing.jpg" alt="Screenshot 10">
       								</div>
        							<div class="carousel-item">
          								<img class="d-block w-100" src="img_publicidad/laravel.jpg" alt="Screenshot 13">
        							</div>-->
      							</div>
    								
    							</div>

  							</div>

  
  						</div>
 
  					</div>
    			</div>

    		</div>
    	</div>

		
		<!--<nav>
			<a href="http://google.com" class="espacio-derecha">Buscanos en:</a>
			<a href="http://facebook.com" class="espacio-derecha">Tambien estamos en facebook</a>			
		</nav>-->
    </section>
    <footer>
    	<MARQUEE bgcolor="#343a40">
			<h3 class="pt-sans" style="color:white">
					LABORATORIOS DE INFORMATICA Y SISTEMAS
			</h3>
		</MARQUEE>
    </footer>
	
	<script src="public/css/js/jquery.js"></script>
    <script src="public/css/js/bootstrap.js"></script>
</body>
</html>	