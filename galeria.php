<!DOCTYPE html>
<html lang="es">
    
<?php
require_once ('inc/conexion.php');
require_once 'inc/session.php';
include 'menu.php';
include 'pie.php';

$sql="SELECT * FROM vehiculos";
$consulta_vehiculos= $db->query($sql);

$sql= " SELECT  * FROM marcas GROUP BY marcas.nombre";
$lista_marcas= $db->query($sql);
          
    $marca =(isset($_POST["marca"]) && !empty($_POST["marca"]))? $_POST["marca"]:"";
    $desdeMonto = (isset($_POST["desdeMonto"]) && !empty($_POST["desdeMonto"]))? trim($_POST["desdeMonto"]):0; 
    
         $auxiliar="";
         $monto="";
         $filtro="";
        if (($marca=="")&&($desdeMonto<>0)) {
             $monto.=" vehiculos.monto >= $desdeMonto";
             $filtro.= "vehiculos.monto";}
            
        if (($marca<>"")&&($desdeMonto<>0)){
            $auxiliar.="marcas.nombre= '$marca'";
            $monto.="AND vehiculos.monto >= $desdeMonto";
            $filtro.="marcas.nombre,vehiculos.monto";
        }
            
        if (($marca<>"")&&($desdeMonto==0)){
            $auxiliar.="marcas.nombre= '$marca'";
             $filtro.="marcas.nombre";}   
            
        
        $sql="SELECT marcas.id_marca, marcas.nombre, marcas.modelo,vehiculos.monto,vehiculos.tipo,vehiculos.imagen,vehiculos.id_veh,
              vehiculos.puertas,vehiculos.cilindradas,vehiculos.kilometros,vehiculos.estado,vehiculos.color
			FROM vehiculos 
			INNER JOIN marcas ON  vehiculos.marca=marcas.id_marca
			WHERE $auxiliar $monto
			ORDER BY $filtro";
       
       
        
        if(($marca=="")&&($desdeMonto==0)){
             
        $resultado=$consulta_vehiculos;}
         else {
        $consulta_filtro= $db->query($sql);
        $resultado=$consulta_filtro;}
        
  
            
?>

    <head lang="es">
       <title>Galería</title>
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
        
        
        
        <div  id="contenedor" class="container" >
            <?php echo crear_barra(); ?>
            <a  id="boton_volver" style="margin-top: 2px"  title="Volver" href="index.php" class="btn btn-primary rounded" >&laquo</a>
            <br><br> 
            <div>
                <form  name="datos" id="datos" method="post" action="galeria.php"> 
                <fieldset id="fieldset" class="rounded" style="border:solid;;border-width: 1px;border-color: #ccc;width: 700px;margin-left: -120px;padding: 10px;padding-bottom:4px ">
                            <h3>Opciones</h3>
                            
                            <span style="background-color: #F5F5F5" class="rounded">Ordenar por: </span>
                            
                            <select name="marca" id="marca" style="margin-left: 20px">
                                
                                <option value="0" >Marcas</option>
                                <?php
                                foreach ($lista_marcas as $fila){?> 
                                <option value="<?php echo ($fila["nombre"])?>" > <?php echo utf8_encode($fila["nombre"])?> </option>
                                <?php }?>
                                
                            </select>
                           			
                            
                            
                            
                                
                            <select name="desdeMonto" id="desdeMonto" style="margin-left: 10px">
                                
                                <option value="0" >Monto desde:</option>
                                 <option value="25000" >$ 25.000 </option>
                                <option value="30000" >$ 30.000</option>
                                <option value="35000" >$ 35.000</option>
                                <option value="40000" >$ 40.000</option>
                                <option value="50000" >$ 50.000 </option>
                                <option value="100000" >$ 100.000</option>
                                <option value="150000" >$ 150.000</option>
                                <option value="200000" >$ 200.000</option>
                                <option value="250000" >$ 250.000</option>
                                <option value="300000" >$ 300.000</option>
                                
                            </select>
                                
                               
				
                                <input type="submit" id="Mostrar" name="Mostrar" value="Mostrar Listado" style="float:right;margin-bottom: 10px;margin-right:10px" class="btn btn-secondary active" onclick="return mensaje();">
			</fieldset>	
                  </form>
            </div>
            <div>
                <?php 
                $mensajeMarca=(!$marca=="")? $marca:"Todas las Marcas";
                $mensajeMonto=(!$desdeMonto==0)? $desdeMonto:"00";
                ?>
                <p style="margin-left:4px">Marca:<?php echo $mensajeMarca;?> / Desde Monto:<?php echo $mensajeMonto;?></p>
                
                
                
            </div>
            <div class="row" style="border:solid; border-color: #cdcdcd; border-width: 1px; margin-left: 5px;margin-right: 5px;margin-top: -10px" class="rounded">
                
      
                    <?php  
                    if (!$resultado){
                    echo '<p>No se encontraron resultados para el filtro requerido</p>';}
                    else{
                    foreach ($resultado as $row){?>
                
                            <div id="div_galeria" class="col-md-3 mt-4" >
                                <img src="img/<?php echo ($row["imagen"])?>" width="225px" height="120px" />
                                <p><h3>$ <?php echo ($row["monto"])?></h3></p>
                                <a href="detalle.php?codigo=<?php echo $row["id_veh"]?>" class="btn btn-secondary rounded">Ver Detalle</a>
                            </div>
                    <?php 
                    };}
                    ?>
                    
                    
                </div>
           <div style=" height: 60px">
               <a  id="boton_volver" href="galeria.php" class="btn btn-primary rounded" style="background-color: #5a5858;border-color: #5a5858">&laquo; Volver a Galería</a>
           </div>
        </div>
        <footer>
	    <?=pie()?>
	</footer>
           
        
    </body>
</html>
