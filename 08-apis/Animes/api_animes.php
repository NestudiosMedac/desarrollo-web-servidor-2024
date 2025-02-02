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

/*     AÑADIR AL GET DE ANIMES LA POSIBILIDAD DE FILTRAR POR:
- estudio
- rango del anno_estreno. Si no se ponen los dos rangos (desde y hasta), no se filtra por el año de estreno
AÑADIR AL GET DE ANIMES LA POSIBILIDAD DE FILTRAR POR:
- estudio
- rango del anno_estreno. Si no se ponen los dos rangos (desde y hasta), no se filtra por el año de estreno

- api_animes?estudio=Mappa
- api_animes?desde=2000&hasta=2010
- api_animes?desde=2000&hasta=2010&estudio=Diomedéa
 */
    function manejarGet($_conexion) {
        if(isset($_GET["estudio"]) && isset($_GET["anno_estreno"]) ) {
            $sql = "SELECT * FROM animes WHERE anno_estreno from :anno_estreno to :anno_estreno  AND estudio = :estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "anno_estreno" => $_GET["anno_estreno"],
                "estudio" => $_GET["estudio"]
            ]); 
           
        }else{
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        if(isset($_GET["anno_estreno"])){
            $sql = "SELECT * FROM animes WHERE anno_estreno from :anno_estreno to :anno_estreno";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "anno_estreno" => $_GET["anno_estreno"]
            ]);            

        }else{
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        if(isset($_GET["estudio"])){
            $sql = "SELECT * FROM animes WHERE estudio = :estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "estudio" => $_GET["estudio"]
            ]);

        }else{
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }

        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);   # Equivalente al getResult de mysqli
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) {
        $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas)
            VALUES (:titulo, :nombre_estudio, :anno_estreno, :num_temporadas)";

        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"]
        ]);
        if($stmt) {
            echo json_encode(["mensaje" => "el anime se ha insertado correctamente"]);
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