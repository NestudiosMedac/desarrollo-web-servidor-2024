<?php
function hacerEjemplo($mensaje,$veces){
    if($mensaje!='' and $veces != '' ){
    for($i=0;$i<$veces;$i++){
            
        echo "<h1>$mensaje</h1>";
    }
}else{
    echo "<p>Te faltan datos </p>";
}
}
function hacerPotencias($base,$exponente, $res){
    if($base!='' and $exponente != '' and $res != ''){
    for($i=0;$i<$exponente ;$i++){
        $res*=$base;
    }
    echo "<h2>$res</h2>";
}else{
    echo "<p>Te faltan datos </p>";
}
}
function hacerIva($precio,$iva){
    if($precio!='' and $iva != ''){
        $general=1.21;
        $reducido=1.10;
        $superreducido=1.04;
        
        $pvp = match($iva) {
        "general" => $precio * $general,
        "reducido" => $precio * $reducido,
        "superreducido" => $precio * $superreducido,
    };

        echo "<p>El PVP ES $pvp</p>";
    }else{
        echo "<p>Te faltan datos </p>";

}
}
function hacerMulti($num,$res){
    if($num!=''){
    for($i=0;$i<=10 ;$i++){
        $res=$num*$i;
       echo "<tr>"; 
        echo "<td> $num x $i = </td>";
        echo "<td>$res</td>";
       echo "</tr>"; 
    }
}else{
    echo "<p>Te faltan datos </p>";

}
}
?>