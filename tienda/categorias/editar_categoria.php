<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('../util/conexion.php');
        
      /*   session_start();
        if(isset($_SESSION["usuario"])) {
            echo "<h2>Bienvenid@ " . $_SESSION["usuario"] . "</h2>";
        } else {
            header("location: usuario/iniciar_sesion.php");
            exit;
        } */
    ?>
</head>
<body>
    <div class="container">
        <h1>Editar categoría</h1>
        <?php
        //echo "<h1>" . $_GET["categoria"] . "</h1>";

        $categoria = $_GET["categoria"];
        $sql = "SELECT * FROM categorias WHERE categoria = $categoria";
        $resultado = $_conexion -> query($sql);
        
        while($fila = $resultado -> fetch_assoc()) {
            $nombre_categoria = $fila["categoria"];
            $descripcion = $fila["descripcion"];
        }

        //echo "<h1>$titulo</h1>";

        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion -> query($sql);
        $categorias = [];

        while($fila = $resultado -> fetch_assoc()) {
            array_push($categorias, $fila["categoria"]);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre_categoria = $_POST["categoria"];
            $tmp_descripcion = $_POST["descripcion"];

                //validacion
            $sql = "UPDATE categorias SET
                categoria = '$nombre_categoria',
                desctipcion = '$descripcion',
    
                WHERE categoria = $nombre_categoria
            ";
            $_conexion -> query($sql);
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre de la categoría: </label>
                <input class="form-control" type="text" name="categoria" value="<?php echo $nombre_categoria ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción de la categoría: </label>
                <select class="form-select" name="nombre_categoria">
                    <option value="<?php echo $nombre_categoria ?>" selected hidden><?php echo $nombre_categoria ?></option>
                    <?php
                    foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
         
            <div class="mb-3">
                <input type="hidden" name="nombre_categoria" value="<?php echo $nombre_categoria ?>">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>