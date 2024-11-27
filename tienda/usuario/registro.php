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

     require('../conexion.php');?>
   
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);


           $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
            $_conexion -> query($sql);

            header("location: iniciar_sesion.php");
            exit;
        }
        ?>
            <form action="" method="post" enctype="multipart/form-data">
        <!--  enctype="multipart/form-data" es para que pueda leer imagenes el form -->
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena">
                </div>
            
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Registrarse">
                    <a href="../index.php" class="btn btn-secondary">Iniciar sesión</a><!-- o si ya tienes seion --> 
                </div>
            </form>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>