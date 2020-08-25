<?php
class Solution
{

    public $res = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function findSubsequences($nums)
    {
        $this->helper($nums, [], 0);
        return $this->res;
    }
    public function helper($nums, $cur, $start)
    {
        if ($start == count($nums) && count($cur) > 1) {
            array_push($this->res, $cur);
        }
        if ($start < count($nums)) {
            if (empty($cur) || $nums[$start] >= $cur[count($cur) - 1]) {
                array_push($cur, $nums[$start]);
                $this->helper($nums, $cur, $start + 1);
                array_pop($cur);
            }
            if (empty($cur) || $nums[$start] != $cur[count($cur) - 1]) {
                $this->helper($nums, $cur, $start + 1);
            }
        }
    }
}
