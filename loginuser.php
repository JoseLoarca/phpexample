<?php
/**
 * Created by PhpStorm.
 * User: jose_
 * Date: 8/23/2016
 * Time: 12:06 PM
 */
session_start();
include ("dbconnection.php");
if(isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])){

    $username = $_POST['username'];

    $conn = mysqli_connect($host, $user, $password, $db)
    or die("No se ha podido conectar al servidor..");

    $sql_query = "SELECT username, password FROM usuario WHERE username='$username'";

    $sel = mysqli_query($conn, $sql_query);

    $session = mysqli_fetch_array($sel);

    if($_POST['password'] == $session['password']){
        $_SESSION['username'] = $_POST['username'];
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/dashboardfilter.php');
              </script>";
    }else{
        echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/loginerror.php');
              </script>";
    }

}else{
    /*echo "DATOS NO VALIDOS";*/
}
