<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1 );    

        require('../util/conexion.php');

       /*  session_start();
        if(isset($_SESSION["usuario"])){
           echo " <h2><b> Bienvenid@ ".$_SESSION["usuario"]."</b></h2>";
        }else{
            header("location: ../usuario/iniciar_sesion.php");//he añadido los puntos
            exit;
        } */
    ?>
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

    $sql = "SELECT * FROM categorias";
    $resultado = $_conexion -> query($sql);
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
    <a href="../categorias/nueva_categoria.php" class="btn btn-secondary">Crear nueva categoría</a> <br><br>
    <table class='table table-striped table-hover table-sm' >
        <thead class='table-dark'>
            <tr >
                <th>Categoría</th>
                <th>Descripción</th>
                <th></th><!-- boton -->

            </tr>
        </thead>
        <tbody>
            <?php
            while($fila = $resultado-> fetch_assoc()){ //trata el resultado como un array asociativo (cursor)
                echo "<tr>";
                echo "<td>".$fila["categoria"]."</td>";
                echo "<td>".$fila["descripcion"]."</td>";
                ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="categoria" value="<?php echo $fila["categoria"]?>">
                        <input class="btn btn-danger" type="submit" value="Borrar">
                    </form>
                </td>
                <td>
                    <a class="btn btn-primary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"]?>">Editar</a>
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


