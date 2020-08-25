<?php
class Solution
{

    public $res = array();
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function findSubsequences($nums)
    {
        $this->dfs($nums, 0, []);
        return $this->res;
    }

    public function dfs($nums, $start, $array)
    {
        if (count($array) >= 2) {
            array_push($this->res, $array);
        }

        $visited = [];
        for ($i = $start; $i < count($nums); $i++) {
            if ((count($array) > 0) && ($nums[$i] < $array[count($array) - 1])) {
                continue;
            }
            if (isset($visited[$nums[$i]])) {
                continue;
            }

            $visited[$nums[$i]] = 1;
            array_push($array, $nums[$i]);
            $this->dfs($nums, $i + 1, $array);
            array_pop($array);
        }

    }
}
