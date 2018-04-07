<?php

$first = ["fishing", "gardening", "swimming", "fishing"];
$second = ["hunting", "fishing", "fishing", "biting"];

$interestingParty = new InterestingPartyAdvancedVersion();
var_dump($interestingParty->bestInvitation($first, $second));

class InterestingPartyAdvancedVersion
{
    function bestInvitation(array $first, array $second)
    {
        $dic = [];
        for ($i = 0; $i < count($first); $i++) {
            $dic[$first[$i]] = 0;
            $dic[$second[$i]] = 0;
        }

        for ($i = 0; $i < count($first); $i++) {
            $dic[$first[$i]]++;
            $dic[$second[$i]]++;
        }

        $max = 0;
        foreach ($dic as $value) {
            $max = max($max, $value);
        }

        return $max;
    }
}
