<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Top animes</title>
    <?php
    error_reporting( E_ALL );
    ini_set("display_errors", 1 );
    ?>
</head>
<body>
<div class="container">
<form action="" method="get">
    <p class="form-label">Escoge un filtro:</p>
    <input type="radio" id="serie" name="type" value="TV">   
    <label for="serie" class="form-label">Serie</label><br>
    <input type="radio" id="pelicula" name="type" value="Movie">
    <label for="pelicula" class="form-label">Pelicula</label><br>
    <input type="radio" id="todos" name="type" value="">
    <label for="todos" class="form-label">Todos</label>
    <br>
    <input type="submit" value="Enviar">
    <br>
</form>
    <?php
          $type = isset($_GET['type']) ? $_GET['type'] : '';
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
  
          // Construir la URL
          $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$page";
          if (!empty($type)) {
              $apiUrl .= "&type=$type";
          }
  


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes=$datos["data"];
    $pagination=$datos["pagination"];

   


    ?>
  


<table class='table table-striped table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Posición:</th>
                <th>Titulo:</th>
                <th>Nota:</th>
                <th>Imágen:</th>

            </tr>
        </thead>
         <tbody>
            <?php
                foreach($animes as $anime){?>
            <tr>
                <td><?php echo $anime["rank"] ?></td>
                <td>
                  <a href="anime.php?id=<?php echo $anime["mal_id"]?>">
                        <?php echo $anime["title"]?>
                    </a>
                </td>
                <td><?php echo $anime["score"] ?></td>
                <td><img width="100px"src= "<?php echo $anime["images"]["jpg"]["image_url"]?>"></img></td>
            </tr>
            <?php  
            
            
            }

            ?>
        </tbody>
    </table>
    <?php if ($pagination['current_page'] > 1) { ?>
            <a href="?page=<?php echo $page - 1; ?>&type=<?php echo $type; ?>">Página Anterior</a>
        <?php } ?>
        <?php if ($pagination['has_next_page']) { ?>
            <a href="?page=<?php echo $page + 1; ?>&type=<?php echo $type; ?>">Página Siguiente</a>
        <?php } ?>

 </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>