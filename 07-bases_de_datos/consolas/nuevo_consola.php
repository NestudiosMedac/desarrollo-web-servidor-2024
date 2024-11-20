<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva consola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php require 'conexion.php';
     error_reporting(E_ALL );
     ini_set("display_errors", 1 );    

     require('conexion.php');?>
   
</head>
<body>
    <div class="container">
        <h1>Nueva consola</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $fabricante = $_POST["fabricante"];
            $gen = $_POST["gen"];
            $unidades = $_POST["unidades"];


            $sql = "INSERT INTO consolas (id, nombre, fabricante, gen, unidades ) 
            VALUES ($id, '$nombre', '$fabricante',$gen, $unidades)";
            $_conexion -> query($sql);



        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input type="text" class="form-control" name="fabricante">
            </div>
            <div class="mb-3">
                <label class="form-label"> Generación</label>
                <input type="text" class="form-control" name="gen">
            </div>
            <div class="mb-3">
                <label class="form-label"> Unidades</label>
                <input type="text" class="form-control" name="unidades">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Insertar">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>