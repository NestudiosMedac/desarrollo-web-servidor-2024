<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1 );    

        require('conexion.php');

        session_start();
        if(isset($_SESSION["usuario"])){
           echo " <h2><b> Bienvenid@ ".$_SESSION["usuario"]."</b></h2>";
        }else{
            header("location: usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <a class="btn btn-warning" href="usuario/cerrar_sesion.php">Cerrar sesión</a>
    <h1>Tabla de animes</h1>
    <?php
     if($_SERVER["REQUEST_METHOD"]== "POST"){
        $id_anime = $_POST["id_anime"];
        echo "<h1>$id_anime</h1>";
        //BORRAR ANIME
/*         $sql = "DELETE FROM animes WHERE id_anime = $id_anime";
        $_conexion -> query($sql); */
        $sql=$_conexion-> prepare("DELETE FROM animes WHERE id_anime = ?");
        $sql->bind_param("i",
        $id_anime);
        $sql -> execute();

     }

    $sql = "SELECT * FROM animes";
    $resultado = $_conexion -> query($sql);
    //$_conexion=close();
    /**
     * 
     * SI SIEMPRE ENTRAMOS AL INDEX CAMBIA LA URL
     * 
     * Aplicamos la funcion query a la conexion, donde se ejecura la sentencia SQL hecha
     * 
     * El resultado se almacena $resultado, que es un objeto con una estructura parecida
     * a los arrays
     */
    ?>
    <a href="nuevo_anime.php" class="btn btn-secondary">Crear nuevo anime</a> <br><br>
    <table class='table table-striped table-hover table-sm' >
        <thead class='table-dark'>
            <tr >
                <th>Título</th>
                <th>Estudio</th>
                <th>Año</th>
                <th>Número de temporadas</th>
                <th></th><!-- imagen -->
                <th></th><!-- boton -->


            </tr>
        </thead>
        <tbody>
            <?php
            while($fila = $resultado-> fetch_assoc()){ //trata el resultado como un array asociativo (cursor)
                echo "<tr>";
                echo "<td>".$fila["titulo"]."</td>";
                echo "<td>".$fila["nombre_estudio"]."</td>";
                echo "<td>".$fila["anno_estreno"]."</td>";
                echo "<td>".$fila["num_temporadas"]."</td>";
                ?>
                <td>
                    <img width="100" height="200" src="<?php echo $fila["imagen"]?>">
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"]?>">
                        <input class="btn btn-danger" type="submit" value="Borrar">
                    </form>
                </td>
                <td>
                    <a class="btn btn-primary" href="ver_anime.php?id_anime=<?php echo $fila["id_anime"]?>">Editar</a>
                </td>
                <?php
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


