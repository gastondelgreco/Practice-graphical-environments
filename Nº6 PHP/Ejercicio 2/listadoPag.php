<body>
  <html>
  <head>
    <title> Listados completo con Paginacion </title>
  </head>
  <body>
    <?php
    include ("conexion.inc");
    $Cant_por_Pag = 2;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
    if (!$pagina) {
      $inicio = 0;
      $pagina = 1;
    } else {
      $inicio = ($pagina - 1) * $Cant_por_Pag;
    }
    $vSql = "SELECT * FROM ciudades";
    $vResultado = mysqli_query($link, $vSql);
    $total_registros = mysqli_num_rows($vResultado);
    $total_paginas = ceil($total_registros / $Cant_por_Pag);
    echo "Numero de registros encontrados: " . $total_registros . "<br>";
    echo "Se muestran paginas de " . $Cant_por_Pag . " registros cada una<br>";
    echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<p>";
    $vSql = "SELECT * FROM ciudades" . " limit " . $inicio . "," . $Cant_por_Pag;
    $vResultado = mysqli_query($link, $vSql);
    $total_registros = mysqli_num_rows($vResultado);
    ?>
    <table border=1>
      <tr>
        <td><b>ID:</b></td>
        <td><b>Ciudad:</b></td>
        <td><b>País:</b></td>
        <td><b>Habitantes:</b></td>
        <td><b>Superficie:</b></td>
        <td><b>Tiene metro?</b></td>
      </tr>
      <?php
      while ($fila = mysqli_fetch_array($vResultado)) {
        ?>
        <tr>
          <td><?php echo ($fila['id']); ?></td>
          <td><?php echo ($fila['ciudad']); ?></td>
          <td><?php echo ($fila['pais']); ?></td>
          <td><?php echo ($fila['habitantes']); ?></td>
          <td><?php echo ($fila['superficie']); ?></td>
          <td><?php echo ($fila['metro']); ?></td>
        </tr>
        <tr>
          <td colspan="5">

            <?php
      }
      mysqli_free_result($vResultado);
      mysqli_close($link);
      ?>
        </td>
      </tr>
    </table>
    <?php
    if ($total_paginas > 1) {
      for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i)
          echo $pagina . " ";
        else
          echo "<a href='listado.php?pagina=" . $i . "'>" . $i . "</a> ";
      }
    } ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p align="center"><a href="menu.html">Volver al menú</a></p>
  </body>
  </html>