<?php
function hacerEjemplo( string $mensaje,int $veces){
    if($mensaje!='' and $veces != '' ){ /*NO HACER AQUI LA COMPROBACION, HACERLA DONDE SE LLAMA LA FUNCION  */
    for($i=0;$i<$veces;$i++){
            
        echo "<h1>$mensaje</h1>";
    }
}else{
    echo "<p>Te faltan datos </p>";
}
}
function hacerPotencias(int $base,int $exponente): int{
    $res = 1 ;
    if($base!='' and $exponente != ''){
    for($i=0;$i<$exponente ;$i++){
        $res*=$base;
    }
   return $res ;
}else{
    echo "<p>Te faltan datos </p>";
}
}
define("GENERAL", 1.21);
define("REDUCIDO", 1.1);
define("SUPERREDUCIDO", 1.04);

function hacerIva(int | float $precio, string $iva) : float{// puede entrar int o float, un string en iva y debe devolver un float
    $pvp = match($iva) {
        "GENERAL" => $precio * GENERAL,
        "REDUCIDO" => $precio * REDUCIDO,
        "SUPERREDUCIDO" => $precio * SUPERREDUCIDO
    };
    return $pvp;
}

function hacerMulti(int | float $num, $res){
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