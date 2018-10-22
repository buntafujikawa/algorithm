<?php

/*
 * ソートされてない連結リストから重複する要素を削除する
 */
function deleteDuplication(array $list): array
{
    $uniqueList = [];
    for ($i = 0; $i < count($list); $i++) {
        if (isset($uniqueList[$list[$i]])) {
            continue;
        }
        $uniqueList[] = $list[$i];
    }

    return $uniqueList;
}

// test
var_dump(deleteDuplication([]) === []);
var_dump(deleteDuplication([1]) === [1]);
var_dump(deleteDuplication([1, 2, 1]) === [1, 2]);

/*
 * 一時的なバッファが使用できない場合
 */
function deleteDuplicationWithoutTempBuffer(array $list): array
{
    for ($i = 0; $i < count($list) - 1; $i++) {
        for ($j = 1; $j < count($list); $j++) {
            if ($list[$i] === $list[$j]) {
                unset($list[$j]);
            }
        }
    }

    return $list;
}

// test
var_dump(deleteDuplicationWithoutTempBuffer([]) === []);
var_dump(deleteDuplicationWithoutTempBuffer([1]) === [1]);
var_dump(deleteDuplicationWithoutTempBuffer([1, 2, 1]) === [1, 2]);
