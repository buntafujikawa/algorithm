<?php

/*
 * 文字列に出現する全ての空白文字を"%20"で置き換える
 */
function urlify(string $str, int $length): bool
{
    $replacedStr = "";
    for ($i = 0; $i < $length; $i++) {
        $char = substr($str, $i, 1);
        $replacedStr .= $char === " " ? "%20" : $char;
    }

    return $replacedStr;
}

// test
var_dump(urlify("Mr John Smith ", 13) == "Mr%20John%20Smith");
var_dump(urlify("hoge", 4) == "hoge");
