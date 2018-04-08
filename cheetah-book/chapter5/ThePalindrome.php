<?php

$s = "accba";

$thePalindrome = new ThePalindrome();
var_dump($thePalindrome->find($s));

class ThePalindrome
{
    function find($s)
    {
        for ($i = mb_strlen($s); ; $i++) {
            $flag = true;
            for ($j = 0; $j < mb_strlen($s); $j++) {
                $left = mb_substr($s, $j, 1);
                $right = mb_substr($s, $i - $j - 1, 1);

                // 反対側の文字が存在かつ違う文字
                if (($i - $j - 1) < mb_strlen($s) && $left != $right) {
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
