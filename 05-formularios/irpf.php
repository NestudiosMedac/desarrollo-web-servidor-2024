<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );
          
          require('../06-funciones/irpf.php');
    ?>
</head>
<body>
<form action="" method="post">
        <input type="text" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_salario = $_POST["salario"];
        
        if($tmp_salario==''){
            echo "<p>El salario es obligatorio</p>";
        }else{
            if(filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) === FALSE ){
                echo "<p>La base debe ser un número</p>"; 
            }else{
                if($tmp_salario<=0 ){
                    echo "<p>El salario debe ser mayor a cero</p>";
                }else{
                    $salario=$tmp_salario;
                }
            }
        }
        

        if(isset($salario)){// isset, si la variable esta definida
            $res=calcularIRPF($salario);
            echo "<h1>El salario neto de $salario es $res</h1>";
        }
    }
    ?>

</body>
</html>