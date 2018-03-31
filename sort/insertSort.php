<?php

/*
あらかじめ整列が終わっている配列に、データを挿入するアルゴリズム
先頭から、並んだ要素のうち最初の2つを取り出し比較します。
最初の要素が、二番目の要素よりも大きければ、並び替えます。
次に、3つ目の要素と並べ替えた2つの要素を比べ、適切な位置に挿入します。
以後、終端まで同様の処理を繰り返します。
*/

$list = [73, 1, 23, 6, 1, 9969, 232, 1, 315252];

function insertSort(array $list): array
{
    for ($i = 1; $i < count($list); $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($list[$j] > $list[$i]) {
                $tmp = $list[$i];
                $list[$i] = $list[$j];
                $list[$j] = $tmp;
            }
        }
    }

    return $list;
}

echo implode(" ", insertSort($list));

/*
[bunta.fujikawa]$ php sort/insertSort.php                   (git)-[master]
1 1 1 6 23 73 232 9969 315252%
 */
