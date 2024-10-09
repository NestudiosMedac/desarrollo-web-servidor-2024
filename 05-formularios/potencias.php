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
    <form action="" method="post">
    <label for="base">Base</label><!---el for e id estan linkeados-->
    <input type="text" name="base" id="base" placeholder="Introduce la base">
    <label for="exponente">Exponente</label><!---el for e id estan linkeados-->
    <input type="text" name="exponente" id="exponente" placeholder="Introduce el exponente"><br><br>
    <input type="submit" value="Calcular">
    </form>
    <?php
        /**
         *  CREAR UN FORMULARIO QUE RECIBA DOS PARÁMETROS: BASE Y EXPONENTE
         * 
         * CUANDO SE ENVÍE EL FORMULARIO, SE CALCULARÁ EL RESULTADO DE ELEVAR LA BASE AL EXPONENETE
         * 
         * EJEMPLOS:
         * 
         * 2 ELEVADO A 3 = 8 => 2X2X2 =8
         * 3 ELEVADO A 2 = 9 => 3X3 = 9
         * 2 ELEVADO A 1 = 2
         * 3 ELEVADO A 0 = 1
         */
        if($_SERVER["REQUEST_METHOD"]=="POST"){

        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        $res = 1;


        for($i=0;$i<$exponente ;$i++){
            $res*=$base;
        }
        echo "<h2>$res</h2>";
        }
    ?>
</body>
</html>