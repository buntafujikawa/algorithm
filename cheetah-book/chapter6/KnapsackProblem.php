<?php

$knapsack = new KnapsackProblem();
var_dump($knapsack->knapsack(0, 0));
var_dump($knapsack->knapsackDp());

class KnapsackProblem
{
    const WEIGHT_LIST = [3, 4, 1, 2, 3];
    const VALUE_LIST = [2, 3, 2, 3, 6];
    const MAX_WEIGHT = 10;

    private $dp = [];
    private $ret = 0;

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

        return $this->dp[$n][$w] = max($this->knapsack($n + 1, $w),
            $this->knapsack($n + 1, $w + self::WEIGHT_LIST[$n]) + self::VALUE_LIST[$n]);
    }

    function knapsackDp()
    {
        for ($i = 0; $i < count(self::WEIGHT_LIST); $i++) {
            for ($j = 0; $j <= self::MAX_WEIGHT; $j++) {
                if ($j + self::WEIGHT_LIST[$i] <= self::MAX_WEIGHT) {
                    $this->dp[$i + 1][$j + self::WEIGHT_LIST[$i]] =
                        max($this->dp[$i + 1][$j + self::WEIGHT_LIST[$i]], $this->dp[$i][$j] + self::VALUE_LIST[$j]);
                    $this->ret = max($this->dp[$i + 1][$j + self::WEIGHT_LIST[$i]], $this->ret);
                }
            }
        }

        return $this->ret;
    }
}
