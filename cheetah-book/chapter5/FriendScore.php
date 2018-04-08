<?php

$friend = ["NYNNN", "YNYNN", "NYNYN", "NNYNY", "NNNYN"];

$friendScore = new FriendScore();
var_dump($friendScore->highestScore($friend));

class FriendScore
{
    function highestScore(array $friend)
    {
        $highestFriendCount = 0;

        for ($i = 0; $i < count($friend); $i++) {
            $friendCount = 0;
            $length = mb_strlen($friend[$i]);

            for ($j = 0; $j < $length; $j++) {
                // 自分
                if ($i === $j) {
                    continue;
                }

                // 直接的な友達
                if (mb_substr($friend[$i], $j, 1) == "Y") {
                    $friendCount++;
                } else {
                    // 間接的な友達
                    for ($k = 0; $k < $length; $k++) {
                        if (mb_substr($friend[$j], $k, 1) === "Y" && mb_substr($friend[$k], $i, 1) === "Y") {
                            $friendCount++;
                            break;
                        }
                    }
                }
            }

            $highestFriendCount = max($highestFriendCount, $friendCount);
        }

        return $highestFriendCount;
    }
}
