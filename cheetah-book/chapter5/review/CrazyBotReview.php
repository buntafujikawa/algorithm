<?php

$n = 14; // 0.0088454931974411
//$n = 2;
$east = 25;
$west = 25;
$south = 25;
$north = 25;

$crazyBot = new CrazyBotReview();
var_dump($crazyBot->run($n, $east, $west, $south, $north));

class CrazyBotReview
{
    private $map = [];
    private $probability = [];

    private $moveX = [1, -1, 0, 0];
    private $moveY = [0, 0, 1, -1];

    function run($n, $east, $west, $south, $north): float
    {
        $this->probability[0] = $east / 100;
        $this->probability[1] = $west / 100;
        $this->probability[2] = $south / 100;
        $this->probability[3] = $north / 100;

        // 確率をかけてその合計を出す
        return $this->dfs(50, 50, $n);
    }

    // どこにいるのかを渡す
    private function dfs(int $x, int $y, int $n): float
    {
        if (!empty($this->map[$x][$y])) {
            return 0;
        }

        if ($n === 0) {
            return 1;
        }

        $this->map[$x][$y] = true;
        $ret = 0;

        for ($i = 0; $i < 4; $i++) {
            $ret += $this->dfs($x + $this->moveX[$i], $y + $this->moveY[$i], $n - 1) * $this->probability[$i];
        }

        $this->map[$x][$y] = false;

        return $ret;
    }
}
