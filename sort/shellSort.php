<?php
/*
要素全体を、いくつかの要素に分けます。
分割したそれぞれの要素内で挿入ソートの処理を行います。
挿入ソート処理が終わった、隣接する配列同士を結合し、さらに挿入ソートを行います。
最終的に、全体が統合されるまで、同様の処理を繰り返します。
*/

$list = [1, 73, 23, 6, 1, 9969, 232, 315252];

function shellSort(array $list): array
{
    for ($step = (int)(count($list) / 2); $step > 0; $step /= 2) {
        for ($i = $step; $i < count($list); $i++) {
            $tmp = $list[$i];

            for ($j = $i; $j >= $step; $j -= $step) {
                if ($list[$j - $step] > $tmp) {
                    $list[$j] = $list[$j - $step];
                } else {
                    break;
                }
            }

            $list[$j] = $tmp;
        }
    }

    return $list;
}

echo implode(" ", shellSort($list));

/*
 [bunta.fujikawa]$ php sort/shellSort.php                    (git)-[master]
1 1 6 23 73 232 9969 315252
 */
