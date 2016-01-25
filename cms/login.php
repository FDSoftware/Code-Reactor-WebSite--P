<?php 
session_start();

// no le mostramos esta página si estas logeado ya.
if(isset($_SESSION["id"])){
	header("location: index.php");
	exit(0);
}



include('mundiales.php');

// si no lo estás, sólo te mostramos el formulario y ya.
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login | <?php echo $Title; ?></title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<header>
		<h1><?php echo $Title; ?></h1>
	</header>
	<section>
		<article id="caja">
			<h2>Inicio de sección</h2>
			<br>
			<hr>
			<br>
			<form action="loginner.php" method="post" id="formulario">
				<span>Nick:</span>
				<br>
				<input type="text" name="nick">
				<br>
				<br>
				<span>Clave:</span>
				<br>
				<input type="password" name="password">
				<br>
				<br>
				<br>
				<input type="submit" value="Entrar">
			</form>
			<br>
			<br>
		</article>
	</section>
	<footer>
		<p><?php echo $FooterInfo; ?></p>
	</footer>
</body>
</html>