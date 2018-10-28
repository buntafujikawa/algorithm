<?php

/*
 * リストが回文かどうか
 */
function isPalindromeList(array $list): bool
{
    for ($i = 0; $i < floor(count($list) / 2); $i++) {
        if ($list[$i] !== $list[count($list) - $i - 1]) {
            return false;
        }
    }
    return true;
}

// test
var_dump(isPalindromeList(["a", "b", "c", "b", "a"]) === true);
var_dump(isPalindromeList(["a", "a"]) === true);
var_dump(isPalindromeList(["a", "a", "b"]) === false);
