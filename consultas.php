<?php
require_once('inc/session.php');
include 'menu.php';
include ('pie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consultas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/log_barra.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="css/estil.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>

<body style="background-color: #F5F5F5">
    
    
             <?=menu(); ?>
    
    
    <div class="container" id="contenedor">
          <?php echo crear_barra(); ?>  
            <div id="divisor2">
                <a   id="boton_volver" style="margin-top: 2px" title="Siguiente" href="galeria.php" class="btn btn-primary rounded">&raquo</a>  
                <a  id="boton_volver" style="margin-right: 3px; margin-top: 2px" title="Anterior" href="beneficiarios.php" class="btn btn-primary rounded">&laquo</a>
                <img src="img/logo.jpg" class="rounded-circle"/>
                <div class="sub_divisor" >
			<h3> Preguntas Frecuentes:</h3>
			<p>
				<ul type=circle>
				<li><em><strong>¿Cuál es la máxima remuneración permitida?</strong><br>
				Para ser beneficiario del plan, la remuneración obtenida no podrá superar la cantidad de tres sueldos mínimos vitales y móviles.<br><br>
				<li><strong>¿Cómo se realiza el pago de cada cuota?</strong><br>
				Las cuotas se debitarán mensualmente de la cuenta correspondiente al plan social de Anses o referente al trabajador.<br><br>
				<li><strong>¿Dentro de que fechas se gestionarán los pagos?</strong><br>
				Las cuotas se debitarán de las cuentas del 1ro al 10 de cada mes.<br><br>
				<li><strong>¿Qué ocurre si el período de cobro no coincide con el período de pago?</strong><br>
				En caso de no coincidir las fechas, se aplicará amortización adelantada al plan de pago (pago de la cuota por adelantado).<br><br>
				<li><strong>¿Qué tipo de vehículos se dispondrán para la venta?</strong><br>
				Los vehículos dispuestos para la venta serán automóviles y ciclomotores.<br><br>
				<li><strong>¿Cuál será el límite de kilómetros estipulado para los vehículos?</strong><br>
				Los vehículos no podrán exceder el límite de kilómetros determinado por la ley.<br><br>
				<li><strong>¿Los jubilados pueden acceder al plan?</strong><br>
				Los Jubilados podrán acceder al plan, siempre y cuando no excedan los 70 años de edad, y tengan habilitado el carnet de conducir.<br><br>
				<li><strong>¿Cuántas veces una persona puede acceder al plan?</strong><br>
                                    El plan podrá ser solicitado idefinidamente, siempre y cuando, el solicitante, no se encuentre transitando un plan. Una vez finalizado cada plan, se podrá acceder inmediatamente a uno plan nuevo.</em><br><br>
				<br><br>
			</p>
		</div>
            </div>
        </div>
    <footer>
		   <?=pie()?>
    </footer>
    </body>
</head>
</html>

