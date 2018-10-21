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
