<?php
function comprobar_nombre_usuario($nombre_usuario){
    //compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
    echo $nombre_usuario . " no es válido<br>";
    return false;
    }
    //compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-
   _";
    for ($i=0; $i<strlen($nombre_usuario); $i++){
    if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
    echo $nombre_usuario . " no es válido<br>";
    return false;
    }
    }
    echo $nombre_usuario . " es válido<br>";
    return true;
   }
   // Pruebas
$usuarios_a_probar = [
    "usuario",        // Válido
    "us",            // No válido (demasiado corto)
    "muy_largo_usuario_de_prueba", // No válido (demasiado largo)
    "usuario123",    // Válido
    "usuario@prueba", // No válido (carácter no permitido)
    "user_name",     // Válido
    "us3r-n4me",     // Válido
    "us!er",         // No válido (carácter no permitido)
    "12",            // No válido (demasiado corto)
    "usuario_de_prueba_largo" // No válido (demasiado largo)
];

foreach ($usuarios_a_probar as $usuario) {
    comprobar_nombre_usuario($usuario);
}
?>