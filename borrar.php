<?php
   require_once 'inc/conexion.php'; 
   require_once 'inc/session.php';
   
   
   $codigo= $_GET["codigo"];
   
   $sql="DELETE FROM vehiculos WHERE id_veh= $codigo";
   $respuesta= $db->query($sql);
   
   if ($respuesta){
       header("location:listado.php");}
 ?> 
