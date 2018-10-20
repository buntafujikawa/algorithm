<?php

/*
 * 与えられた文字列が全て固有であるかどうかの判定を行う
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

/*
 * example
 */
function isUniqueCharsExample(string $str): bool
{
    // 文字コードがASCIIの場合
    if (strlen($str) > 128) {
        return false;
    }

    $charSet = [];
    for ($i = 0; $i < strlen($str); $i++) {
        $val = substr($str, $i, 1);
        if (isset($charSet[$val])) {
            return false;
        }

        $charSet[$val] = true;
    }
    return true;
}

var_dump(isUniqueCharsExample("abc") === true);
var_dump(isUniqueCharsExample("aaa") === false);
