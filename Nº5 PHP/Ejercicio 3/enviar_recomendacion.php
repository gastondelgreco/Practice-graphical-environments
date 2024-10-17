<?php
// Verifica si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $amigo_email = filter_var($_POST['amigo_email'], FILTER_VALIDATE_EMAIL);

    // Verifica que los correos sean válidos
    if ($email && $amigo_email) {
        // Asunto del correo
        $asunto = "Tu amigo $nombre te recomienda este sitio web";

        // Cuerpo del mensaje
        $cuerpo = "
        Hola,

        Tu amigo/a $nombre ($email) te recomienda visitar este sitio web.

        ¡Visítanos en: http://www.ejemplo.com!

        Saludos,
        El equipo de Ejemplo.com";

        // Cabeceras del correo
        $headers = "From: $email\r\n" .
                   "Reply-To: $email\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Enviar correo
        if (mail($amigo_email, $asunto, $cuerpo, $headers)) {
            echo "¡Recomendación enviada correctamente a $amigo_email!";
        } else {
            echo "Hubo un error al enviar el correo. Inténtalo de nuevo.";
        }
    } else {
        echo "Los correos ingresados no son válidos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>