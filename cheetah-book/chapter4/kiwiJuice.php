<?php

$capacities = [20, 20];
$bottles = [5, 8];
$fromIds = [0];
$toIds = [1];

$KiwiJuice = new KiwiJuice();
var_dump($KiwiJuice->run($capacities, $bottles, $fromIds, $toIds));

class KiwiJuice
{
    function run(array $capacities, array $bottles, array $fromIds, array $toIds)
    {
        for ($i = 0; $i < count($fromIds); $i++) {
            $fromId = $fromIds[$i];
            $toId = $toIds[$i];

            // 分岐を極力減らす
            $volume = min($bottles[$fromId], $capacities[$toId] - $bottles[$toId]);

            $bottles[$toId] += $volume;
            $bottles[$fromId] = 0;
        }

        return $bottles;
    }
}
