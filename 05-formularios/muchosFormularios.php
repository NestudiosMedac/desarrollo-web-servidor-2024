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
if (isset($_POST["accion"]) && $_POST["accion"] == "formulario_ejemplo"){
    $mensaje = $_POST["mensaje"];
    $veces = $_POST["veces"];

    hacerEjemplo($mensaje,$veces); /* aqui es donde se llama la funcion */
}

?>
<form action="" method="post">
    <label for="base">Base</label><!---el for e id estan linkeados-->
    <input type="text" name="base" id="base" placeholder="Introduce la base">
    <label for="exponente">Exponente</label><!---el for e id estan linkeados-->
    <input type="text" name="exponente" id="exponente" placeholder="Introduce el exponente"><br><br>
    <input type="hidden" name="accion" value="formulario_potencias">
    <input type="submit" value="Calcular">
    </form>


    <?php
if (isset($_POST["accion"]) && $_POST["accion"] == "formulario_potencias"){
    $base = $_POST["base"];
    $exponente = $_POST["exponente"];
    $res = 1;

    hacerPotencias($base,$exponente, $res); /* aqui es donde se llama la funcion */
}

?>

<form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <br><br>
    <input type="hidden" name="accion" value="formulario_iva">
        <input type="submit" value="Calcular">
    </form>
    <?php
if (isset($_POST["accion"]) &&  $_POST["accion"] == "formulario_iva"){
    $precio = $_POST["precio"];
    $iva = $_POST["iva"];
    
    hacerIva($precio,$iva); /* aqui es donde se llama la funcion */
}

?>

  <form action="" method="post">
    <label for="num">Numero</label><!---el for e id estan linkeados-->
    <input type="text" name="num" id="num" placeholder="Introduce un numero">
    <input type="hidden" name="accion" value="formulario_tablamulti"><!-- select.php -->
    <input type="submit" name="operar">
    </form>
    <br>

<table>
                <caption>Tabla de multiplicar</caption>
                <thead>
                    <tr>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    if(isset($_POST["accion"]) && $_POST["accion"] == "formulario_tablamulti"){

                        $num = $_POST["num"];
                        $res=0;
                        hacerMulti($num,$res);
                    }
                    ?>
                </tbody>
            </table>
</body>
</html>




