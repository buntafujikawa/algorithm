<?php

$base = 26;

$interestingDigits = new InterestingDigits();
var_dump($interestingDigits->digits($base));

class InterestingDigits
{
    function digits($base)
    {
        $ans = [];

        for ($i = 2; $i < $base; $i++) {
            if (($base -1) % $i === 0) {
                $ans[] = $i;
            }
        }

        return $ans;
    }
}
