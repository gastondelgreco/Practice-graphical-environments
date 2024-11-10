<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['name']);
        $email = trim($_POST['correoE']);
        $comentario = trim($_POST['comment']);

        if (empty($nombre) || empty($email) || empty($comentario)){
            echo "Por favor rellena todos los campos";
        } 
            else{
                echo "Formulario enviado correctamente";
            }
    }
?>