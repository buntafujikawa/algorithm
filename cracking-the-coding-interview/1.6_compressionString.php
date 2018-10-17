<?php

/*
 * 文字数が短くなる場合のみ、重複する文字列を数字に置き換えて圧縮する
 */
function compressionString(string $string): string
{
    $compressionString = "";
    $count = 0;
    $targetString = "";

    for ($i = 0; $i < strlen($string); $i++) {
        $tmpString = substr($string, $i, 1);
        if ($i === 0) {
            $targetString = $tmpString;
            $count++;
        } elseif ($targetString === $tmpString) {
            $count++;
        } else {
            $compressionString .= $targetString . strval($count);
            $targetString = $tmpString;
            $count = 1;
        }
    }
    $compressionString .= $targetString . strval($count);

    return strlen($compressionString) >= strlen($string) ? $string : $compressionString;
}

// test
var_dump(compressionString("aabcccccaaa") === "a2b1c5a3");
var_dump(compressionString("abc") === "abc");
