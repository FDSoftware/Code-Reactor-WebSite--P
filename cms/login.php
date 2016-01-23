<?php 
session_start();

// no le mostramos esta página si estas logeado ya.
if(isset($_SESSION["id"])){
	header("location: index.php");
	exit(0);
}

// si no lo estás, sólo te mostramos el formulario y ya.
header('Content-Type: text/html; charset=utf-8');
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 	<header>
 		<h1>Página</h1>
 	</header>
 	<section>
 		<article>
 			<form action="loginner.php" method="post">
 				<input type="text" name="nick">
 				<br>
 				<input type="password" name="password">
 				<br>
 				<br>
 				<input type="submit" value="entrar">
 			</form>
 		</article>
 	</section>
 	<footer>
 		<p>derechos reservados &copy;</p>
 	</footer>
 </body>
 </html>