<?php

   
   require_once 'inc/conexion.php';
   require_once 'inc/session.php';
   include 'menu.php';
   include 'pie.php';
   
   $codigo = $_GET["codigo"];
   
   $sql="SELECT * FROM vehiculos where id_veh= ?";
   $resultado= $db->prepare($sql);
   $resultado->execute([$codigo]);
   $vehiculo= $resultado->fetch();
   
   $marca= ($vehiculo["marca"]);
   
   $consulta= "SELECT marcas.nombre, marcas.modelo FROM marcas INNER JOIN vehiculos on vehiculos.marca=marcas.id_marca WHERE marcas.id_marca= $marca" ;
   $res= $db->query($consulta);
   $respuesta= $res->fetch();
?>
<!DOCTYPE html>
<html lang="es">
    <head lang="es">
        <title>Detalle</title>
       <meta charset="UTF-8"> 
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
       
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <link href="css/estil.css" rel="stylesheet">
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body class="body">
        
       
             <?=menu(); ?>
        
        <div class="container" id="contenedor">
            <?php echo crear_barra(); ?>
            <a  id="boton_volver" style="margin-top: 2px"  title="Volver" href="galeria.php" class="btn btn-primary rounded" >&laquo</a><br>
            <div class="row">
                <div class="col-md-6 mt-4">
                    
               
                    <div> 
                       <div id="plan">
                           <a style="margin-top: 4px" href="plan.php?val=<?php echo ($vehiculo["monto"])?>&nombre=<?php echo ($respuesta["nombre"])?>/<?php echo ($respuesta["modelo"])?>" class="btn btn-primary rounded">Plan</a>                      </div>
                      </div>
                       <img id=img_vehiculo src="img/<?php echo ($vehiculo["imagen"])?>" class="rounded"/>
                    </div>
                
                
                <div class="col-md-6 mt-4">
                    
                    <h1 id=h1_marca><?php echo ($respuesta["nombre"])?>/<?php echo ($respuesta["modelo"])?></h1>
                    <h1 id=h1_monto style="margin-left: 70px">$ <?php echo ($vehiculo["monto"])?></h1><br>

                    <div id=datos class="rounded" >
                        
                        <h5>Modelo:<?php echo ($vehiculo["anio"])?></h5>
                        <h5>Kilometraje:<?php echo ($vehiculo["kilometros"])?> kms.</h5>
                        <h5>Color:<?php echo ($vehiculo["color"])?></h5>
                    </div>

                    <div id=div_comentario class="rounded">
                        <p>
                            Podes acercarte personalmente <br> a nuestras instalaciones, para consultar y probar<br> el vehículo que gustes. Te esperamos
                        </p>
                    </div>
                </div>
            </div> 
        </div>
        <footer>
          <?=pie()?>
	</footer>
    </body>
</html>

