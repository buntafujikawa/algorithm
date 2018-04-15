<?php

//$relations = ["N"];
//$relations = ["NNYN", "NNYN", "NNNN", "NYYN"];
//$relations = ["NNNN", "NNNN", "NNNN", "NNNN"];
$relations = ["NYNNYN", "NNNNNN", "NNNNNN", "NNYNNN", "NNNNNN", "NNNYYN"];

$corporation = new CorporationSalary();
var_dump($corporation->run($relations));

class CorporationSalary
{
    function run($relations)
    {
        // 部下がいない人から計算をして足しあげていく
        $order = [];
        for ($i = 0; $i < count($relations); $i++) {
            $order[$i] = 0;
            for ($j = 0; $j < mb_strlen($relations[$i]); $j++) {
                if (mb_substr($relations[$i], $j, 1) === "Y") {
                    $order[$i]++;
                }
            }
        }
        asort($order);

        $salaryList = [];

        foreach ($order as $key => $value) {
            if ($value === 0) {
                // 部下がいない場合は給料は1
                $salaryList[$key] = 1;
                continue;
            }

            $salaryList[$key] = 0;

            // 部下がいる場合は部下の給与の合計が給料
            for ($i = 0; $i < mb_strlen($relations[$key]); $i++) {
                if (mb_substr($relations[$key], $i, 1) === "Y") {
                    $salaryList[$key] += $salaryList[$i];
                }
            }
        }

        return array_sum($salaryList);
    }
}
