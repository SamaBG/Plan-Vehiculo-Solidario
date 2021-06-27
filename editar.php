<?php
   require_once 'inc/conexion.php'; 
   require_once 'inc/session.php';
   include 'menu.php';
   include 'pie.php';
   
   if (!perfil_valido(1)) {
	header("location:index.php");}

   
   $codigo=$_GET["codigo"];
   
   $sql= " SELECT  * FROM marcas GROUP BY marcas.nombre";
   $lista_marcas= $db->query($sql);
  
   $sql="SELECT * FROM vehiculos WHERE id_veh=$codigo";
   $consulta= $db->query($sql);
   $consulta=$consulta->fetch();
   
   if (!$consulta){
         echo "<p>No se pudo establecer la consulta</p>";}
    else {
        $marcas=$consulta["marca"];
        
        $sql="SELECT marcas.nombre, marcas.modelo
              FROM marcas
	      INNER JOIN vehiculos ON  vehiculos.marca=marcas.id_marca
	      WHERE marcas.id_marca= $marcas";
              $resultado= $db->query($sql);
              $resultado= $resultado->fetch();
              
              $marcaActual=$resultado["nombre"];
              $modeloActual=$resultado["modelo"];
              
              $patenteActual=$consulta["patente"];
              $anioActual=$consulta["anio"];
              $estadoActual=$consulta["estado"];
              $colorActual=$consulta["color"];
              $tipoActual=$consulta["tipo"];
              $puertaActual=$consulta["puertas"];
              $cilindradaActual=$consulta["cilindradas"];
              $montoActual=$consulta["monto"];
              $imagenActual=$consulta["imagen"];
              $kilometrosActual=$consulta["kilometros"];
       
    }
    
                    
   
 ?> 
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Modificar</title>
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
               
	return true;
	}
					
	</script>
</head>

<body class="body">

    
             <?=menu(); ?>
    
    
        <script>
		      function Puertas()
                      {document.form.puertas.disabled=false;
                      document.form.cilindrada.disabled=true;}
                  
		      function Cilindradas()
                      {document.form.cilindrada.disabled=false;
                      document.form.puertas.disabled=true;}
                      
	</script>
						 
        <div  class="container" id="contenedor">
	    <?php echo crear_barra(); ?>
            <a  id="boton_volver" style="margin-top: 2px" href="listado.php" title="volver al Listado" class="btn btn-primary rounded" >&laquo</a>
            <h1 id="h1_form">Formulario Vehículos </h1>
			
            <form id="datos" action="modificar.php?codigo=<?php echo $codigo;?>" method="post" name="form"  > 
			
                    <fieldset id="fieldset_form" class="rounded"> 
                                        
					<legend>Carga Vehículos</legend>
                                        
                                        <fieldset id="c1">
                                            <label for="patente">Patente</label><br>
                                            <input  style="color:black" type="text" id="patente" name="patente" value="<?php echo "$patenteActual";?>" class="rounded" required>
                                            <br>
                                            <label for="color">Color</label><br>
                                            <input type="text" id="color" name="color" value="<?php echo "$colorActual";?>" class="rounded" required> 
                                            <br>
                                            <label for="anio">Año</label><br>
                                            <input type="text" id="anio" name="anio" value="<?php echo "$anioActual";?>" class="rounded"  required> 
                                        </fieldset>
                                        
                                        <fieldset id="c2">
                                            <label for="kilometros">Kilometraje</label><br>
                                            <input type="text" id="kilometros" name="kilometros" value="<?php echo "$kilometrosActual";?>" class="rounded"   required>
                                            <br>
                                            <label for="monto">Monto</label><br>
                                            <input type="text" id="monto" name="monto" value="<?php echo "$montoActual";?>"class="rounded"  required> 
                                            <br>
                                            <label for="imagen">Imagen</label><br>
                                            <input type="text" id="imagen" name="imagen" value="<?php echo "$imagenActual";?>" class="rounded"   required> 
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
                                                  foreach ($modelo_asociado as $row){
                                                      $seleccionado="";
                                                      if(($row["modelo"])== ($modeloActual)){
                                                          $seleccionado="selected";}
                                                      else {$seleccionado="";}?>
                                                <option value="<?php echo ($row["modelo"])?>" <?php echo $seleccionado?>> <?php echo utf8_encode($row["modelo"])?> </option><?php }?>
                                            </optgroup>
                                            <?php } ?>
                                        </select>    
                                        
                                        <fieldset id="c3" style="margin-top: -60px">
                                            
                                            <label for="tipo">Tipo </label>
                                            
                                            <fieldset id="c31" class="rounded">
                                                <input type="radio" id="tipo" name="tipo" value="<?php echo "$tipoActual";?>" checked onclick="return Puertas();"> Automovil
                                                <br><br>
                                                <select id="puertas" name="puertas" size=1 >
                                                    <option value="<?php echo "$puertaActual";?>" selected><?php echo "$puertaActual";?> <?php echo "Puertas"?></option>
                                                <option value="3">3 Puertas</option>    
                                                <option value="4">4 Puertas</option>
                                                <option value="5">5 Puertas</option> 
                                                </select>
                                            </fieldset>
                                            
                                            <fieldset id="c32" class="rounded">
                                                <input  type="radio" id="tipo" name="tipo" value="ciclomotor" onclick="return Cilindradas();"> Ciclomotor
                                                <br><br>
                                                <select id="cilindrada" name="cilindrada" size=1 disabled>
                                                    <option value="<?php echo "$cilindradaActual";?>" selected=""><?php echo "$cilindradaActual";?> <?php echo "C.C."?></option>
                                                <option value="110">110 C.C.</option>   
                                                <option value="110">125 C.C.</option>
                                                <option value="150">150 C.C.</option>
                                                </select>
                                            </fieldset>
                                            <select style="float: right;margin-right: -150px; margin-top: -50px" id="estado" name="estado" size=1>
                                                <option value="<?php echo "$estadoActual";?>"><?php echo "$estadoActual";?></option>
                                                <option value="DISPONIBLE" >DISPONIBLE</option>   
                                                <option value="VENDIDO" >VENDIDO</option>   
                                            </select>
                                        </fieldset>
                                        
                                       
                                           
                   
                                </fieldset>
				
					
                                        <input style="margin-left:5px" type="submit" name="enviar" class="btn btn-secondary rounded" value="Guardar Cambios"onclick="javascript: return validarCliente();">
                                        
                                        
		
			</form>
	
	</div>	
	<footer>
		<?=pie()?>
	</footer>	
</body>
</html>

