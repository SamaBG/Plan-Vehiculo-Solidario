<!DOCTYPE html>
<html lang="es">
<?php

require_once 'inc/conexion.php';
require_once 'inc/session.php';
include('menu.php'); 
include('pie.php'); 

if (!perfil_valido(1)) {
header("location:index.php");}

 $sql= " SELECT  * FROM marcas GROUP BY marcas.nombre";
 $lista_marcas= $db->query($sql);
 
 $agregar=$_GET["accion"];
 if ($agregar==2){
                $patente = $_POST["patente"];	
		$color = $_POST["color"];
		$modelo = $_POST["marca"];
		$anio= $_POST["anio"];
		$kilometros =$_POST["kilometros"];
		$monto = $_POST["monto"];
		$tipo = $_POST["tipo"];
                $imagen = (!empty($_POST["imagen"]))? $_POST["imagen"]:"log_barra.jpg";
                $puertas =(!empty($_POST["puertas"]))? $_POST["puertas"]:"-";
                $cilindradas =(!empty($_POST["cilindradas"]))? $_POST["cilindradas"]:"-";
                
               
                $sql="SELECT id_marca FROM marcas     
                      WHERE modelo='$modelo'  ";
                
                $resultado=$db->query($sql);
                $resultado=$resultado->fetch();
                
                $marca=$resultado["id_marca"];
                
      //Conociendo el modelo determino la marca del vehículo
       
                //si todo está completo...
        
                $sql="INSERT INTO vehiculos (patente,color,marca,anio,kilometros,monto,tipo,imagen,cilindradas,puertas,estado)
                     VALUES('$patente','$color','$marca','$anio','$kilometros','$monto','$tipo','$imagen','$cilindradas','$puertas','DISPONIBLE')";
                $consulta=$db->query($sql);
                
                if (!$consulta){
                echo "<p>No se pudo establecer la consulta</p>";}
                    
 }
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Formulario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estil.css" >
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


		
	<script>  
	function validarCliente() {
			
		var Patente,Color,Anio,Monto,Kilometros,Modelo;
		
		
		Patente=document.getElementById("patente").value;
	        Color=document.getElementById("color").value;
		Anio=document.getElementById("anio").value;
		Monto=document.getElementById("monto").value;
		Kilometros=document.getElementById("kilometros").value;
                Modelo=document.getElementById("modelo").value;
	
		
		
		 if ( Patente=="" ) {
				alert("El campo Patente esta incompleto.");
				return false;}
				
		else if ( Color=="" ) {
				alert("El campo Color esta incompleto.");
				return false;}
				
		else if ( Anio=="" ) {
				alert("El campo Año esta incompleto.");
				return false;}
		
		else if ( Kilometros=="" ) {
				alert("El campo Kilómetros esta incompleto.");
				return false;}
		
		else if ( Monto=="" ) {
				alert("El campo Monto esta incompleto.");
				return false;}
                            
                else if ( Modelo=="" ) {
				alert("El campo Modelo esta incompleto.");
				return false;}  
                            
				
				
                else {     
		       alert("Vaehículo Agregado");					  
		            }
			return true;
	           }
					
	</script>
	
	
</head>

