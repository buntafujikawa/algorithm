<?php

/*
 * 文字列が回文の順列であるかを調べる
 */
function isReorderingOfPalindrome(string $str): bool
{
    $map = [];
    for ($i = 0; $i < strlen($str); $i++) {
        $char = strtolower(substr($str, $i, 1));
        if (isset($map[$char])) {
            $map[$char]++;
        } else {
            $map[$char] = 1;
        }
    }

    $oddCount = 0;
    foreach ($map as $count) {
        if ($count % 2 !== 0 && ++$oddCount > 1) {
            return false;
        }
    }
    return true;
}

// test
var_dump(isReorderingOfPalindrome("ababc") === true);
var_dump(isReorderingOfPalindrome("abAbc") === true);
var_dump(isReorderingOfPalindrome("abcde") === false);


