<?php

//$initialInvestment = 1000;
//$monthlyContribution = 0;
//$stockPrices = ["10 20 30", "15 24 32"];
// return 500

//$initialInvestment = 1000;
//$monthlyContribution = 0;
//$stockPrices = ["10", "9"];
// return 0

$initialInvestment = 100;
$monthlyContribution = 20;
$stockPrices = [
    "40 50 60",
    "37 48 55",
    "100 48 50",
    "105 48 50",
    "110 50 52",
    "110 50 52",
    "110 51 54",
    "109 49 53"
];
// return 239

$stockHistory = new StockHistory();
var_dump($stockHistory->run($initialInvestment, $monthlyContribution, $stockPrices));

class StockHistory
{
    function run(int $initialInvestment, int $monthlyContribution, array $stockPrices): int
    {
        // 最大収益を返す
        $money = $initialInvestment;
        $month = count($stockPrices);
        $tmp = explode(" ", $stockPrices[0]);
        $corp = count($tmp);

        $prices = [];
        $max = 0;
        $profit = 0;

        $proportion = [];
        $buy = [];

        // 数値の配列に変換
        for ($i = 0; $i < $month; $i++) {
            $string = explode(" ", $stockPrices[$i]);
            for ($j = 0; $j < $corp; $j++) {
                $prices[$i][$j] = (int)$string[$j];
            }
        }

        // 最後から遡り、各月までの最大増加率と買うべきかどうかを記録する
        for ($i = $month - 2; 0 <= $i ; $i--) {
            // どの銘柄を買うのか
            for ($j = 0; $j < $corp; $j++) {
                $percentage = 1.0 * $prices[$month - 1][$j] / $prices[$i][$j] - 1;

                var_dump($i);
                var_dump($percentage);

                if ($percentage > 0 && $percentage > $max) {
                    $buy[$i] = true;
                    $max = $percentage;
                    $proportion[$i] = $percentage;
                }
            }
        }

        var_dump($buy); // 2月が余計に購入している

        // 最初から初めて、買うべき月に来たら投資
        for ($i = 0; $i < count($buy); $i++) {
            if ($buy[$i]) {
                $profit += $money * $proportion[$i];
                $money = 0;
            }

            $money += $monthlyContribution;
        }

        return (int)round($profit);
    }
}
