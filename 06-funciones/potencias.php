<?php
    function potencia($base, $exponente){
        $res = 1;
        for($i=0;$i<$exponente ;$i++){
        $res*=$base;
        }
        return $res;
    }
?>