<!-- Equipos de la liga

- Nombre (letras con tilde, ñ, espacios en blanco y punto, entre 3 y 40 caracteres)
- Inicial (3 letras)
- Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
- Ciudad (letras con tilde, ñ, ç y espacios en blanco)
- Tiene titulo liga (select con si o no)
- Fecha de fundación (entre hoy y el 18 de diciembre de 1889)
- Número de jugadores (entre 19 y 32) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    

<form action="" method="post">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre">
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";?>
        <br>
        <label class="form-label">Fecha:</label>
        <input type="date" name="fecha_fundacion">
        <?php if(isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>";?>
        <br>
        <label class="form-label">Liga:</label>
        <input type="text" name="liga">
        <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>";?>
        <br>
        <label class="form-label">Ciudad:</label>
        <input type="text" name="ciudad">
        <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>";?>
        <br>
        <label class="form-label">Titulo de la liga:</label>
        <select name="liga">
            <option value="Si">Si</option>
            <option value="No">No</option>
         </select>
        <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>";?>
        <br>
        <label class="form-label">Liga:</label>
        <select name="titulo_liga">
            <option disabled selected hidden>--- Elige una liga---</option>
            <option value="ea">Liga EA Sports</option>
            <option value="hyper">Liga Hypermotion</option>
            <option value="rfef">Liga Primera RFEF</option>

         </select>
        <?php if(isset($err_titulo_liga)) echo "<span class='error'>$err_titulo_liga</span>";?>
        <br>
        <label class="form-label">Nº de jugadores:</label>
        <input tyer="text" name="jugadores"></input>
        <?php if(isset($err_jugadores)) echo "<span class='error'>$err_jugadores</span>";?>
        <br>
        <input type="submit" name="Enviar">
    </form>
<?php
if(isset($nombre) && isset($inicial) && isset($liga) 
&& isset($ciudad) && isset($titulo_liga) && isset($fecha_fundacion) 
&& isset($numero_jugadores)){
    echo "<h1>$nombre</h1>";
    echo "<h1>$inicial</h1>";
    echo "<h1>$ciudad</h1>";
    echo "<h1>$titulo_liga</h1>";
    echo "<h1>$fecha_fundacion</h1>";
    echo "<h1$numero_jugadores</h1>";
}
?>
</body>
</html>
<!-- Equipos de la liga

- Nombre (letras con tilde, ñ, espacios en blanco y punto)+
- Inicial (3 letras)+
- Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)   <option disabled selected hidden>--- Elige si ---</option>
- Ciudad (letras con tilde, ñ, ç y espacios en blanco)+
- Tiene titulo liga (select con si o no)+
- Fecha de fundación (entre hoy y el 18 de diciembre de 1889)+
- Número de jugadores (entre 19 y 32) -->