<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>
</head>
<body>
    <h1>Lista con WHILE</h1>
    <?php
    $i=1;
    echo "<ul>";
    while(i<=10){
        echo"<li>$i</li>";
        $i++;
    };
    echo "</ul>";
    ?>

<h1>Lista con WHILE alernativa</h1>
    <?php
    $i=1;
    echo "<ul>";
    while(i<=10):
        echo"<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";
    ?>
<h1>Lista con FOR</h1>
<?php
      
    echo "<ul>";
    for($j= 1; $j<=10;$j++){
        echo"<li>$j</li>";
    };
    echo "</ul>";
    ?>

<h1>Lista con FOR alterntiva</h1>
<?php
      
    echo "<ul>";
    for($j= 1; $j<=10;$j++):
        echo"<li>$j</li>";
    endfor;
    echo "</ul>";
    ?>

<h1>Lista con FOR con BREAK cursed</h1>
<?php
      
    echo "<ul>";
    $j= 1;
    for( ; ; ){#asi se hacen los virus, contra menos legible mas indetectable, CÓDIGO OFUSCADO
        $j++;
        if($j>=10){#re cursed
            break;
        }
        echo"<li>$j</li>";
    };
    echo "</ul>";


    



    ?>


</body>
</html>