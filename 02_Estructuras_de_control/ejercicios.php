<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
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
        /*Ejercicio 2: Mostrar en una lista los numeros multiplos de 3 usando while e if entre 1 y 100
        Ejercicio 3: calcular los numeros pares entre 1 y 20
        Ejercicio 4: calcular el factorial de 6 con while
        usar HTML de aqui en adelante*/ 

# ejercicio 2
   $contador=1;
   echo"<ul>";
   while($contador<100){
      
       if($contador % 3==0)echo "<li>$contador </li>";
       $contador++;
   }
   echo"<ul>";
# ejercicio 3 deberia de haber sido con while

   $suma=0;
   for($i=1; $i<=20; $i++){
       if($i % 2==0){
           echo "<p>$i es par</p>";
           $suma+=$i;
        }
    }
   echo "<p>La suma de los números pares es $suma</p>";



# ejercicio 4

   $cont=0;
   $fact=1;
   while($cont<6){
       $cont++;
       $fact*=$cont;
   }
   echo "<p>El factorial de 6 es $fact</p>";
   ?>
 <h3>Ejercicio 5</h3>
            $boolean=false;
            $boolean=false;
 <p>Muestra por pantalla los 50 primeros numeros primos</p><!-- 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 53, 59, 61, 67. 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 
 131, 137, 139, 149, 151, 157, 163,  167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229-->
 <?php
  /* 
   4%2=0 4 NO ES PRIMO
   4%3=1

   5%2=1 5 SI ES PRIMO True
   5%3=2
   5%4=1

  */
 $n=2;
 $contador=1;
$numerosPrimos=0;
echo"<ol>";
 
while($numerosPrimos<50){
    $boolean=true;
    for($z=2; $z<$n; $z++){
        if($n%$z==0){
            $boolean=false;
            break;
        }
    }
    if($boolean){
        $numerosPrimos++;
        echo "<li>$n</li>";
    }
    $n++;
 }
 echo"</ol>";
 ?>

        


</body>
</html>