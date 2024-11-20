<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $numero="2";
    $numero=(int) $numero;

    if($numero === 2){
        echo "Exito";
    }else{
        echo "No exito";
    }
    
    /*
    "2" !== 2 --> "2" no es identico a 2   TRUE
    "2" == 2 --> "2" es igual a 2          TRUE  
     2 === 2 --> 2 es identico a 2         TRUE
     2 !== 2.0 --> 2 no es identico a 2.0  TRUE

    === significa que es IDENTICO, si no es IDENTICO HASTA EN TIPO no entra en la condicion
     */
    $hora = (int)date("G"); #   (int) es solo para castear
    //var_dump($hora); #    es para depurar var_dump

    /*
    SI $hora ENTRE 6 y 11, es MAÑANA
    SI $hora ENTRE 12 y 14, es MEDIODIA
    SI $hora ENTRE 15 y 20, es TARDE
    SI $hora ENTRE 21 y 0, es NOCHE
    SI $hora ENTRE 1 y 5, es MADRUGADA
    */

    if($hora >= 6 && $hora<= 11){
        echo "MAÑANA";
    }elseif($hora >= 12 && $hora<= 14){
        echo "MEDIODIA";
    }elseif($hora >= 15 && $hora<= 20){
        echo "TARDE";
    }elseif($hora >= 21 && $hora == 0){
        echo "NOCHE";
    }else{
        echo "MADRUGADA";

    }


    $hora_exacta = date("H:i:s");
    echo "<p>$hora_exacta </p>";

    $dia = date("1");
    echo "<p>Hoy es $dia </p>";

    /*
    TEMOS CLASE LUNES, MIERCOLES Y VIERNES NO TENEMOS CLASE EL RESTO
    HACER UN SWITCH QUE DIGA SI HOY TENEMOS CLASE 
    */
    $diaclase = date("l");
    switch($diaclase){
        case "Monday":
        case "Wednesday": 
        case "Friday":
            echo "Hay clase";
            break; 
        default:
            echo "No hay clase";
    }

    /*EJERCICIO ANTERIOR EN ESPAÑOL*/
    $clase = date("l");
    switch($clase){
        case "Monday":
            $clase="Lunes";
            break; 
        case "Tuesday":
            $clase="Martes";
            break; 
        case "Wednesday":
            $clase="Miercoles";
            break;  
        case "Thursday":
            $clase="Jueves";
            break; 
        case "Friday":
            $clase="Viernes";
            break; 
        case "Saturday":
            $clase="Sabado";
            break;  
        case "Sunday": 
            $clase="Domingo";
            break; 
    }
    switch($clase){
        case "Lunes":
        case "Miercoles": 
        case "Viernes":
            echo "\n Hay clase";
            break; 
        default:
        echo "\n No hay clase";

            
    }
    $dia=date("l");
    $dia_espanol=null;

    $dia_espanol=match($dia){
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Saturday" => "Sábado",
        "Domingo" => "Domingo"
    };

    $n = rand(1,3);

    switch($n){
        case 1:
            echo "El numero es 1";
            break; 
        case 2:
            echo "El numero es 2";
            break; 
        default:
        echo "\n No hay clase";
    };

    $resultado= match(1){

    };

    ?>
</body>
</html>