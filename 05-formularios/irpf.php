<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post"><!--Sin nada es singlepage, con el fichero php es multipage-->
    
    <input type="text" name="salario">
    <input type="submit" value="Enviar">

</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $bolsa=0;
    $salario=$_POST["salario"];

    $tramo1=12450-(12450*0.19);
    $tramo2=20199-(20199*0.24);
    $tramo3=35199-(35199*0.30);
    $tramo4=59999-(59999*0.37);
    $tramo5=299999-(299999*0.45);
    $tramo6=300000-(300000*0.47);



    $irpf=match($salario){
        $salario<=12450 =>  $salario-$tramo1,
        $salario>12450 && $salario<=20199  => $salario-$tramo1+$tramo2 ,
        $salario>20200 && $salario<=35199  => $salario- $tramo1+$tramo2+$tramo3 ,
        $salario>35199 && $salario<=59999 => $salario-$tramo1+$tramo2+$tramo3-$tramo4 ,
        $salario>60000 && $salario<=299999 => $salario-$tramo1+$tramo2+$tramo3-$tramo4+$tramo5,
        $salario>300000 => $salario-$tramo1+$tramo2+$tramo3-$tramo4+$tramo5+$tramo6 ,
         };
    echo "<p>El sueldo bruto es: $irpf</p>";
}



?>

</body>
</html>