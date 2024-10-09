<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form action="" method="post">
    <label for="num">Numero</label><!---el for e id estan linkeados-->
    <input type="text" name="num" id="num" placeholder="Introduce un numero">
    </form>
    <br>
        <!-- 
            CREAR UN FORMULARIO QUE RECIBA UN NUMERO

            SE MOSTRARA LA TABLA DE MULTIPLICAR DE ESE NUMERO EN UNA TABLA HTML
            
            2 X 1 = 2
            2 X 2 = 4
            ...
        -->
            <table>
                <caption>Tabla de multiplicar</caption>
                <thead>
                    <tr>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $num = $_POST["num"];
                        $res=0;
                        for($i=0;$i<=10 ;$i++){
                            $res=$num*$i;
                           echo "<tr>"; 
                            echo "<td> $num x $i = </td>";
                            echo "<td>$res</td>";
                           echo "</tr>"; 
                        }
                    }
                    ?>
                </tbody>
            </table>
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
     
    ?>

</body>
</html>