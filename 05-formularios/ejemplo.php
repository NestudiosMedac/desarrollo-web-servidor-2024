<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <form action="" method="post"><!--Sin nada es singlepage, con el fichero php es multipage-->
    
        <input type="text" name="mensaje">
        <input type="text" name="veces">
        <input type="submit" value="Enviar">

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){//de memoria
        /**
         * Este codigo se ejecuta cuando el servidor recibe una peticion de post
        */
        $mensaje = $_POST["mensaje"];
        $veces = $_POST["veces"];
        
        for($i=0;$i<$veces;$i++){
            
            echo "<h1>$mensaje</h1>";
        }
        //añadir al formulario un campo de texto adicional para introducir un numero
        //mostrar el mensaje tantas veces como indique el numero
    }
    ?>
</body>
</html>