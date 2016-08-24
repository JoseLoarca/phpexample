<?php
/**
 * Created by PhpStorm.
 * User: jose_
 * Date: 8/24/2016
 * Time: 3:33 PM
 */
include ("dbconnection.php");
if(isset($_POST['id']) && !empty($_POST['id']) &&
   isset($_POST['nombreRaza']) && !empty($_POST['nombreRaza']) &&
   isset($_POST['descripcion']) && !empty($_POST['descripcion'])){

    $conn = mysqli_connect($host, $user, $password, $db)
    or die("No se ha podido conectar al servidor..");

    if ($conn == false) {
        die("ERROR AL CONECTAR. " . mysqli_connect_error());
    }

    $id = $_POST['id'];
    $nombreRaza = $_POST['nombreRaza'];
    $descripcion = $_POST['descripcion'];

    $sql_query = "UPDATE razasperros SET nombreRaza = '$nombreRaza', descripcion = '$descripcion' WHERE id = '$id'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/updatedelement.php');
              </script>";
    }else{
        echo "ERROR AL MODIFICAR DATOS";
    }
}else{
    echo "VERIFIQUE SUS DATOS";
}