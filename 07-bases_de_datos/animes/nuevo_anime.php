<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
     error_reporting(E_ALL );
     ini_set("display_errors", 1 );    

     require('conexion.php');?>
   
</head>
<body>
    <div class="container">
        <h1>Nuevo anime</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["titulo"];
            $nombre_estudio = $_POST["nombre_estudio"];
            $anno_estreno = $_POST["anno_estreno"];
            $num_temporadas = $_POST["num_temporadas"];
             /**
             * $_POST -> es el array, y la variable es el titulo
             */
            /**
             * $_FILES -> que es un array BIDIMENSIONAL
             */
            //var_dump($_FILES["imagen"]);

            $nombre_imagen=$_FILES["imagen"]["name"];
            $ubicacion_temporal=$_FILES["imagen"]["tmp_name"];
            $ubicacion_final="./imagenes/$nombre_imagen";

            move_uploaded_file($ubicacion_temporal, $ubicacion_final);
            /* sirve para mover de una ubicacion al otro */

            /* 
            $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen) 
            VALUES ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, '$ubicacion_final')";

            $_conexion -> query($sql); 
            */
            /* Las tres etapas de las prepared statements: DE MEMORIA
            INSERT UPDATE SELECT
            1. Preparación 
            2. Enlazado (binding)
            3. Ejecución
            */

            //1. Preparación 
            $sql=$_conexion -> prepare("INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen) 
            VALUES (?,?,?,?,?)");
            //2. Enlazado (binding)
            /* 
            s-> String 
            i-> Int
            d-> Float
            b-> IMAGENES NO USAMOS 
            HAY QUE TENER CUIDADO CON EL ERROR*/
            $sql->bind_param("ssiis",
            $titulo,
            $nombre_estudio,
            $anno_estreno,
            $num_temporadas,
            $ubicacion_final);

            //3. Ejecución
            $sql -> execute();

        }

           /* 4. Retrieve
           $resultado= $sql -> get_result(); 
           
           SOLO EN LOS CASOS DE LOS SELECT*/
       

          /*  $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
           $resultado = $_conexion ->query($sql); */

           $sql=$_conexion-> prepare("SELECT * FROM estudios ORDER BY ?");
           $sql->bind_param("s",
           $nombre_estudio
           );
           $sql -> execute();
           //4. Retrieve
           $resultado= $sql -> get_result();
   
             // Cerrar despues de la ULTIMA sentancia sql
            $_conexion -> close();
           $estudios=[];
           while($fila = $resultado-> fetch_assoc()){ //trata el resultado como un array asociativo (cursor)
            array_push($estudios, $fila["nombre_estudio"]);
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
       <!--  enctype="multipart/form-data" es para que pueda leer imagenes el form -->
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option value="" selected disabled hidden>--- Elige el estudio ---</option>
                    <?php
                    foreach($estudios as $estudio){?>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio ?>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input type="text" class="form-control" name="anno_estreno">
            </div>
            <div class="mb-3">
                <label class="form-label">Numero de temporadas</label>
                <input type="text" class="form-control" name="num_temporadas">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
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