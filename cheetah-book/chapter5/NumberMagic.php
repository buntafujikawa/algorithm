<?php

$answer1 = "YNYY";
$answer2 = "YNNN";
$answer3 = "NNNN";
$answer4 = "YYYY";

$numberMagic = new NumberMagic();
var_dump($numberMagic->theNumber($answer2));

class NumberMagic
{
    function theNumber($answer): int
    {
        $c = [
            "YYYYYYYYNNNNNNNN",
            "YYYYNNNNYYYYNNNN",
            "YYNNYYNNYYNNYYNN",
            "YNYNYNYNYNYNYNYN"
        ];
        for ($i = 0; $i <= 15; $i++) {
            $tmp = "";
            for ($j = 0; $j < 4; $j++) {
                $tmp .= mb_substr($c[$j], $i, 1);
                if ($answer == $tmp) {
                    return $i + 1;
                }
            }
        }
        return 0;
    }
}
