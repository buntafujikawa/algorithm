<?php

$numbers = [2, 3, 4];

$cryptography = new CryptographyAdvancedVersion();
var_dump($cryptography->encrypt($numbers));

class CryptographyAdvancedVersion
{
    function encrypt(array $numbers)
    {
        $seki = 1;
        for ($i = 0; $i < count($numbers); $i++) {
            $seki *= $numbers[$i];
        }

        $max = 0;
        for ($i = 0; $i < count($numbers); $i++) {
            $max = max($max, $seki / $numbers[$i] * ($numbers[$i] + 1));
        }

        return $max;
    }
}
