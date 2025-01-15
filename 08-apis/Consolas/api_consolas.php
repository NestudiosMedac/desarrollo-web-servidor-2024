<?php
    error_reporting( E_ALL );
    ini_set("display_errors", 1 );

    header("Content-Type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);
    /**
     * $entrada["numero"] -> <input name="numero">
     */

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            echo json_encode(["metodo" => "put"]);
            break;
        case "DELETE":
            echo json_encode(["metodo" => "delete"]);
            break;
        default:
            echo json_encode(["metodo" => "otro"]);
            break;
    }

    function manejarGet($_conexion) {
        $sql = "SELECT * FROM consolas";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);   # Equivalente al getResult de mysqli
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) {
      $sql = "INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas)
            VALUES (:nombre, :fabricante, :generacion, :unidades_vendidas)";  

        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre" => $entrada["nombre"],
            "fabricante" => $entrada["fabricante"],
            "generacion" => $entrada["generacion"],
            "unidades_vendidas" => $entrada["unidades_vendidas"]
        ]);
        if($stmt) {
            echo json_encode(["mensaje" => "la consola se ha insertado correctamente"]);
        } else {
            echo json_encode(["mensaje" => "error al insertar el estudio"]);
        }
    }
?>

    /*
     {
        "nombre_estudio" : "Medac",
        "ciudad" : "Malaga",
         "anno_fundacion" : "2015"
     }
     */