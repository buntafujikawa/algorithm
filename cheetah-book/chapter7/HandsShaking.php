<?php

//$n = 2;
// 1

//$n = 4;
// 2

$n = 8;
// 14

$handsShaking = new HandsShaking();
var_dump($handsShaking->run($n));

class HandsShaking
{
    function run($n)
    {
        $dp = [];
        $dp[0] = 1;

        for ($i = 1; $i <= $n / 2; $i++) {
            $dp[$i] = 0;
            for ($j = 0; $j < $i; $j++) {
                $dp[$i] += $dp[$j] * $dp[$i - $j - 1];
            }
        }

        return $dp[$n / 2];
    }
}
