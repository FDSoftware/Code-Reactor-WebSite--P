<?php
// iniciamos la variable de sección
session_start();

header('Content-Type: text/html; charset=utf-8');

// evitamos que entre si ya está logeado
if(isset($_SESSION["id"])){
	header("location: index.php");
	exit(0);
}

// procedemos a indentificar si el usuario es quien dice ser.
$nick = $_POST["nick"];
$password = $_POST["password"];

// comprobemos que está todo
if(empty($nick) || empty($password)){
	header("location: login.php?e=es-idiota");
	exit(0);
}

// comprobemos que son las credenciales correcta, por ahora se usará el usuario por defecto
if($nick == "admin" && $password == "LaMierdaNoEsParaRegalarlaSinoParaTirarselaCara"){
	$_SESSION["id"] = 333;
	$_SESSION["nick"] = "Admin";
	header("location: index.php");
}

// y al final pateamos al usuario al index
header("location: login.php?e=no-sabe-escribir");