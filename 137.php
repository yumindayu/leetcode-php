<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function singleNumber($nums)
    {
        $once  = 0;
        $twice = 0;

        foreach ($nums as $num) {
            $once  = ~$twice & ($once ^ $num);
            $twice = ~$once & ($twice ^ $num);
        }
        return $once;

    }
}
