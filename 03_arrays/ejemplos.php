<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
  <?php
  /*TODOS LOS ARRAYS EN PHP SON ASOCIATIVOS, COMO LOS MAP DE JAVA
    TIENEN PARES CLAVE-VALOR*/
    $numeros=[5,10,9,6,7,4];
    $numeros= array(6,10,9,4,3);
    print_r($numeros);# PRINT RELATIONAL
    echo"<br><br>";
    //$animales=["Perro","Gato","Ornitorrinco","Suricato","Capibara"];
   /* $animales =[
        "A01"=> "Perro",
        "A02"=> "Gato",
        "A03"=> "Ornitorrinco",
        "A04"=> "Suricato",
        "A05"=> "Capibara",

    ];*/

    $animales =[//solo usar String o entero
        /*1.4=>*/   "Perro",
        /*true=>*/  "Gato",
       /*false=> */ "Ornitorrinco",
       /* 2e2=> */  "Suricato",
        /*"A05"=>*/ "Capibara",

    ];//tambien puede ser con ();
   // print_r($animales);
   echo "<p>".$animales[3]."</p>";

   $animales[2]="Koala";//AÑADE
   $animales[6]="Iguana";
   $animales["A01"]="Elefante";// no son posiciones, son CLAVES
   array_push($animales,"morsa","Foca");//SIN CLAVE
   $animales[]="Ganso";//es igual que un array push
   unset($animales [1]);//para eliminar al gato que seria el 1
   array_values($animales);//quita las claves e indexa el array numericamente
   print_r(array_values($animales));//solamente lo representa pero no lo modifico
   print_r($animales);
   $animales2=array_values($animales);//asi crearias un array con esas posiciones ordenadas y olvidandonos de las claves, tamb podrias poner $animales para sobreescribir
   print_r($animales2);
   $cantidad_animales=count($animales);//el .length no existe en php existe el count
   echo "<h1>Hay $cantidad_animales animales</h1>";
   /*
   *  "4312 TDZ"=> "Audi TT";
   *  "1122 FFF"=> "Mercedes CLR";
   * 
   *    CREAR EL ARRAY CON 3 COCHES
   *    AÑADIR 2 COCHES CON SUS MATRICULAS
   *    AÑADIR UN COCHE SIN MATRICULA
   *    BORRAR EL COCHE SIN MATRICULA
   *    RESETEAR LAS CLAVES Y ALMACENAR EL RESULTADO EN OTRO ARRAY
   *  
   */

  $coches =[
        "6872 XXX"=> "Seat Ibiza",
        "6712 PHP"=> "Seat Panda",
        "6000 MMM"=> "Peugeot 207"
  ];
  /*$coches["6872 XXX"]="Seat Ibiza";
  $coches["6712 PHP"]="Seat Panda";
  $coches["6000 MMM"]="Peugeot 207";*/
  array_push($coches,"Porsche Panamera");
  print_r($coches);
  unset($coches[0]);
  echo "<br><br>";
  print_r($coches);
  $coches2=array_values($coches);
  echo "<br><br>";
  print_r($coches2);

  echo "<h1>Recorrer una lista con FOR</h1>";
  
  echo "<ol>";
  for($i=0; $i<count($animales2); $i++){
     echo"<li>". $animales2[$i] ."</li>";
  }
  echo "</ol>";
  $cantidad_animales2= count($animales2);
  echo "<h1>Hay $cantidad_animales2 animales</h1>";

  echo "<h1>Recorrer una lista con WHILE</h1>";

  echo "<ol>";
    $i=0;
    while($i< count($animales)){
    echo "<li>".$animales[$i]."</i>";
    $i++;
    }
    echo "</ol>";

  echo "<h1>Recorrer una lista con FOREACH</h1>";

    echo "<ol>";
    foreach($coches as $coche){//as es alias
        echo "<li>$coche</i>";

    }
    echo "</ol>";

    echo "<ol>";
    foreach($coches as $matricula=>$coche){//as es alias
        echo "<li>$matricula, $coche</i>";

    }
    echo "</ol>";
  ?>  

  <table>
        <caption>Coches</caption>
        <thead>
            <tr><!--columnas--->
                <th>Matrícula</th>
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>6872 XXX</td>
                <td>Ferrari 355</td>
            </tr>
            <?php
                //esta es la basica
                foreach($coches as $matricula=>$coche){//as es alias
                    echo "<tr>",
                            "<td>$matricula</td>",
                            "<td>$coche</td>",
                         "</tr>";//mejor separado en echos estando la palabra echo una debajo de otra
                }
            
            ?>
           
            <?php
                //esta para base de datos, acostumbrarse
                foreach($coches as $matricula=>$coche) { ?>
                        <tr>
                            <td><?php echo $matricula?></td>
                            <td><?php echo$coche?></td>
                         </tr>
                        <?php } ?>
    
        </tbody>
  </table>
</body>
</html>