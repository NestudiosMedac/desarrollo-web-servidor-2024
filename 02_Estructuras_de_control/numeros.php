<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
</head>
<body>
    <?php
    /*If  */
    $numero = 2;
    if ($numero>0){
        echo "<p> 1 El Número $numero es mayor que cero</p>";
    }
    if ($numero>0) echo "<p> 2 El Número $numero es mayor que cero</p>";
    
    if ($numero>0):
        echo "<p> 3 El Número $numero es mayor que cero</p>";
    endif;
/*If else */
    $numero = 9;
    if ($numero>0){
        echo "<p> 1 El Número $numero es mayor que cero</p>";
    } else{
        echo "<p> 1 El Número $numero es menor que cero</p>";

    }
    $numero = 9;
    if ($numero>0) echo "<p> 1 El Número $numero es mayor que cero</p>";
    else echo "<p> 1 El Número $numero es menor que cero</p>";
/*If else if */
$numero = 9;
if ($numero>0){
    echo "<p> 1 El Número $numero es mayor que cero</p>";
} elseif ($numero == 0){
    echo "<p> 1 El Número $numero es cero</p>";

}else{
    echo "<p> 1 El Número $numero es menor que cero</p>";
}

$numero = 9;
if ($numero>0):
    echo "<p> 3 El Número $numero es mayor que cero</p>";
elseif($numero == 0):
    echo "<p> 3 El Número $numero es igual a cero</p>";
else:
    echo "<p> 3 El Número $numero es menor que cero</p>";
endif;
    ?>
    <?php
    #Rangos [-10,0),[0,10](10,20]    , parentesis no incluye, corchetes si.
    $num=-7;
    if($num >=-10 and $num <=0)#tambien se puede usar &&
    {
        echo "<p>El numero $num esta en el rango [-10,0)</p>";
    }elseif($num >= 0 and $num <= 10){
        echo "<p>El numero $num esta en el rango [0,10]</p>";
    }elseif($num >= 10 and $num <= 20){
        echo "<p>El numero $num esta en el rango (10,20]</p>";
    } else{
        echo "<p>El numero $num no esta en del rango</p>";

    }

    $num=-7;
    if($num >=-10 and $num <=0):
        echo "<p>El numero $num esta en el rango [-10,0)</p>";
    elseif($num >= 0 and $num <= 10):
        echo "<p>El numero $num esta en el rango [0,10]</p>";
    elseif($num >= 10 and $num <= 20):
        echo "<p>El numero $num esta en el rango (10,20]</p>";
    else:
        echo "<p>El numero $num no esta en el rango</p>";
    endif;

    $numero_aleatorio = rand(1,200); #  [1,200]
    $digitos=0;
    echo "<p>El numero es $numero_aleatorio </p>";

    if($numero_aleatorio>99){
        $digitos=3;
    }elseif($numero_aleatorio<=99 and $numero_aleatorio>9){
        $digitos=2; 
    }else{
        $digitos=1;
    }
    $digito_texto="digitos";

    if(digito==1) $digito_texto="digito";
    echo "<p>El numero $numero_aleatorio tiene $digito $digito_texto </p>";
// VERSION CON MATCH

$digitos = match(true){
    $numero_aleatorio>99=>3,
    $numero_aleatorio<=99 and $numero_aleatorio>9=>2,
    default=>1
};
    $n = rand(1,3);
    switch($n){
        case 1:
            echo "El número es 1";
            break; # si  no esta el break se ejecuta el uno y el dos y se ven juntos
        case 2:
            echo "El número es 2";
            break;    
        default:
            echo "El numero es 3";
    }


    ?>
</body>
</html>