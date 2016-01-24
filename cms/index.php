<?php 
// iniciamos la variable de sección
session_start();

header('Content-Type: text/html; charset=utf-8');

include('mundiales.php');

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
	<title><?php echo $Title; ?></title>
</head>
<body>
	<header>
		<h1><?php echo $Title; ?></h1>
	</header>
	<nav>
		<ul>
			<li>
			<a href="index.php"><?php echo $Home; ?></a>
			</li>
			<?php 
			// comprobamos que es administrador para mostrar el enlace correcto
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
		<p><?php echo $FooterInfo; ?></p>
	</footer>
</body>
</html>