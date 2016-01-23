<?php
// fácil, iniciamos la variable.
session_start();
// luego la destruimos, somos malos
session_destroy();
// y pateamos al usuario al index
header('Content-Type: text/html; charset=utf-8');
header("location: index.php");
 ?>