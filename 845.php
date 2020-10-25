<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function longestMountain($A)
    {
        $start = -1;
        $ans   = 0;

        for ($i = 1; $i < count($A); $i++) {
            if ($A[$i - 1] < $A[$i]) {
                // 总是在上升阶段，确定山脉起点 start
                if ($i == 1 || $A[$i - 2] >= $A[$i - 1]) {
                    $start = $i - 1;
                }
            } elseif ($A[$i - 1] > $A[$i]) {
                if ($start != -1) {
                    $ans = max($ans, $i - $start + 1); // 总是在下降阶段，计算山脉长度
                }
            } else {
                $start = -1; // 平缓期重置起点
            }
        }

        return $ans;

    }
}
