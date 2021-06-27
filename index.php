<!DOCTYPE html>
<?php
require_once('inc/session.php');
include 'menu.php';
include 'pie.php';

?>
<html lang="es">
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estil.css" >

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>  
   
    
    <body style="background-color:gainsboro">
        
             <?=menu(); ?>
        
        <a id="boton_volver" style="margin-top: 7px; height: 37px;margin-left: 2px" title="Siguiente" href="leyenda.php" class="btn btn-primary rounded">&raquo</a>      
        <div class="container" id="contenedor">
             <?php echo crear_barra(); ?>
            
            <h1 style="font-family: inherit; color: #21618C">Plan vehículo Solidario</h1>
        
             <div class="carousel slide" data-ride="carousel">
                
          <!-- Indicadores -->
          <ul class="carousel-indicators">
            <li data-target="#car" data-slide-to="0" class="active"></li>
            <li data-target="#car" data-slide-to="1"></li>
            <li data-target="#car" data-slide-to="2"></li>
          </ul>

          <!-- Diapositivas-->
          <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/autos1.jpg" alt="Vehículo con familia"/>
                    <div class="carousel-caption">
                        <h3>Un plan pensado para vos <br>y la comodidad de los tuyos<br></h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/logo.jpg" alt="Entrega de llaves de vehículo"/>
                    <div class="carousel-caption">
                        <h2>Con entrega inmediata<br> y todas las facilidades<br></h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/autos4.jpg" alt=" Variedades de vehículos"/>
                     <div class="carousel-caption">
                        <h3>Todas las variedades de <br>colores y modelos<br></h3>
                    </div>
                </div>
          </div>

          <!--Controles de izquierda y derecha -->
          <a class="carousel-control-prev" href="#car" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#car" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
       </div>
        
        <footer>
           <?=pie()?>
	</footer>
    </body>
</html>

