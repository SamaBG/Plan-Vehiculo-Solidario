<?php 
$dbhost="127.0.0.1";  // localhost
$dbport =""; 
$dbname="plan_veh_solidario";

#Usuario root NO se debe usar para conectarse a la BD desde una aplicaciÃ³n Web.
$usuario="usuario_web1";
$password="adminTF";





$strCnx = "mysql:dbname=$dbname;host=$dbhost";  // ;charset=utf8

$db ="";

try {
	$db = new PDO($strCnx, $usuario, $password);
	
	
        $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER); # para referenciar en minuscula el nombre de las columnas
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); # Relizar el FETCh ASSOC por defecto para ahorrar memoria
        
	
} catch (PDOException $e) {
    echo "problemas con la conexión";
    print "Error: " . $e->getMessage() . "<br/>";   # cambiar por un error personalizado 
    die();
}
?>
