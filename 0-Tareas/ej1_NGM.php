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
    <h1> EJERCICIO 1:</h1>
    <p>Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.</p>
    <form action="" method="post">
        <label for="num1">Primer número</label>
        <input type="text" name="num1" id="num1" placeholder="Escribe el primer número">

        <label for="num2">Segundo número</label>
        <input type="text" name="num2" id="num2" placeholder="Escribe el segundo número">

        <label for="num3">Tercer número</label>
        <input type="text" name="num3" id="num3" placeholder="Escribe el tercer número">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /**
     * EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.
    */
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $mayor=$num1;
    
        if($num2>$mayor){
            $mayor=$num2;
        }elseif($num3>$mayor){
            $mayor=$num3;
        }else{
        // por lógica si la variable es el num1 en principio y si llega hasta el else la variable de apoyo sigue mayor sigue siendo num1
        }
        echo "<h1>El $mayor es el mayor</h1>";
    }    
    ?>
</body>
</html>
