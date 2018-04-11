<?php

$memo = new Dfs();
var_dump($memo->simpleDfs(1, 1));
var_dump($memo->dfsWithMemo(1, 1));

class Dfs
{
    private $h = 5;
    private $w = 4;
    private $dp = [];

    // 単純な深さ優先探索
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

    // メモ化再帰
    function dfsWithMemo($nowH, $nowW): int
    {
        if ($nowH > $this->h || $nowW > $this->w) {
            return 0;
        }

        if ($nowH == $this->h && $nowW == $this->w) {
            return 1;
        }

        if (isset($this->dp[$nowH][$nowW]) && $this->dp[$nowH][$nowW] != 0) {
            return $this->dp[$nowH][$nowW];
        }

        return $this->dp[$nowH][$nowW] = $this->dfsWithMemo($nowH + 1, $nowW) + $this->dfsWithMemo($nowH, $nowW + 1);
    }
}
