<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    public function getRow($rowIndex)
    {

        for ($i = 0; $i <= $rowIndex; $i++) {
            if ($i == 0) {
                $pre = [1];
            } elseif ($i == 1) {
                $pre = [1, 1];
            } else {
                $now = [];
                for ($j = 1; $j < $i; $j++) {
                    array_push($now, $pre[$j - 1] + $pre[$j]);
                }
                array_unshift($now, 1);
                array_push($now, 1);
                $pre = $now;
            }
        }
        return $pre;
    }
}

$test = new Solution;
$ret  = $test->getRow(33);
var_dump($ret);
