<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
        <?php?>
</head>
<body>
 <?php
    $array =[];

    $videojuegos = [
        ["Disco Elysium","RPG",24.99],// "V01"=>["TITULO"=>"Disco Elysium","RPG",9.99], Esto existe
        ["DB Z kakarot","Acción",59.99],
        ["Persona 3","RPG",24.99],
        ["Commando 2","Estrategia",4.99],
        ["Hollow Knight","Metroidvania",9.99],
        ["Stardew Valley","Gestión de recursos",7.99]
    ];

        array_push($videojuegos,["Dota 2","MOBA",0]);
        array_push($videojuegos,["Fall Guys","Plataforma",0]);
        array_push($videojuegos,["Rocket League","Deporte",0]);
        array_push($videojuegos,["Lego Fornite","Acción",0]);
        
    //añadir una columna

    for($i=0; $i<count($videojuegos); $i++){
        if($videojuegos[$i][2]==0){
            $videojuegos[$i][3]="Si";
        }else{
            $videojuegos[$i][3]="No";
        }
    }
    //ORGANIZAR
    $_titulo = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);

    //si fuera descendente, SORT_DESC
   // array_multisort($_titulo, SORT_ASC, $videojuegos);//solo se puede usar una vez
   $_titulo=array_column($videojuegos, 0);
   $_categoria = array_column($videojuegos, 1);
   $_precio=array_column($videojuegos, 2);
   array_multisort($_categoria, SORT_ASC,
                   $_precio, SORT_DESC, 
                   $_titulo, SORT_DESC, 
                   $videojuegos);


 ?>
   
 <table>
    <thead>
        <tr>
            <th>Videojuego</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Free to play</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($videojuegos as $videojuego){

            //print_r($videojuego);
            //echo $videojuego[0];// asi tambien podemos sacar asi las columnas
            //echo"<br><br>";
            list ($titulo,$categoria,$precio,$freetoplay)=$videojuego;
            /**list resume esto:
             * $titulo=$videojuego[0];
             * $categoria=$videojuego[1];
             * $precio=$videojuego[2];
            */
            echo "<tr>";
            echo "<td>$titulo</td>";
            echo "<td>$categoria</td>";
            echo "<td>$precio</td>";
              //añadir una columna donde diga si es gratis o no
            echo "<td>$freetoplay</td>";
            echo "</tr>";
          

        };
       // $nuevo_viodeojuego=["Octopath Traveler","RPG",29.95];
       
        //array_push($videojuegos,$nuevo_viodeojuego);// array_push($videojuegos,["Octopath Traveler","RPG",29.95]); esta es mas mejor ;)
        //print_r($videojuegos);

        //unset($videojuegos[3]);// El registro 3 quedaria borrado
        //$videojuegos=array_values($videojuegos);//y con esto ya se reasignaria y el hueco del tres ya no estaria y estaria todo bien organizado
        //print_r($videojuegos);
        
        ?>
    </tbody>
 </table>
</body>
</html>