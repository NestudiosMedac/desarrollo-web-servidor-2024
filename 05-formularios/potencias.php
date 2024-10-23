<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );
          
          require('../06-funciones/potencias.php');
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

        $tmp_base = $_POST["base"];
        $tmp_exponente = $_POST["exponente"];

            //version mejor de base
            if($tmp_base == ''){
                echo "<p>La base es obligatoria</p>";
            }else{
                if(filter_var($tmp_base, FILTER_VALIDATE_INT)=== FALSE ){//si pasa el filtro devuelve la variable si no lo pasa devuelve falso, si algo es cero y tiene != da falso automaticamente por eso tiene !==
                    echo "<p>La base debe ser un número</p>"; 
                }else{
                $base=$tmp_base;  
                }
            }

            //version mejor de exponente
            if($tmp_exponente == ''){
                echo "<p>El exponente es obligatoria</p>";
            }else{
                if(filter_var($tmp_exponente, FILTER_VALIDATE_INT)=== FALSE ){//si pasa el filtro devuelve la variable si no lo pasa devuelve falso, si algo es cero y tiene != da falso automaticamente por eso tiene !==
                    echo "<p>El exponente debe ser un número</p>"; 
                }else{
                    if($tmp_exponente <0){
                        echo "<p>El exponente debe ser un número positivo</p>";
                    }else{
                        $exponente=$tmp_exponente; 
                    } 
                }
            }
       /*  //base
        if($tmp_base!= ''){
            if(filter_var($tmp_base, FILTER_VALIDATE_INT)!== FALSE ){//si pasa el filtro devuelve la variable si no lo pasa devuelve falso, si algo es cero y tiene != da falso automaticamente por eso tiene !==
                $base=$tmp_base;
            }else{
                echo "<p>La base debe ser un número</p>";
            }

        }else{
            echo "<p>La base es obligatoria</p>";
        }
        //exponente
        if($tmp_exponente!= ''){
            if(filter_var($tmp_exponente, FILTER_VALIDATE_INT)!== FALSE){//is_numeric sirve para comprobar si es un numero aunque este en string, no se usa aqui porque te pueden colar decimales
                if($tmp_exponente>=0){
                    $exponente=$tmp_exponente;
                }else{
                    echo "<p>El exponente debe ser un número positivo</p>";
                }
            }else{
                echo "<p>El exponente debe ser un número</p>";
            }

        }else{
            echo "<p>El exponente es obligatorio</p>";
        } */
        if(isset($base) && isset($exponente)){// isset, si la variable esta definida
            $res=potencia($base, $exponente);
            echo "<h2>El resultado es $res</h2>";

        }
        
        }
    ?>
</body>
</html>