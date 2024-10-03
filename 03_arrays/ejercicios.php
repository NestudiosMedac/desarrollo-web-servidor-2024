<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <?php # para que se muestre el error
          error_reporting( E_ALL );
          ini_set( "display_errors", 1 );    
    ?>
     <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

        <!--    EJERCICIO 1
                
            Desarrollo web en entorno servidor => Alejandra
            Desarrollo web en entorno cliente => José Miguel
            Diseño de interfaces web => José Miguel
            Despliegue de aplicaciones => Jaime
            Empresa e iniciativa emprendedora => Andrea
            Inglés => Virginia

            MOSTRARLO TODO EN UNA TABLA
        -->
        <table>
        <caption>Asignaturas</caption>
        <thead>
            <tr><!--columnas--->
                <th>Asignaturas</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $Asignaturas=[
            "Desarrollo web en entorno servidor" => "Alejandra",
            "Desarrollo web en entorno cliente" => "José Miguel",
            "Diseño de interfaces web" => "José Miguel",
            "Despliegue de aplicaciones" => "Jaime",
           " Empresa e iniciativa emprendedora" =>" Andrea",
            "Inglés" =>" Virginia"


        ];
        
                foreach($Asignaturas as $Asignatura=>$profesor) { ?>
                        <tr>
                            <td><?php echo $Asignatura, ":"?></td>
                            <td><?php echo$profesor?></td>
                         </tr>
                        <?php } ?>
        <t/body>
    
        <!--    EJERCICIO 2
            
            Francisco => 3
            Daniel => 5
            Aurora => 10
            Luis => 7
            Samuel => 9

            MOSTRAR EN UNA TABLA CON 3 COLUMNAS (if else if)
            - COLUMNA 1: ALUMNO
            - COLUMNA 2: NOTA
            - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO
            Reto en Rojo los suspensos, en verde los aprobados
    -->
    <table>
        <caption>Alumnos</caption>
        <thead>
            <tr><!--columnas--->
                <th>Alumnos</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $Alumnos=[
            "Francisco" => 3,
            "Daniel" => 5,
            "Aurora" => 10,
            "Luis" => 7,
            "Samuel" => 9
        ];?>

                <?php foreach($Alumnos as $Alumno=>$Nota) { ?>
                        <tr>
                            <td><?php echo $Alumno, ":"?></td>
                            <td><?php echo$Nota?></td>
                            <?php if($Nota<5){?>
                                 <td class="sus">SUSPENSO</td>
                                 <?php }else{?>
                                    <td class="apro">APROBADO</td>
                                    <?php }?>
                         </tr>
                        <?php }?>
        <t/body>


</body>
</html>