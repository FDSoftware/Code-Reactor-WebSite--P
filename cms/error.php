//se redirige a esta pagina para mostrar el codigo de error(no existe,no tienes permiso para ver,borrado,en edicion, etc) :P
<?php
include mundiales.php
?>
<html>
<?php
if ($error = Borrado)
{
  echo: "<h1> Error</h1>";
  echo: "<p>El post fue borrado :V</p>";
}
if ($error = EnEdicion)
{
  echo: "<h1> Error</h1>";
  echo: "<p>"Estamos editando este post vuelva mas tarde maquinola cuantica :V"</p>";
}
?>
</html>