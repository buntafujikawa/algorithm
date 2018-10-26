<?php

/*
 * リストで表された2桁の和
 */
function sumTwoList(array $list1, array $list2): array
{
    $sum = 0;
    for ($i = 0; $i < count($list1); $i++) {
        $sum += ($list1[$i] + $list2[$i]) * pow(10, $i);
    }

    $result = [];
    for ($i = 0; $i < strlen(strval($sum)); $i++) {
        $result[] = intval(substr(strval($sum), $i, 1));
    }

    return $result;
}

// test
var_dump(sumTwoList([7, 1, 6], [5, 9, 2]) === [9, 1, 2]);
