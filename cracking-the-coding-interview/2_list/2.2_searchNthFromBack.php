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
