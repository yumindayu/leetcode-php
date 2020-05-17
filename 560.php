<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function subarraySum($nums, $k)
    {
        $map    = [];
        $sum    = 0;
        $result = 0;
        $map[0] = 1;
        foreach ($nums as $num) {
            $sum += $num;
            if (!isset($map[$sum])) {
                $map[$sum] = 0;
            }
            if (isset($map[$sum - $k])) {
                $result += $map[$sum - $k];
            }

            $map[$sum]++;
        }
        print_r($map);
        return $result;
    }
}
$test = new Solution;
$nums = [1, 2, 3];
$k    = 3;
$ret  = $test->subarraySum($nums, $k);
var_dump($ret);exit;
