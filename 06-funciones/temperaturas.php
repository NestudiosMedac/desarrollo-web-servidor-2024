
<?php
//vamos a crear una funcion que reciba la temperatura, la unidad inicial y final, y devuelva la final
    function convertirTemperatura($temperaturaInicial,$unidadInicial, $unidadFinal){
        $temperaturaFinal = $temperaturaInicial;

    if($unidadInicial == "C"){
        if($unidadFinal == "k"){
                $temperaturaFinal = $temperaturaInicial + 273.15;
        }elseif($unidadFinal == "F"){
            $temperaturaFinal = ($temperaturaInicial - 273) * (9/5) + 32;
        }
    }elseif($unidadInicial == "F"){
        if($unidadFinal == "C"){
            $temperaturaFinal = ($temperaturaInicial - 32) * (5/9);
        }elseif($unidadFinal == "K"){
            $temperaturaFinal = ($temperaturaInicial - 32) * (5/9) + 273.15;
        }
    } 
echo "<p>$temperaturaFinal</p>";

}
?>