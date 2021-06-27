<?php
require_once('inc/session.php');
include 'menu.php';
include ('pie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beneficiarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="css/estil.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>

<body style="background-color: #F5F5F5">
        
             <?=menu(); ?>
        
    
    <div class="container" id="contenedor">
          <?php echo crear_barra(); ?> 
            <div id="divisor2">
                <a   id="boton_volver" style="margin-top: 2px" title="Siguiente" href="consultas.php" class="btn btn-primary rounded">&raquo</a>  
                <a  id="boton_volver" style="margin-right: 3px; margin-top: 2px" title="Anterior" href="caracteristicas.php" class="btn btn-primary rounded">&laquo</a> 
                    <img src="img/logo.jpg" class="rounded-circle"/>
                    <div class="sub_divisor" >
			<h3> Pueden Acceder:</h3>
			<p>
				<ul type=circle>
				<li><em>Los mayores de 18 años y hasta 65 años, que sean beneficiarios de algún plan social de Anses y posean carnet de conducir,
				en condiciones habilitantes al vehículo que desean adquirir.<br><br>
				<li>Los mayores de 18 años y hasta 65 años, que trabajen en blanco y su remuneración mensual no exceda el monto máximo permitido por el plan,
				y posean carnet de conducir,
                                en condiciones habilitantes al vehículo que desean adquirir.</em>
				<br><br>
			</p>
                    </div>      
	    </div>
    </div>
    <footer>
		   <?=pie()?>
    </footer>
    </body>
</head>
</html>
