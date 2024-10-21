<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <?php
     error_reporting( E_ALL );
     ini_set( "display_errors", 1 );  
    // en otro fichero nuevo(muchos formularios), poner todos los demas formularios y hacerlo con funciones / hacerlo por lo menos con 5
    require('../06-funciones/muchasFunciones.php'); /* para linkear la funcion */
    ?>
</head>
<body>
<form action="" method="post"><!--Sin nada es singlepage, con el fichero php es multipage-->
    
    <input type="text" name="mensaje">
    <input type="text" name="veces">
    <input type="hidden" name="accion" value="formulario_ejemplo">
    <input type="submit" value="Enviar">

</form>
<?php
if ($_POST["accion"] == "formulario_ejemplo"){
    $mensaje = $_POST["mensaje"];
    $veces = $_POST["veces"];

    hacerEjemplo($mensaje,$veces); /* aqui es donde se llama la funcion */
}

?>
</body>
</html>




