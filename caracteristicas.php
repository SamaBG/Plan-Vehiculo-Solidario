<?php
require_once('inc/session.php');
include ('menu.php');
include ('pie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Características</title>
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
        <div id="divisor2" >
            <a   id="boton_volver" style="margin-top: 2px" title="Siguiente" href="beneficiarios.php" class="btn btn-primary rounded">&raquo</a>  
            <a  id="boton_volver" style="margin-right: 3px; margin-top: 2px" title="Anterior" href="leyenda.php" class="btn btn-primary rounded">&laquo</a>
            <img src="img/logo.jpg" class="rounded-circle"/>
                <div class="sub_divisor"  >
                    
                    <h3>Características del Plan:</h3>
                        
                        <p>
                        <ul type="disc">
                            <li><em><strong>Plan de Cuotas</strong>: <br/>El plan estará constituido por 12, 24, 36, 48 y 60 cuotas mensuales.<br/><br>
                            <li><strong>Interés</strong>:<br>El interés adicionado dependerá del plan seleccionado:<br><br>
                                <ul type="circle">
                                    <li>Plan 12 cuota: 30%anual
                                    <li>Plan 24 cuota: 35%anual
                                    <li>Plan 36 cuota: 40%anual
                                    <li>Plan 48 cuota: 45%anual
                                    <li>Plan 60 cuota: 50%anual
                            </ul><br>
                        <li><strong>Cuota Mensual</strong>:<br>La cuota mensual no podrá exceder el 40% del plan otorgado por Anses o la remuneración mensual del trabajador.<br><br>
                        <li><strong>Sistema de Amortización</strong>:<br>La deuda se amortizará bajo el sistema de amortización fransés, donde la cuota mensual será uniforme 
                            (las cuotas no variarán), abonando en cada una de ellas un porcentaje de interés y otro porcentaje correspondiente a la deuda.</em><br>
                        </ul>
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

