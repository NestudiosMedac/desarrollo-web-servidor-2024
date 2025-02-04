<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Chistes de Chuck Norris</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>

    <?php
    $apiUrlCategorias = "https://api.chucknorris.io/jokes/categories";
    $curlCategorias = curl_init();
    curl_setopt($curlCategorias, CURLOPT_URL, $apiUrlCategorias);
    curl_setopt($curlCategorias, CURLOPT_RETURNTRANSFER, true);
    $respuestaCategorias = curl_exec($curlCategorias);
    curl_close($curlCategorias);

    $categorias = json_decode($respuestaCategorias, true);

  
    $apiUrlChiste = "https://api.chucknorris.io/jokes/random";
    if (isset($_GET["categories"]) && !empty($_GET["categories"])) {
        $categoria = $_GET["categories"];
        $apiUrlChiste = "https://api.chucknorris.io/jokes/random?category={$categoria}";
    }

    $curlChiste = curl_init();
    curl_setopt($curlChiste, CURLOPT_URL, $apiUrlChiste);
    curl_setopt($curlChiste, CURLOPT_RETURNTRANSFER, true);
    $respuestaChiste = curl_exec($curlChiste);
    curl_close($curlChiste);

    $datosChiste = json_decode($respuestaChiste, true);
    $chiste = isset($datosChiste["value"]) ? $datosChiste["value"] : "No se pudo obtener un chiste.";
    ?>

    <div class="container">
        <form action="" method="get">
            <label class="form-label">Categoría:</label>
            <select name="categories" id="categories" class="form-select">
                <option disabled selected hidden>--- Elige una categoría ---</option>
                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" value="Nuevo chiste" class="btn btn-primary">
            <br>
        </form>
        <p><?php echo $chiste; ?></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
