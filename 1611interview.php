<?php
class Solution
{

    public $ans = [];
    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    public function divingBoard($shorter, $longer, $k)
    {
        //最短: shorter * k
        //第二短: shorter * (k - 1) +  longer * (k - k - 1)
        //第三短: shorter * (k - 2) +  longer * (k - k - 2)
        //...
        // i = k
        // shorter * i +  longer * (k - i)

        if ($k == 0) {
            return [];
        }

        if ($shorter == $longer) {
            return [$shorter * $k];
        }

        for ($i = $k; $i >= 0; $i--) {
            array_push($this->ans, $shorter * $i + $longer * ($k - $i));
        }
        return $this->ans;
    }
}
