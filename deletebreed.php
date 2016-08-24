<?php
/**
 * Created by PhpStorm.
 * User: jose_
 * Date: 8/24/2016
 * Time: 11:50 AM
 */
include ("dbconnection.php");
if(isset($_POST['id']) && !empty($_POST['id'])){

    $conn = mysqli_connect($host, $user, $password, $db)
    or die("No se ha podido conectar al servidor..");

    if ($conn == false) {
        die("ERROR AL CONECTAR. " . mysqli_connect_error());
    }

    $id = $_POST['id'];

    $sql_query = "DELETE FROM razasperros WHERE id = '$id'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/deletedbreed.php');
              </script>";
    }else{
        echo "ERROR AL ELIMINAR DATOS";
    }
}else{
    echo "ERROR AL PROCESAR SOLICITUD.";
}