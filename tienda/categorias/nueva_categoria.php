<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php'); ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nueva categoría</h1>
        <?php
        function depurar($entrada)
        {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_categoria = depurar($_POST["categoria"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            $sql = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'";
            $resultado = $_conexion->query($sql);

            if ($tmp_categoria == "") {
                $err_categoria = "El nombre de la categoría es obligatorio";
            } else {
                if ($resultado->num_rows != 0) {
                    $err_categoria = "<h2>La categoría ya exsite</h2>";
                } else {
                    $patron = "/^[A-Za-z\s]+$/";
                    if (!preg_match($patron, $tmp_categoria)) {
                        $err_categoria = "El nombre de la categoría debe contener solo letras y espacios en blanco ";
                    } else {
                        if (strlen($tmp_categoria) >= 30) {
                            $err_categoria = "El nombre de la categoría debe tener como máximo 30 carácteres. ";
                        } else {
                            if (strlen($tmp_categoria) < 2) {
                                $err_categoria = "El nombre de la categoría debe tener como minimo 2 carácteres. ";
                            } else {
                                $categoria = $tmp_categoria;
                            }
                        }
                    }
                }
            }

            if ($tmp_descripcion == "") {
                $err_descripcion= "La descripción de la categoría es obligatoria.";
            } else {
                if (strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripción de la categoría debe como máximo 255 carácteres.";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            } 
            if(isset($categoria) && isset($descripcion)){
                /* $sql = "INSERT INTO categorias (categoria, descripcion) 
                VALUES ('$categoria', '$descripcion')";
                $_conexion -> query($sql); */

                $sql=$_conexion -> prepare("INSERT INTO categorias (categoria, descripcion) 
            VALUES (?,?)"); 
             $sql->bind_param("ss",
             $categoria,
             $descripcion,
             );
 
             //3. Ejecución
             $sql -> execute();
             $_conexion -> close();
            }
        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre de la categoría:</label>
                <input type="text" class="form-control" name="categoria">
                <?php if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="descripcion">
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Crear">
                <a href="./index.php" class="btn btn-secondary">Volver</a>

            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>