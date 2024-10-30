<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL );
        ini_set("display_errors", 1 );    
    ?>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>

<div class="container"> <!-- todo aqui dentro -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_usuario = $_POST["usuario"];
        $tmp_nombre = $_POST["nombre"];
        $tmp_apellidos = $_POST["apellidos"];
        $tmp_dni = $_POST["dni"];
        $tmp_correo = $_POST["correo"];
        $tmp_fechaNacimiento= $_POST["fechaNacimiento"];

        
//la persona si ya tiene mas de 120 no  entre
        if($tmp_fechaNacimiento == ''){
            $err_fechaNacimiento="La fecha es obligatoria";
        }else{
            $patron="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (!preg_match($patron, $tmp_fechaNacimiento)){
                $err_fechaNacimiento="La fecha debe de estar en un formato adecuado";

            }else{
                $usuario = $tmp_usuario; 
                $fechaNacimiento=$tmp_fechaNacimiento;
        $arrayFechaNacimiento=explode('-', $tmp_fechaNacimiento);//equivalente al split de java explode('-', fecha); por donde vas a partir y lo que vas a partir
        $actualYear= date("Y");
        $actualMes= date("m");
        $actualDia= date("d");
        
        //list($actualYear, $actualMes, $actualdia)=explode('-',date("Y-m-d"))
        if(($actualYear - $arrayFechaNacimiento[0])>18){
            $fechaNacimiento_comprobar= "Es mayor de edad";
        }elseif(($actualYear - $arrayFechaNacimiento[0])<18){
             $fechaNacimiento_comprobar="Es menor de edad";
        }else{
            if(($actualMes - $arrayFechaNacimiento[1])>0){
                $fechaNacimiento_comprobar= "Es mayor de edad";
            }elseif(($actualMes - $arrayFechaNacimiento[1])<0){
                $fechaNacimiento_comprobar= "Es menor de edad";
            }else{
                if(($actualDia - $arrayFechaNacimiento[2])>=0){
                    $fechaNacimiento_comprobar= "Es mayor de edad";
                }else{
                    $fechaNacimiento_comprobar= "Es menor de edad";  
                }
            }   
        }
    }
        if($tmp_correo == ''){
            $err_correo="El correo es obligatorio";
        }else {
            //letras de la A a la Z (mayus o minus), numeros y barrabaja
            $patron = "/^[a-zA-Z0-9_\-.+]+@([a-zA-Z0-9-]+.)+[a-zA-Z]+$/";
            if (!preg_match($patron, $tmp_correo)){
                $err_correo="El correo debe tener un formato de ejemplo@ejemplo.ej";

            }else{
                $arrayInsultos=["caca", "culo", "hitler", "peo"];
                $palabras_encontradas="";
                foreach($palabras_baneadas as $palabra_baneada){
                    if(str_contains($tmp_correo, $palabra_baneada)){
                        $palabras_encontradas=$palabras_encontradas. ", $palabra_baneada";
                        }
                        if($palabras_encontradas !=''){
                            $err_correo="No se permiten las palabras: ".$palabras_encontradas;
                        }else{
                            $correo = $tmp_correo; 
                        }
                    }
                }   
            }

        if($tmp_dni == ""){
            $err_dni="El DNI es obligatorio";
        }else{
            $patron = "/^[0-9]{8}[A-Z]{1}$/";
            $tmp_dni=strtoupper($tmp_dni);
            if(!preg_match($patron, $tmp_dni)){
            $err_dni= "El DNI debe tener un largo de 9 digitos, 8 numeros(0,9) y una letra";
            }else{
                $letraDNI= substr($tmp_dni,8,1);
                $numero_dni=(int)substr($tmp_dni,0,8);
                $resto_dni=$numero_dni%23;

                $letra_correcta= match($resto_dni){
                    0 => "T",
                    1 => "R",
                    2 => "W",
                    3 => "A",
                    4 => "G",
                    5 => "M",
                    6 => "Y",
                    7 => "F",
                    8 => "P",
                    9 => "D",
                    10 => "X",
                    11 => "B",
                    12 => "N",
                    13 => "J",
                    14 => "Z",
                    15 => "S",
                    16 => "Q",
                    17 => "V",
                    18 => "H",
                    19 => "L",
                    20 => "C",
                    21 => "K",
                    22 => "E"
                };
                  //$letras_dni="TRWAGMYFPDXBNJZSQVHLCKE";
                 //$letra_correcta = substr($letras_dni,$resto_dni,1);
                if($letra_dni != $letra_correcta){
                    $err_dni="La letra del DNI no es correcta";
                }else{
                    $dni=$tmp_dni;
                }
            }
        }


        if($tmp_usuario == ''){
            $err_usuario="El usuario es obligatorio";
        }else {
            //letras de la A a la Z (mayus o minus), numeros y barrabaja
            $patron = "/^[a-zA-Z0-9_]{4,12}$/";
            if (!preg_match($patron, $tmp_usuario)){
                $err_usuario="El usuario debe contener de 4 a 12 letras, número o barrabaja";

            }else{
                $usuario = $tmp_usuario; 
            }
        
        }
        if($tmp_nombre == ''){
            $err_nombre="El nombre es obligatorio";
        }else {
            if (strlen($tmp_nombre)<2 || strlen($tmp_nombre)> 40){
                $err_nombre="El nombre debe contener de 2 y 40 caracteres";
            }else{
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
                if (!preg_match($patron, $tmp_nombre)){
                    $err_nombre="El nombre solo debe contener letras y espacios en blanco";
                }else{
                    $nombre = $tmp_nombre; 
                }
            }
        }

        if($tmp_apellidos == ''){
            $err_apellidos="El apellido es obligatorio";
        }else {
            if (strlen($tmp_apellidos)<2 || strlen($tmp_apellidos)> 40){
                $err_apellidos="El apellido debe contener de 2 y 40 caracteres";
            }else{
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
                if (!preg_match($patron, $tmp_apellidos)){
                    $err_apellidos="El apellido solo debe contener letras y espacios en blanco";
                }else{
                    $apellidos = $tmp_apellidos; 
                }
            }
        }
    }
}
    ?>
<h1>Formulario usuario</h1>

<form class="col-3" action="" method="post">
<div class="mb-3">
  <label class="form-label">DNI</label>
  <input type="text" class="form-control"  name="dni">
  <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>";?>
</div>
<div class="mb-3">
  <label class="form-label">Correo electrónico</label>
  <input type="text" class="form-control"  name="correo">
  <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>";?>
</div>
<div class="mb-3">
  <label class="form-label">Usuario</label>
  <input type="text" class="form-control"  name="usuario">
  <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>";?>
</div>
<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input class="form-control" type="text" name="nombre">
  <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";?>
  
</div>
<div class="mb-3">
  <label class="form-label">Apellidos</label>
  <input class="form-control" type="text" name="apellidos">
  <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>";?>
</div>
<label>Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento">
        <?php if(isset($err_fechaNacimiento)) echo "<span class='error'>$err_fechaNacimiento</span>";?>
        <?php echo"<span>$fechaNacimiento_comprobar</span>";?>
<div>
<input type="submit" class="btn btn-outline-primary" value="Enviar">
</div>
</form>
<?php
if(isset($dni)&&isset($correo)&&isset($usuario)&&isset($nombre)&&isset($fecha)){?>
    <h1><?php echo $dni ?></h1>
    <h1><?php echo $correo ?></h1>
    <h1><?php echo $usuario ?></h1>
    <h1><?php echo $nombre ?></h1>
    <h1><?php echo $fechaNacimiento ?></h1>

<?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>