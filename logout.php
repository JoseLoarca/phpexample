<?php
session_start();

session_destroy();
echo "<script>
                window.location.replace('http://localhost:8083/PHPLoginExample/login.php');
       </script>";