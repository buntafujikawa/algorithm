<?php
/*
リストの先頭から、要素を取り出す。（これを、要素①とする）
次の要素（要素②とする）と、要素①を比較する。
要素①が、要素②より大きければ、値を交換する。
要素②の次の要素を、新たに要素②とし、2.に戻る。

末端まで処理が終われば、新たに要素①を、次の要素に、さらにその次を要素②として、2.に戻る
要素①が、末端より一つ前まで終了したら、処理を終了する。
*/

$list = [73, 23, 6, 1, 9969, 232, 1, 315252];

function bubbleSort(array $list): array
{
    for ($i = 0; $i < count($list) - 1; $i++) {
        for ($j = 0; $j < count($list) - 1; $j++) {
            if ($list[$j] > $list[$j + 1]) {
                $tmp = $list[$j];
                $list[$j] = $list[$j + 1];
                $list[$j + 1] = $tmp;
            }
        }
    }

    return $list;
}


echo implode(" ", bubbleSort($list));

/*
[bunta.fujikawa]$ php sort/bubble.php                  (git)-[master]
1 1 6 23 73 232 9969 315252%
*/
