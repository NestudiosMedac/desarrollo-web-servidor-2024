<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php');

    session_start();
    if (isset($_SESSION["usuario"])) {
        echo "<h2>Bienvenid@ " . $_SESSION["usuario"] . "</h2>";
    } else {
        header("location: usuario/iniciar_sesion.php");
        exit;
    }
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar categoría</h1>
        <?php
        function depurar($entrada)
        {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }

        $categoria = $_GET["categoria"];
        $sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";
        $resultado = $_conexion->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
            $categoria = $fila["categoria"];
            $descripcion = $fila["descripcion"];
        }

        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion->query($sql);
        $categorias = [];

        while ($fila = $resultado->fetch_assoc()) {
            array_push($categorias, $fila["categoria"]);
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
                    $err_categoria = "La categoría ya existe";
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
                $err_descripcion = "La descripción de la categoría es obligatoria.";
            } else {
                if (strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripción de la categoría debe como máximo 255 carácteres.";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }
            if (isset($categoria) && isset($descripcion)) {
                $sql = "UPDATE categorias SET
                categoria = '$categoria',
                descripcion = '$descripcion'
                WHERE categoria = '$categoria'
            ";
                $_conexion->query($sql);
            }
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre de la categoría: </label>
                <input class="form-control" type="text" name="categoria" value="<?php echo $categoria ?>">
                <?php if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción: </label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>">
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
            </div>

            <div class="mb-3">
                <input type="hidden" name="nombre" value="<?php echo $categoria ?>">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>