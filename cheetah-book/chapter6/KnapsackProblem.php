<?php

$knapsack = new KnapsackProblem();
var_dump($knapsack->knapsack(0, 0));

class KnapsackProblem
{
    const WEIGHT_LIST = [3, 4, 1, 2, 3];
    const VALUE_LIST = [2, 3, 2, 3, 6];
    const MAX_WEIGHT = 10;

    private $dp = [];

    function knapsack($n, $w): int
    {
        if ($w > self::MAX_WEIGHT) {
            return -1;
        }

        if ($n >= count(self::WEIGHT_LIST)) {
            return 0;
        }

        if (!empty($this->dp[$n][$w]) && $this->dp[$n][$w] >= 0) {
            return $this->dp[$n][$w];
        }

        return $this->dp[$n][$w] = max($this->knapsack($n + 1, $w), $this->knapsack($n + 1, $w + self::WEIGHT_LIST[$n]) + self::VALUE_LIST[$n]);
    }
}
