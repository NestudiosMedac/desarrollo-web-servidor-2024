<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
        <?php?>
</head>
<body>
 <?php
    /**$peliculas = 
        array(
            array(),
        ) esto es mala practica*/
        $peliculas = [
            ["Karate a muerte en torremolinos","Acción",1975],// "V01"=>["TITULO"=>"Disco Elysium","RPG",9.99], Esto existe
            ["Sharknado 1-5","Acción",2015],
            ["Princesa por sorpresa 2","Comedia",2008],
            ["Temblores 4","Terror",2018],
            ["Cariño, he encogido a los niños","Aventuras",2001],
            ["Stuart Little","Infatil",2000]
        ];
           /**1.AÑADIR CON UN RAND, LA DURACION DE CADA PELICULA.COMO UNA NUEVA COLUMNA LA DURACION SERA DE UN NUMERO ALEATORIO ENTRE 30 Y 240
            * 2. AÑADIR COMO NUEVA COLUMNA EL TIPO DE PELICULA. EL TIPO SERA: 
            *   -CORTOMETRAJE SI DURA MENOS DE 60 
            *   -LARGO METRAJE SI LA DURACION ES MAYOR O IGUAL QUE 6
            *3. MOSTRAR EN OTRA TABLA, TODAS LAS COLUMAS, Y ORDENAR ADEMAS EN ESTE ORDEN:
            *    1. GENERO
            *    2. AÑO
            *    3. TITULO(TODO ALFABETICAMENTE, EL AÑO DE MAS RECIENTE A MAS ANTIGUO)
            */

 ?>
 <table>
    <thead>
        <tr>
            <th>Pelicula</th>
            <th>Categoría</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($peliculas as $pelicula){
            list($titulo,$categoria,$anio)=$pelicula;
            echo "<tr>";
            echo "<td>$titulo</td>";
            echo "<td>$categoria</td>";
            echo "<td>$anio</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>