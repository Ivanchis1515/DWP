<?php
    function conexiones($email, $contraseña){
        $conectar = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conectar, "cla");
        $sql = "SELECT * FROM usuarios WHERE correo = '$email' AND contra = '$contraseña'";
        $query = mysqli_query($conectar, $sql);
        if(mysqli_num_rows($query) != 0) {
            // Usuario válido, iniciar sesión
            session_start();
            $_SESSION["usuario"] = $email;
            return true;
        } else {
            // Usuario inválido
            return false;
        }
    }

    function tipo($email, $contraseña) {
        $conectar = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conectar, "cla");
        $sql = "SELECT tipo FROM usuarios WHERE correo = '$email' AND contra = '$contraseña' LIMIT 1";
        $query = mysqli_query($conectar, $sql);
    
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            return $row["tipo"];
        } else {
            return false; // Usuario no encontrado o consulta fallida
        }
    }

    function verificar(){
        session_start();
        if($_SESSION["usuario"]){
            return true;
        }
    }
?>