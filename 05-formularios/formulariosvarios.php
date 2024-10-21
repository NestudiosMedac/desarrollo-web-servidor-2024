<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varios formularios</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
          require('../06-funciones/temperaturas.php'); /* para linkear la funcion */
          require('../06-funciones/edades.php'); /* para linkear la funcion */

          
    ?>
</head>
<body>
<h1>Formulario temperaturas</h1>
<form action="" method="post">
        <input type="number" name="temperatura" placeholder="temperatura"><br><br> <!-- si pones number en vez de text sale asi -->
        <label>Unidad inicial: </label>
        <select name="unidad_inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <label>Unidad final: </label>
        <select name="unidad_final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <input type="hidden" name="accion" value="formulario_temperaturas"><!-- input oculto para saber que form quiero escoger -->
        <input type="submit" value="Convertir">
    </form>
    <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

if ($_POST["accion"] == "formulario_temperaturas"){
    $temperatura = $_POST["temperatura"];
    $inicial = $_POST["unidad_inicial"];
    $final = $_POST["unidad_final"];

    convertirTemperatura($temperatura,$inicial,$final); /* aqui es donde se llama la funcion */
}
}

    ?>
    <h1>Formulario edades</h1>
<form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edades">
        <input type="submit" value="Enviar">
    </form>

    <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST["accion"] == "formulario_edades"){/* nombre del input oculto antes */
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        comprobarEdad($nombre, $edad);
    }
/* 
    if ($_POST["accion"] == "formulario_temperaturas"){
        $temperatura = $_POST["temperatura"];
        $inicial = $_POST["unidad_inicial"];
        $final = $_POST["unidad_final"];

        convertirTemperatura($temperatura,$inicial,$final); /* aqui es donde se llama la funcion
    } */
}
// en otro fichero nuevo(muchos formularios), poner todos los demas formularios y hacerlo con funciones / hacerlo por lo menos con 5
  ?>
</body>
</html>