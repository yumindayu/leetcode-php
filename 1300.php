<?php
class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $target
     * @return Integer
     */
    public function findBestValue($arr, $target)
    {
        rsort($arr);
        $max = $arr[0];
        while ($arr && $target >= $arr[count($arr) - 1] * count($arr)) {
            $target -= array_pop($arr);
        }
        return $arr ? intval($target / count($arr) + 0.49) : $max;
    }
}
