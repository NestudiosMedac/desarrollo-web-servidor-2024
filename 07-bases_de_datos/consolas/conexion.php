<?php
    $_servidor = "127.0.0.1";//o "localhost, que realmente es un alias"
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "consolas_bd";

    // mysqli ó PDO

    $_conexion = new mysqli($_servidor,$_usuario,$_contrasena, $_base_de_datos) //instancia un objeto
        or die("Error de conexión");//y si no se estancia porque le falta un atributo, muere
?>