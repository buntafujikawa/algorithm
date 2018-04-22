<?php

//$relations = ["N"];
//$relations = ["NNYN", "NNYN", "NNNN", "NYYN"];
//$relations = ["NNNN", "NNNN", "NNNN", "NNNN"];
$relations = ["NYNNYN", "NNNNNN", "NNNNNN", "NNYNNN", "NNNNNN", "NNNYYN"];

$corporation = new CorporationSalarySample();
var_dump($corporation->totalSalary($relations));

class CorporationSalarySample
{
    private $salaries = [];

    function totalSalary(array $relations)
    {
        $total = 0;
        for ($i = 0; $i < count($relations); $i++) {
            $total += $this->getSalary($i, $relations);
        }

        return $total;
    }

    private function getSalary(int $i, array $relations)
    {
        if ($this->salaries[$i] == 0) {
            $salary = 0;
            $relation = $relations[$i];

            for ($j = 0; $j < mb_strlen($relation); $j++) {
                if ($relation[$j] === 'Y') {
                    $salary += $this->getSalary($j, $relations);
                }
            }

            if ($salary == 0) {
                $salary = 1;
            }

            $this->salaries[$i] = $salary;
        }

        return $this->salaries[$i];
    }
}
