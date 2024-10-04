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
        $asignaturas=[//clave, valor
            "Desarrollo web en entorno servidor" => "Alejandra",
            "Desarrollo web en entorno cliente" => "José Miguel",
            "Diseño de interfaces web" => "José Miguel",
            "Despliegue de aplicaciones" => "Jaime",
           " Empresa e iniciativa emprendedora" =>"Andrea",
            "Inglés" =>"Virginia"


        ];
        //sort, rsort,asort,arsort,krsort
        asort($asignaturas);
        ksort($asignaturas);
                foreach($asignaturas as $asignatura=>$profesor) { ?>
                        <tr>
                            <td><?php echo $asignatura, ":"?></td>
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
            "Luis" => 1,
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

        </table>
        <?php 
        /**
         * Insertar dos nuevos estudiantes con notas aleatorias entre 0 y 10
         * 
         * Borrar un estudiante (el que peor os caiga) por la clave
         * 
         * Mostrar en una nueva tabla todo ordenado por los nombres en orden alfabeticamente inverso
         * 
         * Mostrar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso)*/?>
</body>
</html>