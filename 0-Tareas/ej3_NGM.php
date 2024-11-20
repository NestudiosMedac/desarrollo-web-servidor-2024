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
<h1> EJERCICIO 3:</h1>
<p>Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).</p>
    <form action="" method="post">
        <label for="a">Primer número</label>
        <input type="text" name="a" id="a" placeholder="Escribe el primer número">

        <label for="b">Segundo número</label>
        <input type="text" name="b" id="b" placeholder="Escribe el segundo número">

        <br><br>
         <input type="submit" value="Enviar">
    </form>
    
</body> 
<?php
/**
* EJERCICIO 3:Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).
*/
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $a=(int)$_POST["a"];
    $b=(int)$_POST["b"];
    $n=2;
    echo"<ol>";
   for($j= $a; $j<=$b; $j++){
       $boolean=true;
       for($z=2; $z<$j/2; $z++){
           if($j%$z==0){
               $boolean=false;
               break;
           }
       }
       if($boolean){
           echo "<li>$j</li>";
       }
    }
    echo"</ol>";    
}
?>
</html>


        