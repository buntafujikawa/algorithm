<?php

$n = 14;
$east = 25;
$west = 25;
$south = 25;
$north = 25;

$crazyBot = new CrazyBot();
var_dump($crazyBot->getProbability($n, $east, $west, $south, $north));

class CrazyBot
{
    private $grid;
    private $prob;
    private $vx = [1, -1, 0, 0];
    private $vy = [0, 0, 1, -1];

    public function getProbability(int $n, int $east, int $west, int $south, int $north): float
    {
        $this->prob[0] = $east / 100.0;
        $this->prob[1] = $west / 100.0;
        $this->prob[2] = $south / 100.0;
        $this->prob[3] = $north / 100.0;

        return $this->dfs(50, 50, $n);
    }

    private function dfs(int $x, int $y, int $n): float
    {
        if (!empty($this->grid[$x][$y])) {
            return 0;
        }

        if ($n == 0) {
            return 1;
        }

        $this->grid[$x][$y] = true;
        $ret = 0;

        for ($i = 0; $i < 4; $i++) {
            $ret += $this->dfs($x + $this->vx[$i], $y + $this->vy[$i], $n - 1) * $this->prob[$i];
        }
        $this->grid[$x][$y] = false;

        return $ret;
    }
}
