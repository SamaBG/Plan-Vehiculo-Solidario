<!DOCTYPE html>
<html lang="es">
<?php

# con esto evitamos que el navegador lo grabe en su cachÃ©
header("Pragma: no-cache");
header("Expires: 0");

# indica al navegador que muestre el diÃ¡logo de descarga aÃºn sin haber descargado todo el contenido
header("Content-type: application/octet-stream");
# indica al navegador que se estÃ¡ devolviendo un archivo
header("Content-Disposition: attachment; filename=listado.xls");
header("Content-type: application/vnd.ms-excel");  

require 'inc/conexion.php';

$valor = $_GET["valor"];
$nombre=$_GET["nombre"];

$sql= "SELECT * FROM planes";
   $plan= $db->query($sql);

    
?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	
</head>

 
<body>
     
    <h2 style="text-align: left; font-family: inherit">Plan Vehícular</h2>
     <h2 style="margin-left: 350px;margin-top: -60px; font-family: inherit"><?php echo $nombre?></h2>
     
    <table style="border:solid">
                <thead>
                <tr>
                 
                <th>Valor Inicial</th>
                <th>N°Cuotas</th>
                <th>Interés Anual</th>
                <th>Cuota Mensual</th>
                <th>Interés Mensual</th>
                <th>Cuota Final</th>
                
              </tr>
            </thead>
            <tbody style="text-align:left">
                
               <?php
                  foreach ($plan as $row){
                  ?>
                <tr>
                <?php
               
                 $n_cuotas = $row["cant_cuotas"];
                 $interes=$row["interes_valor"];
                 $c_mensual= $valor/$n_cuotas;
                 $i_mensual=$c_mensual*$interes ;
                 $c_final=$c_mensual+$i_mensual;
                ?>
                 
                <td><?php echo ($valor);?></td>
                <td><?php echo ($n_cuotas);?></td>
                <td><?php echo ($row["interes_detalle"]);?></td>
                <td><?php echo(round($c_mensual,2));?></td>
                <td><?php echo (round($i_mensual,2));?></td>
                <td><?php echo (round($c_final,2));?></td>
              </tr>
              <?php
                  }
              ?>
             
            </tbody>
          </table> 
    
</body>
</html>
