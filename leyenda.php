<?php
require_once('inc/session.php');
include 'menu.php';
include ('pie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leyenda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estil.css" >
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</head>
 
<body style="background-color: #F5F5F5">
    
             <?=menu(); ?>
    
 
    <div class="container" id="contenedor">
         <?php echo crear_barra(); ?>
            <div id="divisor2">
                <a   id="boton_volver" style="margin-top: 2px" title="Siguiente" href="caracteristicas.php" class="btn btn-primary rounded">&raquo</a>  
                <a  id="boton_volver" style="margin-right: 3px; margin-top: 2px" title="Anterior" href="index.php" class="btn btn-primary rounded">&laquo</a>
                <img src="img/logo.jpg" class="rounded-circle"/>
                <div class="sub_divisor" >
			<h3>Leyenda:</h3>
			<p>
				<em><strong>"Plan Vehículo Solidario"</strong> nace con el fin de lograr un destino redituable a los vehículos que yacen abandonados en el corralón
				municipal y en beneficio de quienes necesiten una movilidad. Por ello el municipio ofrece a la venta, previa reparación, acondicionmiento
				y regularización, todos los vehículos que se encuentren en dicha condición, revaluandolos a un precio económico bajo un sistema 
				flexible de cuotas.</em>
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
