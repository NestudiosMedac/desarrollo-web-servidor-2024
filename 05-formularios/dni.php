<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNI</title>
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

<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_dni=$_POST["dni"];
        $tmp_nombre=$_POST["nombre"];
        $tmp_primerApellido=$_POST["primerApellido"];
        $tmp_segundoApellido=$_POST["segundoApellido"];
        $tmp_fechaNacimiento=$_POST["fechaNacimiento"];
        $tmp_correo=$_POST["correo"];


    if($tmp_dni == ""){
        $err_dni="El DNI es obligatorio";
    }else{
        $patron = "/^[0-9]{8}[A-Z]{1}$/";
        if(!preg_match($patron, $tmp_dni)){
        $err_dni= "El DNI debe tener un largo de 9 digitos, 8 numeros(0,9) y una letra";
        }else{//hacer con array para practicar
            $letraDNI= $tmp_dni[8];
            $arrayLetras=["T","R"];
                switch((int)$tmp_dni%23){
                    case 0: 
                        if($letraDNI == "T"){
                            $dni=$tmp_dni;
                        }else{
                             $err_dni= "letra erronea";
                        }
                    break;
                    case 1: 
                        if($letraDNI == "R"){
                            $dni=$tmp_dni;
                        }else{
                             $err_dni= "letra erronea";
                        }
                    break;
                    case 2: 
                        if($letraDNI == "w"){
                            $dni=$tmp_dni;
                        }else{
                             $err_dni= "letra erronea";
                        }
                    break;
                    case 12: 
                        if($letraDNI == "N"){
                            $dni=$tmp_dni;
                        }else{
                             $err_dni= "letra erronea";
                        }
                    break;
                    
                }
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


    if($tmp_primerApellido && $tmp_segundoApellido == ''){
        $err_apellidos="El apellido es obligatorio";
    }else {
        if (strlen($tmp_primerApellido && $tmp_segundoApellido)<2 || strlen($tmp_primerApellido && $tmp_segundoApellido)> 40){
            $err_apellidos="El apellido debe contener de 2 y 40 caracteres";
        }else{
            $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
            if (!preg_match($patron, $tmp_primerApellido && $tmp_segundoApellido)){
                $err_apellidos="El apellido solo debe contener letras y espacios en blanco";
            }else{
                $primerApellido = $tmp_primerApellido; 
                $segundoApellido = $tmp_segundoApellido; 

            }
        
    
         }


        }



    if($tmp_correo == ''){
        $err_correo="El correo es obligatorio";
    }else {
        $patron = "^[^@]+@[^@]+\.[a-zA-Z]{2,}$";
        if (!preg_match($patron, $tmp_correo)){
            $err_correo="El correo tiene un formato erroneo";
        }else{
            $arrayInsultos=["caca", "culo", "feo"];
            for($i=0; $i<strlen($tmp_correo); $i++){

            if(str_contains($tmp_correo,)){

            }
        }



    }
    }


}
    
    ?>
    <form action="" method="post">
        <label>DNI:</label>
        <input type="text" name="dni">
        <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>";?>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";?>
        <br>
        <label>Primer apellido:</label>
        <input type="text" name="primerApellido">
        <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>";?>
        <br>
        <label>Segundo apellido:</label>
        <input type="text" name="segundoApellido">
        <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>";?>
        <br>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="fechaNacimiento">
        <?php if(isset($err_fechaNacimiento)) echo "<span class='error'>$err_fechaNacimiento</span>";?>
        <br>
        <label>Correo electrónico:</label>
        <input type="text" name="correo">
        <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>";?>
        <br>
        <input type="submit" name="Enviar">
    </form>
    
</body>
</html>