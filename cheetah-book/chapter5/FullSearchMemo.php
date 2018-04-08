<?php
// 全探索について色々と書いてたのでそこらへんのソースコードをメモしておく

// フィボナッチ数列
function fib($a)
{
    if ($a <= 1) {
        return 1;
    }
    return fib($a - 1) + fib($a - 2);
}

echo fib(10) . PHP_EOL;
echo fib(3) . PHP_EOL;
