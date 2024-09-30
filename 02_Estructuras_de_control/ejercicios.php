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
    <!--Ejercicio 1: mostrar la fecha actual con el siguiente formato:
        Viernes 27 de Septiembre de 2024
        Utilizar estructuras de control-->

        <?php
        $dia_escrito=date("l");
        $dia_escrito_espanol=match($dia_escrito){
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Diciembre"
         };
         $mes=date("n");
         $mes_espanol=match($mes){
            "1" => "Enero",
            "2" => "Febrero",
            "3" => "Marzo",
            "4" => "Abril",
            "5" => "Mayo",
            "6" => "Junio",
            "7" => "Julio",
            "8" => "Agosto",
            "9" => "Septiembre",
            "10" => "Octubre",
            "11" => "Noviembre",
            "12" => "Diciembre",
             };
        $dia_numero=date("j"); 
        $anio=date("Y");
        
        
        echo"$dia_escrito_espanol $dia_numero de $mes_espanol de $anio";
        /*Ejercicio 2: Mostrar en una lista los numeros multiplos de 3 usando while e if
        Ejercicio 3: calcular los numeros pares entre 1 y 20
        Ejercicio 4: calcular el factorial de 6 con while*/


   $contador=0;
   while($contador<10){
       $contador++;
       if($contador % 3==0){
           echo "<p>$contador es multiplo</p>";
       }else{
           echo "<p>$contador no es multiplo</p>";
       }
   }


   $suma=0;
   for($i=1; $i<=20; $i++){
       if($i % 2==0){
           echo "<p>$i es par</p>";
           $suma=$suma+$i;
       }else{
           echo "<p>$i no es par</p>";
       }
   }
   echo "<p>La suma de los números pares es $suma</p>";




   $cont=0;
   $fact=1;
   while($cont<6){
       $cont++;
       $fact=$fact*$cont;
   }
   echo "<p>El factorial de 6 es $fact</p>";
        ?>
</body>
</html>