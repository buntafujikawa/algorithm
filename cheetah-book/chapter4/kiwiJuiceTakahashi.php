<?php

$capacities = [20, 20];
$bottles = [5, 8];
$fromIds = [0];
$toIds = [1];

$KiwiJuiceTakahashi = new KiwiJuiceTakahashi();
var_dump($KiwiJuiceTakahashi->run($capacities, $bottles, $fromIds, $toIds));

class KiwiJuiceTakahashi
{
    function run(array $capacities, array $bottles, array $fromIds, array $toIds)
    {
        for ($i = 0; $i < count($fromIds); $i++) {
            // 移動元ジュース量と移動先ジュース量の総和が一定
            $sum = $bottles[$fromIds[$i]] + $bottles[$toIds[$i]];
            $bottles[$toIds[$i]] = min($sum, $capacities[$toIds[$i]]);
            $bottles[$fromIds[$i]] = $sum - $bottles[$toIds[$i]];
        }

        return $bottles;
    }
}
