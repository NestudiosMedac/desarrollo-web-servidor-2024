<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Perritos raza</title>
    <?php
    error_reporting( E_ALL );
    ini_set("display_errors", 1 );
    ?>
</head>
<body>
<!-- Crea una página llamada perrito_raza.php que nos muestre un
perrito al azar de la raza escogida. La raza se escogerá mediante un campo
de tipo select. ¡Ten cuidado con la forma de mostrar las razas en el
desplegable, tiene truco!
 -->
    <?php
   
   $RazaApiUrl = "https://dog.ceo/api/breeds/list/all";
    $curlRaza = curl_init();
    curl_setopt($curlRaza, CURLOPT_URL, $RazaApiUrl);
    curl_setopt($curlRaza, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curlRaza);
    curl_close($curlRaza);

    $datos = json_decode($respuesta, true);
    $razas = $datos["message"];
    
    
  /*   $apiUrl = "https://dog.ceo/api/breeds/image/random";

    if(isset($raza)){
        $raza=$_GET[""];
        $apiUrl = "hhttps://dog.ceo/api/breed/hound/images/random";
    } */

    ?>



<div class="container">
        <form action="" method="get">
            <label class="form-label">Categoría:</label>
            <select name="breeds" id="breeds" class="form-select">
                <option disabled selected hidden>--- Elige una raza ---</option>
                <?php foreach ($razas as $raza) { ?>
                    <option value="<?php echo $raza; ?>"><?php echo $raza; ?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" value="Nuevo raza" class="btn btn-primary">
            <br>
        </form>
    </div>
 











<table class='table table-striped table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Imagen:</th>

            </tr>
        </thead>
         <tbody>
            <?php
                // foreach razas as raza =>subrazas
                // if empty subrazas 
                //echo raza
                //else
                //foreach subrazas as subraza
                // echo raza +subraza
                //end if
                //end foreach
                foreach($razas as $raza){?>
            <tr>
                <td><img width="100px"src= "<?php echo $raza["message"]?>"></img></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>