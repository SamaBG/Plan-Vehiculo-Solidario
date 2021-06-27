<?php
   require_once 'inc/conexion.php'; 
   require_once 'inc/session.php';
   include 'menu.php';
   include 'pie.php';

   if (!perfil_valido(1)) {
	header("location:index.php");}

?>
   
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Plan Vehícular</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estil.css" >
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
 
<body class="body">
        
             <?=menu(); ?>
        

    <div class="container" id="contenedor">
        <?php echo crear_barra(); ?>
        <h2 style="color: #21618C">ABM de vehiculos </h2>
	<?php $accion=1;?>	
        <a href="formulario.php?accion=<?php echo $accion?>" class="btn btn-primary " style="background-color:#20B2AA">Ingresar un vehiculo</a><br><br>
        <a href="listado.php" class="btn btn-primary " style="background-color: #20B2AA;margin-bottom: 10px">Listado de Vehículos</a>
    </div>       
     <footer>
		      <?=pie()?>
     </footer>
 
  </body>
  </html>

