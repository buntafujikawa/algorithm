<?php

//$donations = [10, 3, 2, 5, 7, 8];
//$donations = [11, 15];
$donations = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];

$badNeighbors = new BadNeighbors();
var_dump($badNeighbors->run($donations));

class BadNeighbors
{
    function run(array $donations): int
    {
        $ans = 0;
        $count = count($donations);
        $dp = [];

        // 寄付金の加算(0番目から開始)
        for ($i = 0; $i < $count - 1; $i++) {
            $dp[$i] = $donations[$i];

            if ($i > 0) {
                $dp[$i] = max($dp[$i], $dp[$i - 1]);
            }

            if ($i > 1) {
                $dp[$i] = max($dp[$i], $dp[$i - 2] + $donations[$i]);
            }

            $ans = max($ans, $dp[$i]);
        }
        var_dump($dp);

        // 寄付金の加算(1番目から開始)
        for ($i = 0; $i < $count - 1; $i++) {
            $dp[$i] = $donations[$i + 1];

            if ($i > 0) {
                $dp[$i] = max($dp[$i], $dp[$i - 1]);
            }

            if ($i > 1) {
                $dp[$i] = max($dp[$i], $dp[$i - 2] + $donations[$i + 1]);
            }

            $ans = max($ans, $dp[$i]);
        }

        var_dump($dp);

        return $ans;
    }
}
