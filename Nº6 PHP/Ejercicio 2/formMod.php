text<title>Modificacion</title>
</head>
<boby>
  <?php
  include ("conexion.inc");

  $vId = $_POST['id'];

  $vSql = "SELECT * FROM ciudades WHERE id ='$vId' ";
  $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
  ;
  $fila = mysqli_fetch_array($vResultado);
  if (mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<A href='modIni.html'>Continuar</A>");
  } else {
    ?>
    <FORM action="modificacion.php" method="POST" name="FormModi">
      <table width="356">
        <tr>
          <td width="103"> ID: </td>
          <td width="243"> <input type="text" name="ID" value="<?php
          echo ($fila['id']); ?>">
          </td>
        </tr>
        <tr>
          <td width="103"> Ingrese el nombre de la ciudad: </td>
          <td width="243"> <input type="text" name="Ciudad" size="20" maxlength="20"
              value="<?php echo ($fila['Ciudad']); ?>">
          </td>
        </tr>
        <tr>
          <td width="103"> Pais: </td>
          <td width="243"> <input type="text" name="pais" size="20" maxlength="20"
              value="<?php echo ($fila['pais']); ?>">
          </td>
        </tr>
        <tr>
          <td width="103"> Habitantes: </td>
          <td width="243"> <input type="text" name="habitantes" size="20" maxlength="40"
              value="<?php echo ($fila['habitantes']); ?>">
          </td>
        </tr>
        <tr>
          <td width="103"> Superficie: </td>
          <td width="243"> <input type="text" name="superficie" size="20" maxlength="40"
              value="<?php echo ($fila['superficie']); ?>">
          </td>
        </tr>
        <tr>
          <td width="103"> ¿Tiene metro?: </td>
          <td width="243"> <input type="checkbox" name="metro" size="20" maxlength="40" value="1">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"> <input type="submit" name="Submit" value="Modificar">
          </td>
        </tr>
      </table>
    </FORM>
    <?php
  }
  mysqli_free_result($vResultado);
  mysqli_close($link);
  ?>