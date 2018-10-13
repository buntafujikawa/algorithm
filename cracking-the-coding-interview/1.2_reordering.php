<?php

/*
 * 2つの文字列が与えられた時に、片方が片方の並べ替えになっているかを判定する
 */
function isReordering(string $str1, string $str2): bool
{
    $charSet = [];
    for ($i = 0; $i < strlen($str1); $i++) {
        $val1 = substr($str1, $i, 1);
        if (isset($charSet[$val1])) {
            $charSet[$val1]++;
        } else {
            $charSet[$val1] = 1;
        }
    }

    for ($i = 0; $i < strlen($str2); $i++) {
        $val2 = substr($str2, $i, 1);
        if (isset($charSet[$val2]) && $charSet[$val2] > 0) {
            $charSet[$val2]--;
            continue;
        }
        return false;
    }

    return true;
}

// test
var_dump(isReordering("aab", "baa") === true);
var_dump(isReordering("a", "a") === true);
var_dump(isReordering("abc", "def") === false);
