<?php

require_once 'inc/conexion.php';
require_once 'inc/session.php';
include 'menu.php';
include 'pie.php';

$error=$_GET["error"];
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">

	
	<title>Login</title>	

	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >
	
        <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="css/estil.css" rel="stylesheet">
  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		function validar(){
		var errores;
		
		errores=0;
			
			if (errores==0){
				return true;
			}else {
				return false;
			}
			
		
		}
		
	</script>
	
</head>
 
<body class="body">

    <?=menu(); ?>
    
    <div class="container" id="contenedor">
	<main id="cuerpo">
            <br><br>
		<h2>Iniciar Sesión</h2>	
                <div id="divisor2" >
		<br>
		
		<form action="iniciar_session.php" method="post" onsubmit="return validar();">
			<fieldset> 
			<legend>Datos</legend>
			
			<div class="form-group row">
				<label for="legajo" class="col-sm-1 col-form-label">Usuario</label>
				<div class="col-sm-3">
				<input type="text" class="form-control" name="legajo" id="legajo" value="" maxlength="8" required>
				</div>

			</div>
			<div class="form-group row">
				<label for="psw" class="col-sm-1 col-form-label">Contraseña</label>
				<div class="col-sm-3">
				<input type="password" class="form-control" name="psw" id="psw" value="" maxlength="20"  aria-describedby="pswAyuda" placeholder="Ingresar contraseña"  required>
				</div>
				
			</div>
                        
                        <?php if ($error=='true'){?>
                        
                        <div style="width: 380px;height: 60px" class="rounded" >
                            <img src="img/error.png" style="width: 20px;height: 20px;margin-left: -5px"/>
                            <h3 style="color:red;text-align: right;margin-top: -35px">El usuario y/o contraseña no son validos!</h3>
                       </div>
                        
                        <?php }?>

			<div class="form-group">
                            <input style="margin-left: 410px;margin-top: -95px;border:solid;border-color: #20B2AA;background-color: #20B2AA"type="submit" class="btn btn-primary" name="iniciar" value="Iniciar Sesión">
			</div>
			
			</fieldset>
		</form>

		</div>
	</main>	
	
</div>	
 <footer>
		<?=pie()?>
</footer>
</body>
</html>

