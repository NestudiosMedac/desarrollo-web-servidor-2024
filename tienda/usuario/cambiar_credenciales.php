<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php');

    session_start();
    ?>
    <style>
        .error {
            color: red;
        }

        .info {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cambiar contraseña</h1>
        <?php
        function depurar($entrada)
        {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = depurar($_POST["usuario"]);
            $contrasena = depurar($_POST["contrasena"]);
            $tmp_nueva_contrasena = depurar($_POST["nueva_contrasena"]);

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion->query($sql);

            if ($resultado->num_rows == 0) {
                $err_usuario = "El usuario $usuario no existe";
            } else {
                $datos_usuario = $resultado->fetch_assoc();
                $acceso_concedido = password_verify($contrasena, $datos_usuario["contrasena"]);
                if ($acceso_concedido) {
                    if ($tmp_nueva_contrasena == "") {
                        $err_nueva_contrasena = "La contraseña es obligatoria.";
                    } else {

                        if (strlen($tmp_nueva_contrasena) < 8) {
                            $err_nueva_contrasena = "La contraseña debe tener como minimo 8 carácteres. ";
                        } else {
                            if (strlen($tmp_nueva_contrasena) >= 15) {
                                $err_nueva_contrasena = "La contraseña debe tener como máximo 15 carácteres. ";
                            } else {
                                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                                if (!preg_match($patron, $tmp_nueva_contrasena)) {
                                    $err_nueva_contrasena = "La contraseña debe contener solo letras (mayus y minus), números y carácteres especiales. De cada uno debe contener al menos uno, incluyendo mayus y minus.";
                                } else {
                                    $nueva_contrasena = $tmp_nueva_contrasena;
                                }
                            }
                        }
                    }
                    if (isset($nueva_contrasena)) {
                        $nueva_contrasena_cifrada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
                        $sql = "UPDATE usuarios SET
                    contrasena = '$nueva_contrasena_cifrada'
                    WHERE usuario = '$usuario'
                ";
                        $info_contrasena = "La contraseña ha sido cambiada con exito"; //para informar al usuario, no es un error como tal, es para ayudar a la correccion
                        $_conexion->query($sql);
                    } //revisar
                } else {
                    $err_contrasena = "La contraseña es incorrecta";
                }
            }
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!--  enctype="multipart/form-data" es para que pueda leer imagenes el form -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
                <?php if (isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena">
                <?php if (isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" name="nueva_contrasena">
                <?php if (isset($err_nueva_contrasena)) echo "<span class='error'>$err_nueva_contrasena</span>"; ?>
                <?php if (isset($info_contrasena)) echo "<span class='info'>$info_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Aplicar cambios">
                <a href="iniciar_sesion.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>