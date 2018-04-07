<?php

$first = ["fishing", "gardening", "swimming", "fishing"];
$second = ["hunting", "fishing", "fishing", "biting"];

$interestingParty = new InterestingParty();
var_dump($interestingParty->bestInvitation($first, $second));

class InterestingParty
{
    function bestInvitation(array $first, array $second)
    {
        $max = 0;
        for ($i = 0; $i < count($first); $i++) {
            $f = 0;
            $s = 0;

            for ($j = 0; $j < count($first); $j++) {
                if ($first[$i] == $first[$j]) {
                    $f++;
                }
                if ($first[$i] == $second[$j]) {
                    $f++;
                }
                if ($second[$i] == $first[$j]) {
                    $s++;
                }
                if ($second[$i] == $second[$j]) {
                    $s++;
                }
            }

            $max = max($max, $f);
            $max = max($max, $s);
        }

        return $max;
    }
}
