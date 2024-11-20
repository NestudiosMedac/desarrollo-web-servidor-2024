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
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["salario"]))$tmp_salario = $_POST["salario"];
        else $tmp_salario = '';
        
        if($tmp_salario==''){
            $err_salario = "El salario es obligatorio";
        }else{
            if(filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) === FALSE ){
            $err_salario = "La base debe ser un número"; 
            }else{
                if($tmp_salario<=0 ){
                    $err_salario = "El salario debe ser mayor a cero";
                }else{
                    $salario=$tmp_salario;
                }
            }
        }
    }
    ?>
<form action="" method="post">
        <input type="text" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
        <?php if(isset($err_salario)) echo"<span class='error'>$err_salario </span>";?>
    </form>

   <?php
   if(isset($salario)){// isset, si la variable esta definida // no hace falata que este dentro del $_server
    $res=calcularIRPF($salario);
    echo "<h1>El salario neto de $salario es $res</h1>";
    }

   ?>
</body>
</html>