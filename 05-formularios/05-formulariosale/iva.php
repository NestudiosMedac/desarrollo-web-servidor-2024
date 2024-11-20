<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
        require("../../06-funciones/economia.php")
    ?>
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!--
    GENERAL = 21%
    REDUCIDO = 10%
    SUPERREDUCIDO = 4%

    10€ IVA = GENERAL, PVP = 12,1€ PVP = precio * 1.21
    10€ iva = REDUCIDO, PVP = 11€  PVP = precio * 1.1
    -->

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_precio = $_POST["precio"];
        if(isset($_POST["iva"]))$tmp_iva = $_POST["iva"];
        else $tmp_iva = '';

        if($tmp_precio == '' ){
            $err_precio =  "El precio es obligatorio";
        }else{
      /*       if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE ){
                $err_precio = "El precio debe ser un número"; 
            }else{
                if($tmp_precio<0 ){
                    $err_precio = "El precio debe ser mayor a cero";
                }else{*/
                    $precio=$tmp_precio;
                //}
          //  } 
        }

        if($tmp_iva == ''){
            $err_iva = "El iva es obligatorio";
        }else{
            $valores_validos_iva =["GENERAL", "REDUCIDO","SUPERREDUCIDO"];
            if( !in_array($tmp_iva, $valores_validos_iva) ){
                $err_iva = "El iva debe ser: GENERAL, REDUCIDO, SUPERREDUCIDO"; 
                }else{
                    $iva=$tmp_iva;
                }
            }
        
    ?>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <?php if(isset($err_precio)) echo"<span class='error'>$err_precio </span>";?>
        <br><br>
        <select name="iva">
            <option disabled selected hidden>--- Elige un tipo de IVA ---</option>
            <option value="GENERAL">General</option>
            <option value="REDUCIDO">Reducido</option>
            <option value="SUPERREDUCIDO">Superreducido</option>
        </select>
        <?php if(isset($err_iva)) echo"<span class='error'>$err_iva </span>";?>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if(isset($precio) && isset($iva)){// isset, si la variable esta definida
            $res=calcularPVP($precio, $iva);
            echo "<h1>El precio $precio con el IVA $iva es $res</h1>";
        }
    }
    ?>

</body>
</html>