<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Construir el cuerpo del mensaje
    $cuerpo = "Has recibido una nueva consulta del formulario de contacto.\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Correo Electrónico: $email\n\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Dirección a la que se enviará el correo
    $destinatario = "tonga@utn.com";
    $asunto_correo = "Consulta desde el formulario: $asunto";

    // Cabeceras adicionales (como el remitente)
    $cabeceras = "From: $email";

    // Enviar el correo
    if (mail($destinatario, $asunto_correo, $cuerpo, $cabeceras)) {
        echo "El correo ha sido enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>