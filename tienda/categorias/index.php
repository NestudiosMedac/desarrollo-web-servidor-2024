<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php');

    session_start();
    if (isset($_SESSION["usuario"])) {
        echo " <h2><b> Bienvenid@ " . $_SESSION["usuario"] . "</b></h2>";
    } else {
        header("location: ../usuario/iniciar_sesion.php");
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
        <a class="btn btn-warning" href="../usuario/cerrar_sesion.php">Cerrar sesión</a>
    <h1>Tabla de categorías</h1>
    <?php
     if($_SERVER["REQUEST_METHOD"]== "POST"){
        $categoria = $_POST["categoria"];
        echo "<h1>$categoria</h1>";
       /*  $sql = "DELETE FROM categorias WHERE categoria = $categoria";
        $_conexion -> query($sql); */
        $sql=$_conexion-> prepare("DELETE FROM categorias WHERE categoria = ?");
        $sql->bind_param("s",
        $categoria);
        $sql -> execute();
     }
     ?>

        <h1>Tabla de categorías</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_categoria = $_POST["categoria"];

            $sql = "SELECT * FROM productos WHERE categoria = '$tmp_categoria'";
            $resultado = $_conexion->query($sql);

            if ($resultado->num_rows != 0) {
                $err_categoria = "Categoría en uso, debes eliminar los productos de esta categoría ";
            } else {
                $categoria = $tmp_categoria;
            }


            if (isset($categoria)) {
                $sql = "DELETE FROM categorias WHERE categoria = '$categoria'"; // es un string necesita sus ''
                $_conexion->query($sql);
            }
        }

        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion->query($sql);
        ?>
        <a href="../categorias/nueva_categoria.php" class="btn btn-secondary">Crear nueva categoría</a> <br><br>
        <table class='table table-striped table-hover table-sm'>
            <thead class='table-dark'>
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th></th><!-- boton -->

                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) { //trata el resultado como un array asociativo (cursor)
                    echo "<tr>";
                    echo "<td>" . $fila["categoria"] . "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                ?>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
                            <input class="btn btn-danger" type="submit" value="Borrar">
                            <a class="btn btn-primary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a>
                        </form>
                    </td>

                <?php
                    echo "</tr>";
                }
                if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"; ?>
            </tbody>
        </table>
        <a class="btn btn-danger" href="../usuario/cerrar_sesion.php">Cerrar sesión</a>
        <a class="btn btn-warning" href="../index.php">Volver a la página de inicio</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>