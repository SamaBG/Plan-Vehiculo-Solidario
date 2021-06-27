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


$sql= "SELECT * FROM vehiculos";
$vehiculo= $db->query($sql);
    
?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>PVS</title>
</head>

 
<body>
    <h2 style="text-align: left; font-family: inherit">Listado Vehículos</h2>
     
    <table style="border:solid">
                <thead>
                <tr>
                 
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Monto</th>
                <th>Kilometraje</th>
                <th>Estado</th>
                
              </tr>
            </thead>
            <tbody style="text-align:left">
                
               <?php
                  $marca="";
                  $modelo="";
                  foreach ($vehiculo as $row){
                        
                        $marcas=$row["marca"];
                         $sql="SELECT marcas.nombre, marcas.modelo
			       FROM marcas
			       INNER JOIN vehiculos ON  vehiculos.marca=marcas.id_marca
			       WHERE marcas.id_marca= $marcas";
                         $consulta= $db->query($sql);
                         $consulta= $consulta->fetch();
                         $marca=$consulta["nombre"];
                         $modelo=$consulta["modelo"];?>
                 
	            <td> <?php echo utf8_encode($marca); ?></td> 
	            <td> <?php echo utf8_encode($modelo); ?></td> 
		    <td> <?php echo utf8_encode($row["anio"]); ?></td> 
                    <td> <?php echo utf8_encode($row["color"]); ?></td> 
	            <td> <?php echo utf8_encode($row["monto"]); ?></td> 
	            <td> <?php echo utf8_encode($row["kilometros"]); ?></td> 
		    <td> <?php echo utf8_encode($row["estado"]); ?></td>
		    
                  </tr>
                        
             <?php
                        
                  }
              ?>
             
            </tbody>
          </table> 
    
</body>
</html>