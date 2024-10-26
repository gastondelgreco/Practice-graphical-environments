<?php
setcookie('headlineType', '', time() - 3600, "/");
header("Location: formNoticias.php");
exit;
?>