<body class="body">

        <script>
		      function Puertas()
                      {document.form.puertas.disabled=false;
                      document.form.cilindrada.disabled=true;}
                  
		      function Cilindradas()
                      {document.form.cilindrada.disabled=false;
                      document.form.puertas.disabled=true;}
                      
	</script>
	
             <?=menu(); ?>
        
        
        <div  class="container" id="contenedor">
            <?php echo crear_barra(); ?>
	    <a  id="boton_volver" style="margin-top: 2px" href="listado.php" title="volver al Listado" class="btn btn-primary rounded" >Listado</a>
            <h1 id="h1_form">Formulario Vehículos </h1>
            <?php $accion=2;?>
            <form id="datos" action="formulario.php?accion=<?php echo $accion?>" method="post" name="form"   > 
			
                    <fieldset id="fieldset_form" class="rounded"> 
                        
					<legend>Carga Vehículos</legend>
                                        
                                        <fieldset id="c1">
                                            <label for="patente">Patente</label><br>
                                            <input  style="color:black" type="text" id="patente" name="patente" value="" class="rounded" placeholder= "Automovil:'ABC123' Ciclomotor:'A123ABC'" required>
                                            <br>
                                            <label for="color">Color</label><br>
                                            <input type="text" id="color" name="color" value="" class="rounded" required> 
                                            <br>
                                            <label for="anio">Año</label><br>
                                            <input type="text" id="anio" name="anio" value="" class="rounded" placeholder="Ingrese año del modelo" required> 
                                        </fieldset>
                                        
                                        <fieldset id="c2">
                                            <label for="kilometros">Kilometraje</label><br>
                                            <input type="text" id="kilometros" name="kilometros" value="" class="rounded" placeholder="Ingrese kilometros sin puntos"  required>
                                            <br>
                                            <label for="monto">Monto</label><br>
                                            <input type="text" id="monto" name="monto" value=""class="rounded" placeholder="Ingrese monto sin puntos"  required> 
                                            <br>
                                            <label for="imagen">Imagen</label><br>
                                            <input type="text" id="imagen" name="imagen" value="" class="rounded" placeholder="Nombre más extensión jpg/png"  required> 
                                        </fieldset><br>
                                        
                                        <label for="marca">Marca</label><br>
					<select name="marca" id="marca">
                                
                                            <?php
                                            foreach ($lista_marcas as $fila){?>
                                            <optgroup label="<?php echo utf8_encode ($fila["nombre"])?>">
                                                <?php
                                                  $mca=$fila["nombre"];
                                                  $sql="SELECT modelo FROM marcas WHERE marcas.nombre= '$mca' GROUP BY marcas.modelo";
                                                  $modelo_asociado= $db->query($sql);
                                                  foreach ($modelo_asociado as $row){?>
                                                  <option value="<?php echo ($row["modelo"])?>"> <?php echo utf8_encode($row["modelo"])?> </option><?php }?>
                                            </optgroup>
                                            <?php } ?>
                                        </select>
                                        
					
                                        <fieldset id="c3" style="margin-top: -60px">
                                            
                                            <label for="tipo">Tipo </label>
                                            
                                            <fieldset id="c31" class="rounded">
                                                <input type="radio" id="tipo" name="tipo" value="automovil" checked onclick="return Puertas();"> Automovil
                                                <br><br>
                                                <select id="puertas" name="puertas" size=2 >
                                                <option value="3">3 Puertas</option>    
                                                <option value="4">4 Puertas</option>
                                                <option value="5">5 Puertas</option> 
                                                </select>
                                            </fieldset>
                                            
                                            <fieldset id="c32" class="rounded">
                                                <input  type="radio" id="tipo" name="tipo" value="ciclomotor" onclick="return Cilindradas();"> Ciclomotor
                                                <br><br>
                                                <select id="cilindrada" name="cilindradas" size=2 disabled>
                                                <option value="110">110 C.C.</option>   
                                                <option value="110">125 C.C.</option>
                                                <option value="150">150 C.C.</option>
                                                </select>
                                            </fieldset>
                                           <select style="float: right;margin-right: -150px; margin-top: -50px" id="estado" name="estado" >
                                               <option value="DISPONIBLE" disabled selected>DISPONIBLE</option>   
                                           </select> 
                                        </fieldset>
                   
                                </fieldset>

                                        <input style="margin-left: 5px"type="submit" name="enviar" class="btn btn-secondary rounded" value="Enviar Datos"onclick="javascript: return validarCliente();">
					<input type="reset" name="limpiar" value="Limpiar" class="btn btn-secondary rounded">
                                        
		
			</form>
	
	</div>	
	<footer>
		<?=pie()?>
	</footer>	
</body>
</html>

