<?php

$capacities = [20, 20];
$bottles = [5, 8];
$fromIds = [0];
$toIds = [1];

$KiwiJuiceEasy = new KiwiJuiceEasy();
var_dump($KiwiJuiceEasy->run($capacities, $bottles, $fromIds, $toIds));


class KiwiJuiceEasy
{
    function run(array $capacities, array $bottles, array $fromIds, array $toIds)
    {
        for ($i = 0; $i < count($fromIds); $i++) {
            $fromId = $fromIds[$i];
            $toId = $toIds[$i];
            $space = $capacities[$toId] - $bottles[$toId];

            if ($space >= $bottles[$fromId]) {
                $volume = $bottles[$fromId];
                $bottles[$toId] += $volume;
                $bottles[$fromId] = 0;
            } else {
                $volume = $space;
                $bottles[$toId] = $volume;
                $bottles[$fromId] = 0;
            }
        }

        return $bottles;
    }
}
