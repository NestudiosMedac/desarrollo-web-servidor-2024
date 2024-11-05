<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
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
    function depurar(string $entrada): string{// el primer String fuerza que sea un string, el segundo detras de : es para delvolver es un String, sino peta
        $salida = htmlspecialchars($entrada);//asi no se meten cosas de html
        $salida = trim ($salida);
        $salida = preg_replace('!\s+!', '', $salida);//quita los espacios sobrantes
        return $salida;
    }
    ?>


<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_titulo = depurar($_POST["titulo"]);
        $tmp_consola = depurar($_POST["consola"]);
        $tmp_fecha = depurar($_POST["fecha"]);
        $tmp_pegi = depurar($_POST["pegi"]);
        $tmp_descripcion = depurar($_POST["descripcion"]);




    if($tmp_titulo == ""){
        $err_titulo="El titulo es obligatorio";
    }else{
        if(strlen($tmp_titulo)> 1 && strlen($tmp_titulo) < 80){
        $err_titulo= "El titulo debe tener un largo de 1 a 80 carácteres";
        }else{//hacer con array para practicar
           $titulo = $tmp_titulo;
                    
        }
    }
    if($tmp_pegi == ""){
        $err_pegi="Debes selecionar un pegi";

    }else{
        switch($tmp_pegi){
            case "3":
            case "7":
            case "12":
            case "16":
            case "18":
                $tmp_pegi=$pegi;
                break;
            default:
                $err_pegi="Pegi no valido";
        }
    }
    if($tmp_fecha == '') {
        $err_fecha = "La fecha es obligatoria";
    } else {
        $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
        if(!preg_match($patron,$tmp_fecha)) {
            $err_fecha= "El formato de la fecha es incorrecto";
        } else {
            $fecha_actual = date("Y-m-d"); 
            list($anno_actual,$mes_actual,$dia_actual) = 
                explode('-',$fecha_actual);
            list($anno,$mes,$dia) = 
                explode('-',$tmp_fecha);

            if ($anno<1947){
                $err_fecha= "La fecha es muy antigua";
            }else{
            if (($anno_actual+5)>$anno){
                $err_fecha= "La fecha tiene como limite 5 años mas de la fecha actual";
            }else{
                $tmp_fecha=$fecha;
            }

        }    
    }
}
    if($tmp_descripcion == ""){
               $descripcion = $tmp_descripcion;        
    }else{
        if(strlen($tmp_descripcion)> 250 ){
        $err_titulo= "La descripción no debe superar los 255 caracateres";
        }else{
           $descripcion = $tmp_descripcion;        
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



}
    ?>




<form action="" method="post">
        <label>Titulo:</label>
        <input type="text" name="titulo">
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>";?>
        <label>Consola:</label>
        <input type="radio" name="consola">
        <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>";?>
        <label>Fecha:</label>
        <input type="date" name="fecha">
        <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>";?>
        <label>Pegi:</label>
        <select name="Pegi">
            <option value="3">3</option>
            <option value="7">7</option>
            <option value="12">12</option>
            <option value="16">16</option>
            <option value="18">18</option>
         </select>
        <?php if(isset($err_pegi)) echo "<span class='error'>$err_pegi</span>";?>
        <label>Descripcion:</label>
        <input type="text" name="descripcion">
        <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";?>
        <br>
        <input type="submit" name="Enviar">
    </form>
    
</body>
</html>