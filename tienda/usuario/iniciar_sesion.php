<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
     error_reporting(E_ALL );
     ini_set("display_errors", 1 );    

     require('../conexion.php');?>
   
</head>
<body>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);


            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($sql);

            if($resultado -> num_rows == 0){//si fuera uno habria uno ya exitente, o mas USAR PARA VALIDAR CATEGORIA CON NOMBRE REPETIDO CREANDO UN ERROR PROPIO NO DE PHP
                echo"<h2>El usuario $usuario no existe</h2>";
            }else{
                $datos_usuario = $resultado -> fetch_assoc();
                /**
                 * Podemos acceder a:
                 * 
                 * $datos_usuario["usuario"]
                 * $datos_usuario["contrasena"]
                 */
                $acceso_concedido = password_verify($contrasena, $datos_usuario["contrasena"]);
                //var_dump($acceso_concedido);//devuelve true si los dos valores estan ok y si es false pos no
                if($acceso_concedido){
                    //todo guay
                    session_start();
                    $_SESSION["usuario"] = $usuario;//se guarda info en el servidor
                    //$_COOKIE["loquesea"] = $loquesea; //se guarda info en el cliente
                    header("location: ../index.php");
                    exit;
                }else{
                    echo"<h2>La contraseña es incorrecta</h2>";
                }
            }
    
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
                    <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                    <a href="registro.php" class="btn btn-secondary">Registrarse</a><!-- o no tienes cuenta --> 
                </div>
            </form>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>