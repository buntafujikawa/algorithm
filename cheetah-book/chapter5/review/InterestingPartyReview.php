<?php

$first = ["fishing", "gardening", "swimming", "fishing"];
$second = ["hunting", "fishing", "fishing", "biting"];

$party = new InterestingPartyReview();
var_dump($party->run($first, $second));

class InterestingPartyReview
{
    function run(array $first, array $second)
    {
        $hobbyList = [];
        for ($i = 0; $i < count($first) - 1; $i++) {
            if (array_key_exists($first[$i], $hobbyList)) {
                for ($j = $i + 1; $j < count($first); $j++) {
                    if ($first[$i] === $first[$j] || $first[$i] === $second[$j]) {
                        $hobbyList[$first[$i]]++;
                    }
                }
            } else {
                $hobbyList[$first[$i]] = 1;
            }

            if (array_key_exists($second[$i], $hobbyList)) {
                for ($j = $i + 1; $j < count($first); $j++) {
                    if ($second[$i] === $first[$j] || $second[$i] === $second[$j]) {
                        $hobbyList[$second[$i]]++;
                    }
                }
            } else {
                $hobbyList[$second[$i]] = 1;
            }

        }

        return max($hobbyList);
    }
}
