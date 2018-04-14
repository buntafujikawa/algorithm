<?php

$capacities = [30, 20, 10];
$bottles = [10, 5, 5];
$fromIds = [0, 1, 2];
$toIds = [1, 2, 0];

$kiwi = new kiwiJuiceReview();
var_dump($kiwi->run($capacities, $bottles, $fromIds, $toIds));

class kiwiJuiceReview
{
    function run(array $capacities, array $bottles, array $fromIds, array $toIds): array
    {
        for ($i = 0; $i < count($fromIds); $i++) {
            $sum = $bottles[$fromIds[$i]] + $bottles[$toIds[$i]];
            $bottles[$toIds[$i]] = $sum > $capacities[$toIds[$i]] ? $capacities[$toIds[$i]] : $sum;
            $bottles[$fromIds[$i]] = $sum - $bottles[$toIds[$i]];
        }

        return $bottles;
    }
}
