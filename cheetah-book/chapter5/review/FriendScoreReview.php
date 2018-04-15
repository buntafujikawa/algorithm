<?php
$friend = ["NYNNN", "YNYNN", "NYNYN", "NNYNY", "NNNYN"];
//$friend = ["NYY", "YNY", "YYN"];

$friendScore = new FriendScoreReview();
var_dump($friendScore->run($friend));

class FriendScoreReview
{
    function run(array $friend)
    {
        $max = 0;
        for ($i = 0; $i < count($friend); $i++) {
            $tmpMax = 0;
            for ($j = 0; $j < mb_strlen($friend[$i]); $j++) {
                if ($i === $j) {
                    continue;
                }

                if (mb_substr($friend[$i], $j, 1) === "Y") {
                    // 友達の場合
                    $tmpMax++;
                } else {
                    // 友達の友達を探す
                    for ($k = 0; $k < mb_strlen($friend[$i]); $k++) {
                        // 自分が直接的に友達であれば重複なので除く
                        if (mb_substr($friend[$j], $k, 1) === "Y" && mb_substr($friend[$i], $k, 1) == "Y") {
                            $tmpMax++;
                        }
                    }
                }
            }
            $max = max($max, $tmpMax);
        }
        return $max;
    }
}
