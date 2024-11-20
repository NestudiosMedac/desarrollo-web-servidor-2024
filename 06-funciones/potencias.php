<?php
    function potencia(int $base, int $exponente): int{
        $res = 1;
        for($i=0;$i<$exponente ;$i++){
        $res*=$base;
        }
        return $res;
    }
?>