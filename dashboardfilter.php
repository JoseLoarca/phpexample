<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/dashboard.php');
          </script>";
}else{
    echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/unauthorized.php');
          </script>";
}