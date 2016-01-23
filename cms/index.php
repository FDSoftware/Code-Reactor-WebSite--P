<?php 
// iniciamos la variable de sección
session_start();

header('Content-Type: text/html; charset=utf-8');

// definimos una variable para usar en todo lo demás
if(isset($_SESSION["id"])){
	$root = true;
}else{
	$root = false;
}
?>

