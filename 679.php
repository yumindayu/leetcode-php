<?php
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function judgePoint24($nums)
    {
        if (count($nums) == 1) {
            if (intval((24 - $nums[0]) * pow(10, 10)) == 0) {
                return true;
            }

            return false;
        }

        foreach ($nums as $k1 => $v1) {
            foreach ($nums as $k2 => $v2) {
                if ($k1 == $k2) {
                    continue;
                }

                $tNums = $nums;
                unset($tNums[$k1], $tNums[$k2]);
                $tNums = array_values($tNums);

                if ($this->judgePoint24(array_merge([$v1 + $v2], $tNums))) {
                    return true;
                };
                if ($this->judgePoint24(array_merge([$v1 - $v2], $tNums))) {
                    return true;
                };

                if ($this->judgePoint24(array_merge([$v1 * $v2], $tNums))) {
                    return true;
                };

                if ($v2 != 0) {
                    if ($this->judgePoint24(array_merge([$v1 / $v2], $tNums))) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
