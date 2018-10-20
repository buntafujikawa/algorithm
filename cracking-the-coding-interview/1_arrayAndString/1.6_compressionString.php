<?php

/*
 * 文字数が短くなる場合のみ、重複する文字列を数字に置き換えて圧縮する
 */
function compressionString(string $string): string
{
    $compressionString = "";
    $count = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        $count++;
        if ($i + 1 > strlen($string) || substr($string, $i, 1) !== substr($string, $i + 1, 1)) {
            $compressionString .= substr($string, $i, 1) . strval($count);
            $count = 0;
        }
    }
    return strlen($compressionString) >= strlen($string) ? $string : $compressionString;
}

// test
var_dump(compressionString("aabcccccaaa") === "a2b1c5a3");
var_dump(compressionString("abc") === "abc");
