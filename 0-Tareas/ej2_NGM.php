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
<h1> EJERCICIO 2:</h1>
<p>Realiza un formulario que reciba 3 números: a, b y c. 
Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.
Por ejemplo, si a = 3, b = 10, c = 2
Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10</p>
    <form action="" method="post">
        <label for="a">Primer número</label>
        <input type="text" name="a" id="a" placeholder="Escribe el primer número">

        <label for="b">Segundo número</label>
        <input type="text" name="b" id="b" placeholder="Escribe el segundo número">

        <label for="c">Tercer número</label>
        <input type="text" name="c" id="c" placeholder="Escribe el tercer número">
        <br><br>
         <input type="submit" value="Enviar">
    </form>
    
</body> 
<?php
/**
* EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.
*Por ejemplo, si a = 3, b = 10, c = 2
*Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10
*/
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $a=(int)$_POST["a"];
    $b=(int)$_POST["b"];
    $c=(int)$_POST["c"];
    $multi="";
        for($i=$a;$i<=$b;$i++){
            if($i % $c == 0){
                if($i == $b){
                $multi.="y ".$i.".";
                }else{
                $multi.="".$i.", ";
            }
            }
        }
        echo "<p>Los múltiplos de $c entre $a y $b son: $multi</p>";

}
?>
</html>
