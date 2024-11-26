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
        if(isset($_POST["consola"])) $tmp_consola = $_POST["consola"];
        else $tmp_consola ="";
        $tmp_fecha_lanzamiento= depurar($_POST["fecha"]);
        if(isset($_POST["pegi"])) $tmp_pegi = $_POST["pegi"];
        else $tmp_pegi ="";
        $tmp_descripcion = depurar($_POST["descripcion"]);

        if($tmp_titulo == ""){
            $err_titulo="El titulo es obligatorio";
        }else{
            if(strlen($tmp_titulo)< 1 && strlen($tmp_titulo) > 80){
            $err_titulo= "El titulo debe tener un largo de 1 a 80 carácteres";
            }else{
               $titulo = $tmp_titulo;
                        
            }
        }

        if($tmp_consola == '') {
            $err_consola = "La consola es obligatoria";
        } else {
            $consolas_validas = ["ps4","ps5","switch","xbox"];
            if(!in_array($tmp_consola, $consolas_validas)) {
                $err_consola = "Elige una consola válida";
            } else {

            }
        }
        


        if($tmp_fecha_lanzamiento == '') {
            $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron, $tmp_fecha_lanzamiento)) {
                $err_fecha_lanzamiento = "Formato de fecha incorrecto";
            } else {
                list($anno_lanzamiento,$mes_lanzamiento,$dia_lanzamiento) =
                    explode('-',$tmp_fecha_lanzamiento);
                if($anno_lanzamiento < 1947) {
                    $err_fecha_lanzamiento = "El año no puede ser anterior a 1947";
                } else {
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");

                    if($anno_lanzamiento - $anno_actual < 5) {
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    } elseif($anno_lanzamiento - $anno_actual > 5) {
                        $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                    } elseif($anno_lanzamiento - $anno_actual == 5) {
                        if($mes_lanzamiento - $mes_actual < 0) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } elseif($mes_lanzamiento - $mes_actual > 0) {
                            $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                        } elseif($mes_lanzamiento - $mes_actual == 0) {
                            if($dia_lanzamiento - $dia_actual <= 0) {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } elseif($dia_lanzamiento - $dia_actual > 0) {
                                $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                            }
                        }
                    }
                }
            }
        }
    
    /**
     * 1900-10-10 NO
     * 1946-12-31 NO
     * 1947-01-01 SI 
     * 1933-12-02 SI
     * 2034-11-01 NO
     * 1947-01-01 NO
     * no es seguro
     *           
     */

        if($tmp_pegi == '') {
            $err_pegi = "El pegi es obligatorio";
        } else {
            $pegi_validos = ["3","7","12","16","18"];
            if(!in_array($tmp_pegi, $pegi_validos)) {
                $err_pegi = "Elige una pegi valido";
            } else {

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
}
    ?>




<form action="" method="post">
        <label class="form-label">Titulo:</label>
        <input type="text" name="titulo">
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>";?>
        <br>
        <label class="form-label">Consola:</label>
        <div class= "form-check">
            <input class="form-check-input" type="radio" name="consola" value="ps4">
            <label class="form-check-label" >Playstation 4</label>
        </div>
        <div class= "form-check">
            <input class="form-check-input" type="radio" name="consola" value="ps5">
            <label class="form-check-label" >Playstation 5</label>
        </div>
        <div class= "form-check">
            <input class="form-check-input" type="radio" name="consola" value="switch">
            <label class="form-check-label" >Nintendo Switch</label>
        </div>
        <div class= "form-check">
            <input class="form-check-input" type="radio" name="consola" value="xbox">
            <label class="form-check-label" >Xbox Series X/S</label>
        </div>
        <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>";?>
        <br>
        <label class="form-label">Fecha:</label>
        <input type="date" name="fecha">
        <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>";?>
        <br>
        <label class="form-label">Pegi:</label>
        <select name="Pegi">
            <option value="3">3</option>
            <option value="7">7</option>
            <option value="12">12</option>
            <option value="16">16</option>
            <option value="18">18</option>
         </select>
        <?php if(isset($err_pegi)) echo "<span class='error'>$err_pegi</span>";?>
        <br>
        <label class="form-label">Descripcion:</label>
        <textarea class="form-control" name="descripcion"></textarea>
        <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";?>
        <br>
        <input type="submit" name="Enviar">
    </form>
    
</body>
</html>