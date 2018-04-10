<?php

$answer1 = "YNYY";
$answer2 = "YNNN";
$answer3 = "NNNN";
$answer4 = "YYYY";

$numberMagic = new NumberMagicAdvancedVersion();
var_dump($numberMagic->theNumber($answer2));

class NumberMagicAdvancedVersion
{
    function theNumber($answer): int
    {
        $c = [
            "YYYY", // 1がA~Dそれぞれに含まれているかを表している
            "YYYN",
            "YYNY",
            "YYNN",
            "YNYY",
            "YNYN",
            "YNNY",
            "YNNN",
            "NYYY",
            "NYYN",
            "NYNY",
            "NYNN",
            "NNYY",
            "NNYN",
            "NNNY",
            "NNNN"
        ];
        for ($i = 0; $i <= 15; $i++) {
            if ($answer == $c[$i]) {
                return $i + 1;
            }
        }
        return 0;
    }
}
