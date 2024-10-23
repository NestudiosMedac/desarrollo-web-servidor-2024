<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
        require("../../06-funciones/irpf.php")
    ?>
</head>
<body>
    <!--
    GENERAL = 21%
    REDUCIDO = 10%
    SUPERREDUCIDO = 4%

    10€ IVA = GENERAL, PVP = 12,1€ PVP = precio * 1.21
    10€ iva = REDUCIDO, PVP = 11€  PVP = precio * 1.1
    -->
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="GENERAL">General</option>
            <option value="REDUCIDO">Reducido</option>
            <option value="SUPERREDUCIDO">Superreducido</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_precio = $_POST["precio"];
        $tmp_iva = $_POST["iva"];


        if($tmp_precio=='' ){
            echo "<p>El precio es obligatorio</p>";
        }else{
            if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE ){
                echo "<p>El precio debe ser un número</p>"; 
            }else{
                if($tmp_precio<0 ){
                    echo "<p>El precio debe ser mayor a cero</p>";
                }else{
                    $precio=$tmp_precio;
                }
            }
        }
        

        if($tmp_iva == ''){
            echo "<p>El iva es obligatorio</p>";
        }else{
            $valores_validos_iva =["GENERAL", "REDUCIDO","SUPERREDUCIDO"];
            if( !in_array($tmp_iva, $valores_validos_iva) ){
                echo "<p>El iva debe ser: GENERAL, REDUCIDO, SUPERREDUCIDO</p>"; 
                }else{
                    $iva=$tmp_iva;
                }
            }
        
        

        if(isset($precio) && isset($iva)){// isset, si la variable esta definida
            $res=calcularPVP($precio, $iva);
            echo "<h1>El precio $precio con el IVA $iva es $res</h1>";
        }
    }
    ?>
</body>
</html>