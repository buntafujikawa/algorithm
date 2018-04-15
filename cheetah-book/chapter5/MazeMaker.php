<?php

//$maze = ["...", "...", "..."];
//$startRow = 0;
//$startCol = 1;
//$moveRow = [1, 0, -1, 0]; // これは移動できる種類(移動する順番じゃない)
//$moveCol = [0, 1, 0, -1];
// return 3

//$maze = ["...", "...", "..."];
//$startRow = 0;
//$startCol = 1;
//$moveRow = [1, 0, -1, 0, 1, 1, -1, 1];
//$moveCol = [0, 1, 0, -1, 1, -1, 1, -1];
// return 2

$maze = ["X.X", "...", "XXX", "X.X"];
$startRow = 0;
$startCol = 1;
$moveRow = [1, 0, -1, 0];
$moveCol = [0, 1, 0, -1];
// return -1

$mazeMaker = new MazeMaker();
var_dump($mazeMaker->longestPath($maze, $startRow, $startCol, $moveRow, $moveCol));

class MazeMaker
{
    // 最大跳躍数を返す、抜け出せない場合には-1を返す
    function longestPath($maze, $startRow, $startCol, $moveRow, $moveCol): int
    {
        $max = 0;
        $width = mb_strlen($maze[0]);
        $height = count($maze);
        $board = [];

        // boardをフィールドに見立てて全て-1とする
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $board[$i][$j] = -1;
            }
        }

        // スタート地点だけ0
        $board[$startRow][$startCol] = 0;

        $queueX[] = $startCol;
        $queueY[] = $startRow;

        // 幅優先探索で解くため、移動の候補をキューに保存しておく
        while (!empty($queueX)) {
            $x = array_shift($queueX);
            $y = array_shift($queueY);

            // moveRow/moveColの全パターン動いた場合の確認
            for ($i = 0; $i < count($moveRow); $i++) {
                // 次のマス
                $nextX = $x + $moveCol[$i];
                $nextY = $y + $moveRow[$i];

                // nextがフィールド内の今まで一度も通ってない移動ができるマスなら
                if (0 <= $nextX && $nextX < $width &&
                    0 <= $nextY && $nextY < $height &&
                    $board[$nextY][$nextX] == -1 &&
                    mb_substr($maze[$nextY], $nextX, 1) == '.'
                ) {
                    $board[$nextY][$nextX] = $board[$y][$x] + 1;
                    $queueX[] = $nextX;
                    $queueY[] = $nextY;
                }
            }
        }

        // ここからは全ての移動パターンを試した後の処理
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                // 移動できるマスが-1のままであれば、そこに出口をおけば抜け出せなくなる
                if (mb_substr($maze[$i], $j, 1) == '.' && $board[$i][$j] == -1) {
                    return -1;
                }
                $max = max($max, $board[$i][$j]);
            }
        }


        return $max;
    }
}
