<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Anime</title>
</head>
<body>
    <?php
     $id = $_GET["id"];
     $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $apiUrl);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $respuesta = curl_exec($curl);
     curl_close($curl);
 
     $datos = json_decode($respuesta, true);
     $anime = $datos["data"];
     ?>

                <h1><?php echo $anime["title"] ?></h1>
                <h2>Nota:</h2>
                <h2><?php echo $anime["score"] ?></h2>
                <h2>Sinopsis:</h2>
                <p><?php echo $anime["synopsis"] ?></td>
                <h2>Generos:</h2>
                <?php 
                $generos = $anime["genres"];
                foreach($generos as $genero){
                ?>
                <li><?php echo $genero["name"] ?></li>
                <?php } ?>
                <iframe src="<?php echo $anime["trailer"]["embed_url"] ?>"></iframe>
                <h2>Lista de animes relacionados:</h2>
                <ul>
                <?php 
                $relacionados = $anime["relations"];
                foreach($relacionados as $relacionado){
                    $entradas = $relacionado["entry"];
                    foreach($entradas as $entrada){
                        if($entrada["type"] == "anime"){?>
                            <li>
                                <a href="anime.php?id=<?php echo $entrada["mal_id"]?>">
                                    <?php echo $entrada["name"]?>
                                </a>
                            </li>
                            <?php }
                    }
                }
                ?>
                </ul>
 </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>