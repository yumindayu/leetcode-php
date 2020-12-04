<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function isPossible($nums)
    {
        $countArray = array_count_values($nums);
        $endMap     = [];
        $sequence   = [];
        foreach ($nums as $num) {
            $count = $countArray[$num];
            if ($count > 0) {
                $preEndCount = isset($endMap[$num - 1]) ? $endMap[$num - 1] : 0;
                if ($preEndCount > 0) {
                    $countArray[$num]--;
                    $endMap[$num - 1] = $preEndCount - 1;
                    if (isset($endMap[$num])) {
                        $endMap[$num]++;
                    } else {
                        $endMap[$num] = 1;
                    }
                } else {
                    $count1 = isset($countArray[$num + 1]) ? $countArray[$num + 1] : 0;
                    $count2 = isset($countArray[$num + 2]) ? $countArray[$num + 2] : 0;
                    if ($count1 > 0 && $count2 > 0) {
                        $countArray[$num]--;
                        $countArray[$num + 1] = $count1 - 1;
                        $countArray[$num + 2] = $count2 - 1;
                        if (isset($endMap[$num + 2])) {
                            $endMap[$num + 2]++;
                        } else {
                            $endMap[$num + 2] = 1;
                        }
                    } else {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
