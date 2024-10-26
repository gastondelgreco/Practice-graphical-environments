<?php
include 'conexion.inc';

$id = $_POST['id'];

$vSql = "SELECT * FROM ciudades WHERE id='$vId' ";
$vResultado = mysqli_query($link, $vSql);
if (mysqli_num_rows($vResultado) == 0) {
  echo ("Ciudad Inexistente...!!! <br>");
  echo ("<A href='baja.html'>Continuar</A>");
} else {
  $vSql = "DELETE FROM ciudades WHERE id = '$vId' ";
  mysqli_query($link, $vSql);
  echo ("La ciudad fue Borrada<br>");
  echo ("<A href='menu.html'>Volver al Menu</A>");
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>