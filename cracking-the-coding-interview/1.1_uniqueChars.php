<?php

/*
 * 与えられた文字列に重複がないか判定を行う
 */
function isUniqueChars(string $str): bool
{
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        $target = substr($str, $i, 1);
        for ($j = $i + 1; $j < strlen($str); $j++) {
            if ($target === substr($str, $j, 1)) {
                return false;
            }
        }
    }
    return true;
}

var_dump(isUniqueChars("abc") === true);
var_dump(isUniqueChars("aaa") === false);
