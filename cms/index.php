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

<!-- Let's G0! -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Code Reactor</title>
</head>
<body>
	<header>
		<h1>Code Reactor</h1>
	</header>
	<nav>
		<ul>
			<li>
			<a href="index.php">INICIO</a>
			</li>
			<?php 
			if ($root){
				echo "<li>\r\n";
				echo '<a href="logout.php" title="Salir" >Salir</a>';
				echo "</li>\r\n";
			}else{
				echo "<li>\r\n";
				echo '<a href="login.php" title="Entrar" >Entrar</a>';
				echo "</li>\r\n";
			}
			 ?>
		</ul>
	</nav>
	<section>
		<article></article>
	</section>
	<footer>
		<p>El material publicado en este sitio pertenece a CodeReactor, si es de uso libre se avisará, de lo contrario todos los derechos están reservados</p>
	</footer>
</body>
</html>