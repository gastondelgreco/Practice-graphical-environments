<?php
include ("conexion.inc");
$vId = $_POST['id'];
$vCiudad = $_POST['ciudad'];
$vPais = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vTieneMetro = $_POST['metro'];
$vSql = "UPDATE ciudades set ciudad='$vCiudad', pais='$vPais', habitantes='$vHabitantes', superficie='$vSuperficie', metro='$vTieneMetro' where id='$vId'";
mysqli_query($link, $vSql) or die(mysqli_error($link));
echo ("La ciudad fue Modificada<br>");
echo ("<A href= 'menu.html'>Volver al Menu del ABM</A>");
mysqli_close($link);
?>