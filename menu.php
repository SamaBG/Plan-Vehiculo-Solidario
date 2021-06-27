<?php

	#genera barra superior
	function crear_barra() {
	global $user;
	
		if ($user=="") {
			$links = "<a href='login.php?error=false' title='iniciar session'> Login</a>";
		} else {
			$links = "<span> {$_SESSION['nombre']} </span> &nbsp;".
                                 "<a  href='cerrar_session.php' class='btn btn-secondary rounded' style='height: 37px' title='cerrar sessión de usuario'>Cerrar Sesión</a>".
                                        "<a href='abm.php'title='Alta Baja Modificación' class='btn btn-primary rounded' style='background-color: #20B2AA;height: 37px;margin-right: 2px'>ABM</a>";
					
		}
					 
		$barra_sup ="<div id='divisor1'>
                                   $links 
                                </div>";

		return  $barra_sup;
	}
	
   
   function menu(){
       global $menu1,$perfil;
       $menu='<div class="container">
            <nav style="width: 1110px; margin-left: 0px" class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
                
                
                   <img id=link_logo src="img/logo.jpg" alt="logo del sitio" class="rounded-circle">
                
                  
                 <button class="navbar-toggler" data-target="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                 </button>
                
                
                 <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a href="index.php" id=link1 title="Inicio del Sitio" class="nav-link btn-secondary rounded">Plan Vehículo Solidario</a>
                        </li>
                        <li class="nav-item active">
                            <a href="leyenda.php" title"Leyenda" class="nav-link btn-secondary rounded" >Leyenda</a>
                        </li>
                        <li class="nav-item active">
                            <a href="caracteristicas.php" title="Caracteristicas" class="nav-link btn-secondary rounded">Características</a>
                        </li>
                        <li class="nav-item active">
                            <a href="beneficiarios.php" title="Beneficiarios" class="nav-link btn-secondary rounded">Beneficiarios</a>
                        </li>
                        <li class="nav-item active">
                            <a href="consultas.php" title="Consultas" class="nav-link  btn-secondary rounded">Consultas</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a href="galeria.php" title="Galería" class="nav-link btn-secondary rounded">Galería</h4></a>
                        </li>
                        
                    </ul>
                 </div>
            </nav>';
   return $menu;
   }
?>