<?php

$answer1 = "YNYY";
$answer2 = "YNNN";
$answer3 = "NNNN";
$answer4 = "YYYY";

$numberMagic = new NumberMagicEasy();
var_dump($numberMagic->theNumber($answer2));

class NumberMagicEasy
{
    function theNumber($answer): int
    {
        $numA = [1, 2, 3, 4, 5, 6, 7, 8];
        $numB = [1, 2, 3, 4, 9, 10, 11, 12];
        $numC = [1, 2, 5, 6, 9, 10, 13, 14];
        $numD = [1, 3, 5, 7, 9, 11, 13, 15];

        for ($i = 1; $i <= 16; $i++) {
            if ($this->check($numA, $i) != mb_substr($answer, 0, 1)) {
                continue;
            }

            if ($this->check($numB, $i) != mb_substr($answer, 1, 1)) {
                continue;
            }

            if ($this->check($numC, $i) != mb_substr($answer, 2, 1)) {
                continue;
            }
            if ($this->check($numD, $i) != mb_substr($answer, 3, 1)) {
                continue;
            }
            return $i;
        }

        return 0;
    }

    function check(array $x, $number) : string
    {
        for ($i =0; $i < count($x); $i++) {
            if ($x[$i] == $number) {
                return 'Y';
            }
        }
        return 'N';
    }
}
