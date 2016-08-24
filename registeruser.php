<?php
/**
 * Created by PhpStorm.
 * User: jose_
 * Date: 8/22/2016
 * Time: 10:06 PM
 */
include("dbconnection.php");
if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {

    $conn = mysqli_connect($host, $user, $password, $db)
    or die("No se ha podido conectar al servidor..");

    if ($conn == false) {
        die("ERROR AL CONECTAR. " . mysqli_connect_error());
    }

    $nombre = $_POST['nombre'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query = "INSERT INTO usuario(nombre, username, password)
                  VALUES('$nombre','$username','$password')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/registereduser.php');
              </script>";
    } else {
        echo "ERROR AL INSERTAR DATOS";
    }
}else{
    echo "Verifique sus datos.";
}