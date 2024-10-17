<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $destinatario = "gastondelgreco9@gmail.com";
    $asunto = "Prueba";
    $cuerpo = "Esto es una prueba de envío de correo a través del servidor"; 
    if(mail($destinatario, $asunto, $cuerpo)){
        echo "El mensaje fue enviado correctamente";
        }
        else{
        echo "Hubo un error al enviar el mensaje";
    }
?>
</body>
</html>
