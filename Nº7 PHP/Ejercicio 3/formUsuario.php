<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  setcookie('username', $username, time() + (86400 * 30), "/");
} else {
  if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
  } else {
    $username = '';
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejercicio 3</title>
</head>
<body>
  <h1>Formulario de Usuario</h1>
  <form method="post" action="formUsuario.php">
    <label for="username">Ingrese nombre de Usuario:</label>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
    <input type="submit" value="Enviar">
  </form>
  <?php
  if (!empty($username)) {
    echo "<p><strong>" . $username . "</strong> Fue el ultimo en ingresar</p>";
  }
  ?>
</body>
</html>