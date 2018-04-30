<?php

$duration = [400, 100, 100, 100];
$user = ['danny', 'stella', 'stella', 'mac'];
// return 3,1,2,0

//$duration = [200, 200, 200];
//$user = ['gil', 'sarah', 'warrick'];
// 0,1,2

//$duration = [100, 200, 50];
//$user = ['horatio Caine', 'horatio caine', 'YEAAAAAH'];
// 2,0,1

$batch = new BatchSystem();
var_dump($batch->run($duration, $user));

class BatchSystem
{
    function run(array $duration, array $user)
    {
        $n = count($duration);
        $times = [];
        for ($i = 0; $i < $n; $i++) {
            $times[$user[$i]] += $duration[$i];
        }

        $done = [];
        $ans = [];
        $ansCount = 0;

        while ($ansCount < $n) {
            $next = '';

            for ($i = 0; $i < $n; $i++) {
                if ((!isset($done[$i]) && !$done[$i]) && ($next == '' || $times[$user[$i] < $times[$next]])) {
                    $next = $user[$i];
                }
            }

            for ($i = 0; $i < $n; $i++) {
                if ($user[$i] == $next) {
                    $done[$i] = true;
                    $ans[$ansCount++] = $i;
                }
            }
        }

        return $ans;
    }
}
