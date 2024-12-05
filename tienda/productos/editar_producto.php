<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php');

    /*    session_start();
        if(isset($_SESSION["usuario"])) {
            echo "<h2>Bienvenid@ " . $_SESSION["usuario"] . "</h2>";
        } else {
            header("location: usuario/iniciar_sesion.php");
            exit;
        } */
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar producto</h1>
        <?php
        function depurar($entrada)
        {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }
        $id_producto = $_GET["id_producto"];
        $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
        $resultado = $_conexion->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
            $nombre = $fila["nombre"];
            $precio = $fila["precio"];
            $categoria = $fila["categoria"];
            $stock = $fila["stock"];
            $imagen = $fila["imagen"];
            $descripcion = $fila["descripcion"];
        }
        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion->query($sql);
        $categorias = [];

        while ($fila = $resultado->fetch_assoc()) {
            array_push($categorias, $fila["categoria"]);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_precio = depurar($_POST["precio"]);
            if (isset($_POST["categoria"])) $tmp_categoria = depurar($_POST["categoria"]);
            else $tmp_categoria = "";
            if ($_POST["stock"] != "") $tmp_stock = depurar($_POST["stock"]);
            else $tmp_stock = 0;
            $tmp_descripcion = depurar($_POST["descripcion"]);

            if ($tmp_nombre == "") {
                $err_nombre = "El nombre del producto es obligatorio.";
            } else {
                $patron = "/^[a-z0-9\s]+$/"; //he asumido que solo en minus porque en contraseña si especificas que hay mayus
                if (!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre del producto debe contener solo letras(solo minus), espacios en blanco y números.";
                } else {
                    if (strlen($tmp_nombre) >= 50) {
                        $err_nombre = "El nombre del producto debe tener como máximo 50 carácteres. ";
                    } else {
                        if (strlen($tmp_nombre) < 2) {
                            $err_nombre = "El nombre del producto debe tener como minimo 2 carácteres. ";
                        } else {
                            $nombre = $tmp_nombre;
                        }
                    }
                }
            }

            if ($tmp_precio == "") {
                $err_precio  = "El precio es obligatorio";
            } else {
                $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                if (!preg_match($patron, $tmp_precio)) {
                    $err_precio = "El precio debe ser números y tener este formato XXXX.XX";
                } else {
                    if ($tmp_precio > 9999.99) {
                        $err_precio = "El precio no puede ser mayor que 9999.99";
                    } else {
                        if (strlen($tmp_precio) > 6) {
                            $err_precio = "El precio no puede tener más de 6 caracteres.";
                        } else {
                            $precio = $tmp_precio;
                        }
                    }
                }
            }
            if ($tmp_categoria == '') {
                $err_categoria = "La categoria es obligatoria";
            } else {
                if (!in_array($tmp_categoria, $categorias)) {
                    $err_categoria = "Elige una categoría valida";
                } else {
                    $categoria = $tmp_categoria;
                }
            }

            if (filter_var($tmp_stock, FILTER_VALIDATE_INT) === FALSE) {
                $err_stock= "El stock debe ser un número entero ";
            } else {
                if ($tmp_stock > 99999) {
                    $err_stock = "El stock no debe sobrepasar 99999.";  //int (integer): Rango es de -2,000,000,000 a 2,000,000,000 mas o menos. voy a poner un numero más pequeño porque me parece excesivo lo que dice google
                } else {
                    if ($tmp_stock < 0) {
                        $err_stock = "El stock no debe ser menor a 0";
                    } else {
                        $stock = $tmp_stock;
                    }
                }
            }


            if ($tmp_descripcion == "") {
                $err_descripcion = "La descripción del producto es obligatoria.";
            } else {
                if (strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripción del producto debe como máximo 255 carácteres.";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }

            if (
                isset($nombre) && isset($precio)
                && isset($categoria) && isset($stock) && isset($descripcion)
            ) {
                $sql = "UPDATE productos SET
                nombre = '$nombre',
                precio = $precio,
                categoria = '$categoria',
                stock = $stock,
                descripcion = '$descripcion'
                WHERE id_producto = $id_producto
            ";
                $_conexion->query($sql);
            }
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>">
                <?php if (isset($err_precio)) echo "<span class='error'>$err_precio</span>"; ?>

            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="categoria">
                    <option value="<?php echo $categoria ?>" selected hidden><?php echo $categoria ?></option>
                    <?php
                    foreach ($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" value="<?php echo $stock ?>">
                <?php if (isset($err_stock)) echo "<span class='error'>$err_stock</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>">
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
            </div>

            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>