<?php

$answer1 = "YNYY";
$answer2 = "YNNN";
$answer3 = "NNNN";
$answer4 = "YYYY";

$numberMagic = new NumberMagicReview();
var_dump($numberMagic->run($answer1));
var_dump($numberMagic->run($answer2));
var_dump($numberMagic->run($answer3));
var_dump($numberMagic->run($answer4));

class NumberMagicReview
{
    function run($answer)
    {
        $card = [
            0 => [1, 2, 3, 4, 5, 6, 7, 8],
            1 => [1, 2, 3, 4, 9, 10, 11, 12],
            2 => [1, 2, 5, 6, 9, 10, 13, 14],
            3 => [1, 3, 5, 7, 9, 11, 13, 15]
        ];

        for ($i = 1; $i <= 16; $i++) {
            $flag = true;

            for ($j = 0; $j < mb_strlen($answer); $j++) {
                if (mb_substr($answer, $j, 1) === "Y") {
                    if (!in_array($i, $card[$j])) {
                        $flag = false;
                    }
                } else {
                    if (in_array($i, $card[$j])) {
                        $flag = false;
                    }
                }
            }

            if ($flag) {
                return $i;
            }
        }
    }
}
