<?php
/**
 * Created by PhpStorm.
 * User: jose_
 * Date: 8/24/2016
 * Time: 11:10 AM
 */
include("dbconnection.php");
if(isset($_POST['nombreRaza']) && !empty($_POST['nombreRaza']) &&
    isset($_POST['descripcion']) && !empty($_POST['descripcion'])){

    $conn = mysqli_connect($host, $user, $password, $db)
    or die("No se ha podido conectar al servidor..");

    if ($conn == false) {
        die("ERROR AL CONECTAR. " . mysqli_connect_error());
    }

    $nombreRaza = $_POST['nombreRaza'];
    $descripcion = $_POST['descripcion'];

    $sql_query = "INSERT INTO razasperros(nombreRaza, descripcion) VALUES('$nombreRaza', '$descripcion')";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/registeredbreed.php');
              </script>";
    }else {
        echo "ERROR AL INSERTAR DATOS";
    }
}else{
    echo "ERROR AL INSERTAR DATOS";
}