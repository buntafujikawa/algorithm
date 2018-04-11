<?php

$memo = new Dfs();
var_dump($memo->dfs(1, 1));

class Dfs
{
    private $h = 5;
    private $w = 4;

    function simpleDfs($nowH, $nowW): int
    {
        if ($nowH > $this->h || $nowW > $this->w) {
            return 0;
        }

        if ($nowH == $this->h && $nowW == $this->w) {
            return 1;
        }

        return $this->simpleDfs($nowH + 1, $nowW) + $this->simpleDfs($nowH, $nowW + 1);
    }
}
