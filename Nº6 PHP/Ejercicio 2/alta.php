<?php

include 'conexion.inc';

$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$habitantes = $_POST['habitantes'];
$superficie = $_POST['superficie'];
$tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

$vSql = "SELECT Count(id) as cantidad FROM ciudades WHERE id='$vId'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$vCantUsuarios = mysqli_fetch_assoc($vResultado);

if ($vCantCiudades['cantidad'] != 0) {
    echo ("La ciudad ya Existe<br>");
    echo ("<A href='menu.html'>VOLVER AL ABM</A>");
  } else {
    $query = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
    VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
    if (mysqli_query($link, $query)) {
        echo "Ciudad añadida exitosamente.";
        mysqli_free_result($vResultado);
    } else {
        echo "Error: " . mysqli_error($link);
    }
  }

mysqli_close($link);

?>