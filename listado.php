<?php
   require_once 'inc/conexion.php'; 
   require_once 'inc/session.php';
   include 'menu.php';
   include 'pie.php';

   if (!perfil_valido(1)) {
	header("location:index.php");}

   
  
   $sql= "SELECT * FROM vehiculos";
   $vehiculo= $db->query($sql);
   
   $sql= " SELECT  * FROM marcas GROUP BY marcas.nombre";
   $lista_marcas= $db->query($sql);
       
       
            
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
            <div style="text-align:right;" id="cons_print">
			<a href="javascript:window.print();" title="Imprimir listado.">
				<img src='img/print.png' title="Imprimir listado." alt="icono imprimir." style="border:0;width:32px;height:32px;"></a>
				&nbsp;&nbsp;
                                <a href="listado_exel.php" title='Excel del listado.'>
				<img src='img/excel.png' title='Excel del listado.' alt="icono Excel." style="border:0;width:28px;height:28px;"> 
			</a>
	    </div>
            
             
	      
                
            <h2 style="text-align: left; font-family: inherit;color:#21618C">Listado Vehículos</h2>
                  
            <br><br>
            <table id="tabla_plan "class="table table-striped">
                <thead>
                <tr>
                <th>Imagen</th>   
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Monto</th>
                <th>Kilometraje</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
                
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
                
            <td> <img src="img/<?php echo ($row["imagen"])?>" width="150px" height="100px" /></td> 
	            <td> <?php echo utf8_encode($marca); ?></td> 
	            <td> <?php echo utf8_encode($modelo); ?></td> 
		    <td> <?php echo utf8_encode($row["anio"]); ?></td> 
                    <td> <?php echo utf8_encode($row["color"]); ?></td> 
	            <td> <?php echo utf8_encode($row["monto"]); ?></td> 
	            <td> <?php echo utf8_encode($row["kilometros"]); ?></td> 
		    <td> <?php echo utf8_encode($row["estado"]); ?></td>
                    <td> <a href="editar.php?codigo=<?php echo ($row["id_veh"])?>" class="btn btn-sm btn-outline-secondary">Modificar</a></td> 
                    <td> <a href="borrar.php?codigo=<?php echo($row["id_veh"]);?>" class="btn btn-sm btn-outline-secondary">Borrar</a></td>
                  </tr>
                        
             <?php
                        
                  }
              ?>
             
            </tbody>
          </table>
         
      </div>
     <footer>
		      <?=pie()?>
     </footer>
 
  </body>
  </html>


