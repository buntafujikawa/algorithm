<?php

//$size = 3;
//$start = [0, 0];
//$end = [1, 0];
//$numMove = 1;
// return 1

//$size = 3;
//$start = [0, 0];
//$end = [2, 2];
//$numMove = 1;
//// return 0
//
$size = 100;
$start = [0, 0];
$end = [0, 99];
$numMove = 50;
// return 2430.....

$chess = new ChessMetric();
var_dump($chess->run($size, $start, $end, $numMove));

class ChessMetric
{
    private $ways = [];
    private $dx = [1, 1, 1, 0, -1, -1, -1, 0, 2, 1, -1, -2, -2, -1, 1, 2];
    private $dy = [1, 0, -1, -1, -1, 0, 1, 1, -1, -2, -2, -1, 1, 2, 2, 1];

    // startからendにnumMove回で移動できる方法がいくつあるかを返す
    function run(int $size, array $start, array $end, int $numMove): int
    {
        // endから考えて最後にendにこれるマス
        $startX = $start[0];
        $startY = $start[1];
        $endX = $end[0];
        $endY = $end[1];

        $this->ways[$startY][$startX][0] = 1;

        for ($i = 1; $i <= $numMove; $i++) {
            for ($x = 0; $x < $size; $x++) {
                for ($y = 0; $y < $size; $y++) {
                    // 動き方が16通りある
                    for ($j = 0; $j < 16; $j++) {
                        $nx = $x + $this->dx[$j];
                        $ny = $y + $this->dy[$j];

                        // チェス盤に収まっているかどうか
                        if ($nx < 0 || $ny < 0|| $nx >=$size || $ny >= $size) {
                            continue;
                        }

                        $this->ways[$ny][$nx][$i] += $this->ways[$y][$x][$i - 1];
                    }
                }
            }
        }

        return $this->ways[$endY][$endX][$numMove];
    }
}
