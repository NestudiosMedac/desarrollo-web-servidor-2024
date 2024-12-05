<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de la tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1 );    
        require('util/conexion.php');
    ?>

</head>
<body>
    <div class="container">
    <?php
    session_start();
        if(isset($_SESSION["usuario"])){
           echo " <h2><b> Bienvenid@ ".$_SESSION["usuario"]."</b></h2>";
           echo '<a class="btn btn-success" href="./productos/index.php">Productos</a>';
           echo '<a class="btn btn-success" href="./categorias/index.php">Categorías</a>';
           echo '<br><br>';
           echo '<a class="btn btn-warning" href="./usuario/cerrar_sesion.php">Cerrar sesión</a>';
           echo '<a class="btn btn-primary" href="./usuario/cambiar_credenciales.php">¿Desea cambiar su contraseña?</a>';
        
        }else{
            echo " <h2><b> ¡Bienvenid@ a nuestra tienda! </b></h2>";
            /* Aqui he añadido el boton registrarse porque es mas lógico, 
            es la primera pagina, si eres nuevo usuario como entras por primera vez? */
            echo '<a class="btn btn-primary" href="./usuario/iniciar_sesion.php">Iniciar sesión</a>';
            echo '<a class="btn btn-primary" href="./usuario/registro.php">Registrarse</a>';
        }  
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


