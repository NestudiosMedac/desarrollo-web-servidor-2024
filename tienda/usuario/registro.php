<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../util/conexion.php'); ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <?php
        function depurar($entrada)
        {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_usuario = depurar($_POST["usuario"]);
            $tmp_contrasena = depurar($_POST["contrasena"]);

            $sql = "SELECT * FROM usuarios WHERE usuario = '$tmp_usuario'";
            $resultado = $_conexion->query($sql);

            if ($tmp_usuario == "") {
                $err_usuario = "El usuario es obligatorio.";
            } else {
                if ($resultado->num_rows != 0) {
                    $err_usuario = "El usuario ya existe.";
                } else {
                    $patron = "/^[a-z0-9]+$/";
                    if (!preg_match($patron, $tmp_usuario)) {
                        $err_usuario = "El usuario debe contener solo letras(minus) y números.";
                    } else {
                        if (strlen($tmp_usuario) >= 15) {
                            $err_usuario = "El usuario debe tener como máximo 15 carácteres. ";
                        } else {
                            if (strlen($tmp_usuario) < 3) {
                                $err_usuario = "El usuario debe tener como minimo 3 carácteres. ";
                            } else {
                                $usuario = $tmp_usuario;
                            }
                        }
                    }
                }
            }

            if ($tmp_contrasena == "") {
                $err_contrasena = "La contraseña es obligatoria.";
            } else {
                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                if (!preg_match($patron, $tmp_contrasena)) {
                    $err_contrasena = "La contraseña debe contener solo letras (mayus y minus), números y carácteres especiales. De cada uno debe contener al menos uno, incluyendo mayus y minus.";
                } else {
                    if (strlen($tmp_contrasena) >= 15) {
                        $err_contrasena = "La contraseña debe tener como máximo 15 carácteres. ";
                    } else {
                        if (strlen($tmp_contrasena) < 8) {
                            $err_contrasena = "La contraseña debe tener como minimo 8 carácteres. ";
                        } else {
                            $contrasena = $tmp_contrasena;
                        }
                    }
                }
            }

            if (isset($usuario) && isset($contrasena)) {
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
                $_conexion->query($sql);
                header("location: iniciar_sesion.php");
                exit;
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
                <input type="submit" class="btn btn-primary" value="Registrarse">
                <a href="../index.php" class="btn btn-secondary">Volver a iniciar sesión</a><!-- o si ya tienes seion -->
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>