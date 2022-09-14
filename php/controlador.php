<?php
    include 'conection.php';
    if(!empty($_POST["btnlogin"])){
        if(empty($_POST["username"]) and empty($_POST["password"])){
            echo "<p>Por favor ingrese su usuario y contraseña</p>";
        } else {
            session_start();
            $usuario = $_POST["username"];
            $password = $_POST["password"];

            $sql = $con->query("SELECT * FROM usuarios WHERE user = '$usuario' AND password = '$password'");
            
            if ($datos=$sql->fetch_assoc()) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $usuario;
                header("location: ../admin-menu/index.php");
            } else {
                echo "<p>Usuario y contraseña incorrectos</p>";
            }

        }
    }
?>