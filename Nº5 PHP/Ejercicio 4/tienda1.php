<?php
session_start();

// Verificar o inicializar el contador
if (isset($_SESSION['contador_paginas'])) {
    $_SESSION['contador_paginas']++;
} else {
    $_SESSION['contador_paginas'] = 1;
}

// Mensaje que muestra el número de páginas visitadas
echo "Has visitado " . $_SESSION['contador_paginas'] . " páginas en este sitio.";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda 1</title>
</head>
<body>
    <h1>Bienvenido a la Tienda 1</h1>
    <p>Aquí puedes comprar productos de la Tienda 1.</p>
    <a href="tienda2.php">Ir a la Tienda 2</a>
</body>
</html>