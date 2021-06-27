<?php

session_start();  #inicia o reanuda la sesiÃ³n

	
	$user = (isset($_SESSION["user"]) && !empty($_SESSION["user"]))? trim($_SESSION["user"]):""; 
	$perfil = (isset($_SESSION["perfil"]) && !empty($_SESSION["perfil"]))? trim($_SESSION["perfil"]):""; 



	if ($user=="") {
		
		# echo "sin seccion";
		# usuario invalido - si existe alguna session la destruye
		
		unset($_SESSION["user"]);
		$_SESSION = array();
		
		session_destroy();
		
	} else {
		/*
			operaciones relacionadas a la session
			por ej: 
				- cargar datos de sesiÃ³n, 
				- verificar tiempo de la seccion,
				- eliminar datos de secciÃ³n, luego de un determinado tiempo
				- cambiar ID de secciÃ³n 
				- registrar datos de usuario logueado, etc.
		*/
		
		
	}


	

/*
Perfiles
	A - administrador - puede ingresar cargo y personas
	E - empleado - puede ingresar cargo
*/		

	/* 
	Funcion que verifica que la funciÃ³n/pagina requerida sea valida para el perfil logueado 
	1 - personas
	2 - cargo
	3 - consultas 
	*/
	function perfil_valido($opcion) {
	global $perfil;
		switch($opcion){
			case 1: 
				$valido=($perfil=="A")? true:false;
				break;
			case 2: 
				$valido=($perfil=="A")? true:false;
				break;	
			case 3: 
				$valido=($perfil=="A" || $perfil=="E")? true:false;
				break;
			default:
				$valido=false;
		}
		
		return $valido;
		
	}
	
	
?>
