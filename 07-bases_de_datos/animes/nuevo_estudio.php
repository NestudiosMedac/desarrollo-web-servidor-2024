<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo estudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
     error_reporting(E_ALL );
     ini_set("display_errors", 1 );    

     require('conexion.php');?>
   
</head>
<body>
    <div class="container">
        <h1>Nuevo estudio</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre_estudio = $_POST["nombre_estudio"];
            $ciudad = $_POST["ciudad"];
            $anno_fundacion = $_POST["anno_fundacion"];
     

            /* $sql = "INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion) 
            VALUES ('$nombre_estudio', '$ciudad', $anno_fundacion)";
            $_conexion -> query($sql); */

            $sql=$_conexion-> prepare("INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion) 
            VALUES (?,?,?");
            $sql->bind_param("ssi",
            $nombre_estudio,
            $ciudad,
            $anno_fundacion);
            $sql -> execute();
            $_conexion -> close();

        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <input type="text" class="form-control" name="nombre_estudio">
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <div class="mb-3">
                <label class="form-label">Año fundación</label>
                <input type="text" class="form-control" name="anno_fundacion">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Insertar">
                <a href="index.php" class="btn btn-secondary">Volver</a> 

            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>