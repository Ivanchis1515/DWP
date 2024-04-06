<?php 
    include("funciones.php");
    if(verificar()){
        session_unset();
        session_destroy();
        header("Location: ../sesion.html");
    }
    else{
        header("Location: ../index.html");
    }
?>