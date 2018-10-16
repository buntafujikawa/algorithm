<?php

/*
 * 2つの文字列を1つの操作もしくは操作なしでもう一つの文字列にできるかどうかを判定
 */
function canConvertAtOnce(string $str1, string $str2): bool
{
    if ($str1 === $str2) {
        return true;
    }

    $length1 = strlen($str1);
    $length2 = strlen($str2);
    $diff = $length1 - $length2;

    if ($diff > 1 || $diff < -1) {
        return false;
    }

    $longString = $length1 > $length2 ? $str1 : $str2;
    $shortString = $longString === $str1 ? $str2 : $str1;

    $longStringIndex = 0;
    $shortStringIndex = 0;
    $diffCount = 0;

    while ($shortStringIndex < strlen($shortString)) {
        if ($diffCount > 1) {
            return false;
        }

        if (substr($longString, $longStringIndex, 1) === substr($shortString, $shortStringIndex, 1)) {
            $shortStringIndex++;
        } elseif ($length1 - $length2 === 0) {
            $shortStringIndex++;
            $diffCount++;
        } else {
            $diffCount++;
        }

        $longStringIndex++;
    }

    return true;
}

// test
var_dump(canConvertAtOnce("pale", "ple") === true);
var_dump(canConvertAtOnce("pales", "pale") === true);
var_dump(canConvertAtOnce("pale", "bale") === true);
var_dump(canConvertAtOnce("pale", "bake") === false);
