<?php

$str = "abbnn";

$thePalindrome = new ThePalindromeReview();
var_dump($thePalindrome->run($str));

class ThePalindromeReview
{
    function run($str)
    {
        for ($i = mb_strlen($str); ; $i++) {
            $flag = true;

            for ($j = 0; $j < mb_strlen($str); $j++) {
                $left = mb_substr($str, $j, 1);
                $right = mb_substr($str, $i - $j - 1, 1);

                if (($i - $j - 1) < mb_strlen($str) && $left != $right) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                return $i;
            }
        }
    }
}
