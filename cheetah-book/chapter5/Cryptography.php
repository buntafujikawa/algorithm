<?php

$numbers = [2, 3, 4];

$cryptography = new Cryptography();
var_dump($cryptography->encrypt($numbers));

class Cryptography
{
    function encrypt(array $numbers)
    {
        $max = 0;
        for ($i = 0; $i < count($numbers); $i++) {
            $seki = 1;
            for ($j = 0; $j < count($numbers); $j++) {
                if ($numbers[$i] == $numbers[$j]) {
                    $seki *= $numbers[$j] + 1;
                } else {
                    $seki *= $numbers[$j];
                }
            }
            $max = max($max, $seki);
        }

        return $max;
    }
}
