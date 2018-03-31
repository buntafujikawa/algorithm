<?php

/*
配列の最小値(最大値)を持つ要素を探し、それと先頭の要素と交換することで整列を行うアルゴリズム
リストの先頭要素を仮の最大値とする。
2番目以降の要素を一つずつ見て、仮の最大値よりも大きければ、その番号を覚えておく。
一通り処理が終わったあと、2番目以降に仮最小値以下のものがあれば、その要素と先頭の要素を交換する。
以下、2番目以降にも同様の処理を繰り返す。
*/

$list = [73, 23, 6, 1, 9969, 232, 1, 315252];

function selectSort(array $list) : array
{
    for ($i = 0; $i < count($list) - 1; $i++) {
        $tmpMax = $list[$i];

        for ($j = $i + 1; $j < count($list); $j++) {
            if ($tmpMax < $list[$j]) {
                $tmpMax = $list[$j];
                $target = $j;
            }
        }

        if ($list[$i] < $tmpMax) {
            $tmp = $list[$i];
            $list[$i] = $tmpMax;
            $list[$target] = $tmp;
        }
    }
    return $list;
}

echo implode(" ", selectSort($list));

/*
[bunta.fujikawa]$ php sort/selectSort.php                   (git)-[master]
315252 9969 232 73 23 6 1 1%
 */
