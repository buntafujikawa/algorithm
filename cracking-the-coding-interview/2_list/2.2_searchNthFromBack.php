<?php

/*
 * 後ろからK番目を返す
 */
function searchNthFromBackUsingCount(array $list, int $k): string
{
    return $list[count($list) - $k];
}

// test
var_dump(searchNthFromBackUsingCount(["a", "b", "c"], 1) === "c");
var_dump(searchNthFromBackUsingCount(["a", "b", "c"], 3) === "a");

/*
 * リストの長さが分からない場合
 */
function searchNthFromBack(array $list, int $k): string
{
    $pointer1 = 0;
    $pointer2 = $k;

    while (isset($list[$pointer2])) {
        $pointer1++;
        $pointer2++;
    }

    return $list[$pointer1];
}

// test
var_dump(searchNthFromBack(["a", "b", "c"], 1) === "c");
var_dump(searchNthFromBack(["a", "b", "c"], 3) === "a");
