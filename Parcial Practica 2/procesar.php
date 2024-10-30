<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comentario = trim($_POST['comment']);

    if (empty($nombre) || empty($email) || empty($comentario)) {
        echo "Por favor, rellena todos los campos.";
        echo "<br><br>";
        echo "<a href='CV.html'>Haga click para volver a la pagina anterior </a>";
    } else {
        echo "Formulario enviado correctamente.";
        echo "<br><br>";
        echo "<a href='CV.html'>Haga click para volver a la pagina anterior </a>";
    }
}
?>