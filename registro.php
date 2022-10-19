<?php
session_start();
$usuario=$_POST["usuario"];
$_SESSION["usuario"]=$usuario;
$contraseña=$_POST["contraseña"];
 



if (($usuario=="admin" && $contraseña=="1234") || ($usuario=="cliente1" && $contraseña=="1234")){
    $_SESSION["autorizado"]=true;
    if($_POST["usuario"]=="admin"){
        $_SESSION["correcto"]== "admin";
        header("Location:menuprincipal.php");
    }else{
        $_SESSION["correcto"]="cliente1";
        header("Location:menuprincipal.php");
    }
}else{
    echo("Fallo al meter su nombre o contraseña");
}

    





