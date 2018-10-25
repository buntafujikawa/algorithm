<?php

/*
 * xより小さいものが前にくるようにする
 */
function divideList(array $list, int $n): array
{
    // TODO 命名変更
    $biggerList = [];
    $smallerList = [];
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i] === $n) {
            array_unshift($biggerList, $list[$i]);
        } elseif ($list[$i] > $n) {
            array_push($biggerList, $list[$i]);
        } else {
            array_push($smallerList, $list[$i]);
        }
    }

    $dividedList = array_merge($smallerList, $biggerList);
    return $dividedList;
}

// test
var_dump(divideList([3, 5, 8, 5, 2, 1], 5) === [3, 2, 1, 5, 5, 8]);
