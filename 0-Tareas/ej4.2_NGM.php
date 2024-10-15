<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        # Para que se muestre el error
        error_reporting(E_ALL);
        ini_set("display_errors", 1);    
    ?>
</head>
<body>
<h1> EJERCICIO 4:</h1>
<p>Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.</p>

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
    <input type="submit" value="Convertir">
</form>

</body>

<?php
/**
 * EJERCICIO 4: Conversor de temperaturas
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = (float)$_POST['temp'];  // Asignación usando POST como en el primer código
    $unidad = $_POST['unidad'];
    $pasar = $_POST['pasar'];
    
    // Conversión basada en la unidad de entrada
    switch ($unidad) {
        case "c":  // Celsius
            if ($pasar == "pf") {
                $res = ($temp * 9 / 5) + 32;
                echo "$temp ºC son $res ºF";
            } elseif ($pasar == "pk") {
                $res = $temp + 273.15;
                echo "$temp ºC son $res K";
            } else {
                echo "$temp ºC ya está en Celsius";
            }
            break;
        
        case "k":  // Kelvin
            if ($pasar == "pf") {
                $res = ($temp - 273.15) * 9 / 5 + 32;
                echo "$temp K son $res ºF";
            } elseif ($pasar == "pc") {
                $res = $temp - 273.15;
                echo "$temp K son $res ºC";
            } else {
                echo "$temp K ya está en Kelvin";
            }
            break;

        case "f":  // Fahrenheit
            if ($pasar == "pc") {
                $res = ($temp - 32) * 5 / 9;
                echo "$temp ºF son $res ºC";
            } elseif ($pasar == "pk") {
                $res = ($temp - 32) * 5 / 9 + 273.15;
                echo "$temp ºF son $res K";
            } else {
                echo "$temp ºF ya está en Fahrenheit";
            }
            break;
    }
}
?>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        # Para que se muestre el error
        error_reporting(E_ALL);
        ini_set("display_errors", 1);    
    ?>
</head>
<body>
<h1> EJERCICIO 4:</h1>
<p>Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.</p>

<form action="" method="post">
    <label for="Temperatura">Temperatura</label>
    <input type="text" name="temp" id="Temperatura" placeholder="Escribe la temperatura que deseas convertir">

    <select name="unidad_origen">
        <option value="celsius">CELSIUS</option>
        <option value="kelvin">KELVIN</option>
        <option value="fahrenheit">FAHRENHEIT</option>
    </select>

    <select name="unidad_destino">
        <option value="celsius">CELSIUS</option>
        <option value="kelvin">KELVIN</option>
        <option value="fahrenheit">FAHRENHEIT</option>
    </select>

    <br><br>
    <input type="submit" value="Convertir">
</form>

</body>

<?php
/**
 * EJERCICIO 4: Conversor de temperaturas
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = (float)$_POST['temp'];  
    $unidad_origen = $_POST['unidad_origen'];
    $unidad_destino = $_POST['unidad_destino'];
    
    // Inicializa la variable resultado
    $resultado = $temp;

    // Si la unidad de origen es Celsius
    if ($unidad_origen == "celsius") {
        if ($unidad_destino == "fahrenheit") {
            $resultado = ($temp * 9 / 5) + 32;
        } elseif ($unidad_destino == "kelvin") {
            $resultado = $temp + 273.15;
        }

    // Si la unidad de origen es Kelvin
    } elseif ($unidad_origen == "kelvin") {
        if ($unidad_destino == "fahrenheit") {
            $resultado = ($temp - 273.15) * 9 / 5 + 32;
        } elseif ($unidad_destino == "celsius") {
            $resultado = $temp - 273.15;
        }

    // Si la unidad de origen es Fahrenheit
    } elseif ($unidad_origen == "fahrenheit") {
        if ($unidad_destino == "celsius") {
            $resultado = ($temp - 32) * 5 / 9;
        } elseif ($unidad_destino == "kelvin") {
            $resultado = ($temp - 32) * 5 / 9 + 273.15;
        }
    }

    // Muestra el resultado
    echo "$temp $unidad_origen son $resultado $unidad_destino";
}
?>
</html>

