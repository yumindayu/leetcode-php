<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function smallerNumbersThanCurrent($nums)
    {
        // 计数排序
        // 1 统计每个数字出现的次数
        // 对于数字 i 而言，小于它的数目就为 cnt[0...i−1] 的总和
        $count = array_fill(0, 101, 0);
        $n     = count($nums);
        for ($i = 0; $i < $n; $i++) {
            $count[$nums[$i]]++;
        }
        for ($i = 1; $i <= 100; $i++) {
            $count[$i] += $count[$i - 1];
        }
        $ans = [];
        for ($i = 0; $i < $n; $i++) {
            $ans[$i] = $nums[$i] == 0 ? 0 : $count[$nums[$i] - 1];
        }
        return $ans;
    }
}
