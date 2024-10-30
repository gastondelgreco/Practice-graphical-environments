<?php 
if (!isset($_POST)){
    exit(header('Location: form.html'));
}
else{
    session_start();

    /*retrieve del formulario*/ 
    $fecha = date('Y-m-d H:i:s');
    $nombre= $_POST["name"];
    $mail= $_POST["email"];
    $producto= $_POST["product"];
    $mes= $_POST["month"];
    $cantidad= $_POST["quantity"];

    /*tema de almacenar multiples form en una variable */
    if(!isset($_SESSION["pedidos"])){
        $_SESSION["pedidos"]= array();
    }
    $_SESSION["pedidos"][$fecha]=["name" => $nombre
                                    ,"mail" => $mail
                                    ,"producto" => $producto
                                    ,"cantidad" => $cantidad
                                    ,"mes" => $mes] ;
    
    /*conexión con la base de datos e inserción*/ 
    $link=mysqli_connect('localhost','root');
    mysqli_select_db($link,'pedidos');
    
    /*comprobación de que no haya otro*/
    $query="SELECT * FROM pedidos WHERE mail='".$mail."' AND mes='".$mes."' AND cantidad='".$cantidad."'";
    $id= mysqli_query($link, $query);
    if (mysqli_num_rows($id)>0){
        echo "usted ya realizó el mismo pedido anteriormente!";
    }
    else{
    /* bueno acá podríamos hacer un foreach para hacer una consulta por coso pero alta paja*/
    $query="INSERT INTO pedidos (fecha,nombre,mail,producto,mes,cantidad) VALUES ('".$fecha."','".$nombre."','".$mail."','".$producto."','".$mes."','".$cantidad."')";
    if(mysqli_query($link,$query)){
        echo "Se añadio el pedido correctamente";
    } else {
        echo "Error: " . mysqli_error($link);
    }
    mysqli_close($link);
    }
    /*tema cookie */
    setcookie("lastRegister", "$fecha", time()+60*60*24*360);
    
    session_destroy();
}
?>