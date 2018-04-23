<?php

//$donations = [10, 3, 2, 5, 7, 8];
//$donations = [11, 15];
$donations = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];

$badNeighbors = new BadNeighborsReview();
var_dump($badNeighbors->run($donations));

class BadNeighborsReview
{
    function run(array $donations): int
    {
        $ans = 0;
        $dp = [];

        for ($i = 0; $i < count($donations) - 1; $i++) {
            $dp[$i] = $donations[$i];

            // 一つ前の家とどちらが金額が大きいかを確認する
            if ($i > 0) {
                $dp[$i] = max($dp[$i], $dp[$i - 1]);
            }

            if ($i > 1) {
                $dp[$i] = max($dp[$i], $dp[$i - 2] + $donations[$i]);
            }
        }

        for ($i = 0; $i < count($donations) - 1; $i++) {
            $dp[$i] = $donations[$i + 1];

            if ($i > 0) {
                $dp[$i] = max($dp[$i], $dp[$i - 1]);
            }

            if ($i > 1) {
                $dp[$i] = max($dp[$i], $dp[$i - 2] + $donations[$i + 1]);
            }

            $ans = max($ans, $dp[$i]);
        }

        return $ans;
    }
}
