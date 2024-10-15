<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDADES</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <!-- 
        CREAR UN FORMULARIO QUE RECIBA EL NOMBRE Y LA EDAD DE UNA PERSONA

        SI LA EDAD ES MENOR QUE 18, SE MOSTRARÁ EL NOMBRE

        SI LA EDAD ESTA ENTRE 18 Y 65, SE MOSTRARÁ EL NOMBRE Y QUE ES MAYOR DE EDAD

        SI LA EDAD ES MAS DE 65, SE MOSTRARÁ EL NOMBRE Y QUE SE HA JUBILADO
    -->
       
    <form action="" method="post"><!--Sin nada es singlepage, con el fichero php es multipage-->
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre">
    <label for="edad">Edad</label>
    <input type="text" name="edad" id="edad" placeholder="Escribe tu edad">
    <input type="submit" value="Enviar">

</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){//de memoria
    /**
     * Este codigo se ejecuta cuando el servidor recibe una peticion de post
    */
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    
    switch($edad){// usar match(true)
        case ($edad>0 && $edad<18):
            echo "<h1>$nombre, es menor de edad</h1>";
            break;
        case ($edad>=18 && $edad<65):
            echo "<h1>$nombre, es mayor de edad</h1>";
            break;
        case ($edad>=65):
            echo "<h1>$nombre, se ha jubilado</h1>";
            break;
        default:
        echo "<h1>Introduce un numero válido</h1>";

        }


        /**
         * &resultado = match(true){
         *      $edad>0 && $edad<18 => "es menor de edad",
         *      $edad>=18 && $edad<65 => "es mayor de edad",
         *      $edad>=65 => "es ha jubilado"
         * }
         * echo "<h1>$nombre $resultado</h1>";
         */
    
    //añadir al formulario un campo de texto adicional para introducir un numero
    //mostrar el mensaje tantas veces como indique el numero
}
?>
</body>
</html>