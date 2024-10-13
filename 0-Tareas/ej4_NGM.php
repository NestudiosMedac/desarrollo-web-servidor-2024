<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<h1> EJERCICIO 4:</h1>
<p>Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.
Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.</p>
    <form action="" method="post">
        <label for="Temperatura">Temperatura</label>
        <input type="text" name="temp" id="Temperatura" placeholder="Escribe la temperatura que deseas convertir">

        <select name="unidad">
         <option value="c">CELSIUS</option>
         <option value="k">KELVIN</option>
         <option value="f">FAHRENHEIT</option>
       </select>
       <select name="pasar">
         <option value="pc">CELSIUS</option>
         <option value="pk">KELVIN</option>
         <option value="pf">FAHRENHEIT</option>
       </select>
        <br><br>
         <input type="submit" value="Cambiar">
    </form>
    
</body> 
<?php
/**
* EJERCICIO 3:Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).
*/

  if ($_REQUEST['unidad'] == "c") {
    $temp=$_REQUEST['temp'];
        if($_REQUEST['pasar'] == "pf"){
            $res = ($temp * 9 / 5) + 32;
            echo "$temp ºC son $res ºF";
        }elseif($_REQUEST['pasar'] == "pk"){
            $res = $temp + 273.15;
            echo "$temp ºC son ".$res." K";
        }else{
            echo "$temp ºC ya son Celsius";
        }
    }
  if ($_REQUEST['unidad'] == "k") {
    $temp=$_REQUEST['temp'];
        if($_REQUEST['pasar'] == "pf"){
            $res = ($temp - 273.15) * 9 / 5 + 32;
            echo "$temp K son $res ºF";
        }elseif($_REQUEST['pasar'] == "pc"){
            $res = $temp - 273.15;
            echo "$temp K son ".$res." Celsius";
        }else{
            echo "$temp K ya está en Kelvin";
        }
    }
    if ($_REQUEST['unidad'] == "f") {
    $temp=$_REQUEST['temp'];
        if($_REQUEST['pasar'] == "pc"){
            $res = ( $temp - 32) * 5 / 9;
            echo "$temp ºF son $res Celsius";
        }elseif($_REQUEST['pasar'] == "pk"){
            $res = ( $temp - 32) * 5 / 9 + 273.15;
            echo "$temp ºF son ".$res." Kelvin";
        }else{
            echo "$temp ºF ya está en Farenheit";
        }
    }
?>
</html>
