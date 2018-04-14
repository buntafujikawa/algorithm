<?php

$numbers = [2, 3, 4];

$cryptography = new CryptographyReview();
var_dump($cryptography->run($numbers));

class CryptographyReview
{
    function run(array $numbers)
    {
        $max = 0;
        for ($i =0; $i < count($numbers); $i++) {
            $num = 1;
            for ($j =0; $j <count($numbers); $j++) {
                $num *= $i === $j ? $numbers[$j] + 1 : $numbers[$j];
            }

            $max = max($max, $num);
        }

        return $max;
    }
}
