<?php

$numRed = 2;
$numBlue = 3;
$onlyRed = 100;
$onlyBlue = 400;
$bothColors = 200;
// return 1400

//$numRed = 9;
//$numBlue = 1;
//$onlyRed = -1;
//$onlyBlue = -10;
//$bothColors = 4;
// return 0

$colorfulBoxesAndBalls = new ColorfulBoxesAndBalls();
var_dump($colorfulBoxesAndBalls->run($numRed, $numBlue, $onlyRed, $onlyBlue, $bothColors));

class ColorfulBoxesAndBalls
{
    function run($numRed, $numBlue, $onlyRed, $onlyBlue, $bothColors): int
    {
        // 最初は同じ色の箱にあるとして、これを現時点での最大値とする
        $max = $numRed * $onlyRed + $numBlue * $onlyBlue;

        if (($onlyRed + $onlyRed) >= $bothColors) {
            return $max;
        }

        // 個数が少ない方を全て移動させると仮定する
        $count = min($numRed, $numBlue);
        $diff = ($bothColors * 2) - ($onlyRed + $onlyBlue);

        return $max + $diff * $count;
    }
}
