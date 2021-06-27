<?php
require_once 'inc/conexion.php';
require_once 'inc/session.php';
$codigo=$_GET["codigo"];

	
	

		$patente = $_POST["patente"];
                $color = $_POST["color"];
		$modelo = $_POST["marca"];
		$anio= $_POST["anio"];
		$kilometros =$_POST["kilometros"];
		$monto = $_POST["monto"];
		$tipo = $_POST["tipo"];
                $imagen = $_POST["imagen"];
                $estado = $_POST["estado"];
                $puertas =(!empty($_POST["puertas"]))? $_POST["puertas"]:"-";
                $cilindradas =(!empty($_POST["cilindradas"]))? $_POST["cilindradas"]:"-";
                
                $sql="SELECT id_marca FROM marcas     
                      WHERE modelo='$modelo'  ";
                $resultado=$db->query($sql);
                $resultado=$resultado->fetch();
                
                $marca=$resultado["id_marca"];
                
      //Conociendo el modelo determino la marca del vehículo
     
               $sql="UPDATE vehiculos SET patente='$patente',color='$color',marca='$marca',anio='$anio',kilometros='$kilometros',monto='$monto',
                           tipo='$tipo',imagen='$imagen',cilindradas='$cilindradas',puertas='$puertas',estado='$estado'
                           WHERE id_veh= $codigo";
                
                $consulta=$db->query($sql);
                                                                                                                                                                                              
                
                if ($consulta){
                       header("location:listado.php");}
?>
