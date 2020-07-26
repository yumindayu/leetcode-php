<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $m
     * @return Integer
     *
    二分法
    nums = [7,2,5,10,8]
    m = 1，那么整个数组作为一部分，最小的最大值为 32
    m = n，那么每个元素作为一个子数组，从所有元素选取最大值，最小的最大值小为 10

    m 的取值范围为 1 <= m <= n，因此，最大值的最小值的范围为 [10, 32]

    我们利用二分法查找，找出符合 m 的最大值的最小的结果
    二分过程：
    left = 10;
    right = 32
    mid = (left + right) >>> 1 = 21（这个 21 就是一个子数组的最大容量）
    我们假设刚开辟的用来存储的子数组个数 cnt = 1
    那么根据贪心思想，我们将数组元素按顺序逐个往里放
    因此就有如下过程：
    7 < 21
    7 + 2 < 21
    7 + 2 + 5 < 21
    7 + 2 + 5 + 10 > 21
    至此，我们可以看出一个 21 容量的子数组是无法容纳整个数组元素的，因此我们需要开辟第二个子数组来存储剩下的数组元素
    cnt = cnt + 1 = 2
    10 < 21
    10 + 8 < 21
    我们发现，两个子数组可以将整个数组元素放入，而 cnt 刚好等于 m，因此 [7,2,5] 和 [10,8] 就是分割出来的两个子数组，最小的最大值为 18

    为什么是放入元素直到放不下为止？因为要求的是连续子数组，我们需要保证每个连续的子数组的元素和都尽可能的接近 21

    如果我们最终得到的 cnt > m，那么表示我们划分出太多的子数组，也就是意味着一个子数组的容量太少，我们需要再扩大容量，即 left = mid + 1，然后继续进行二分
    如果我们最终得到的 cnt < m，那么表示我们划分出太少的子数组，也就是意味着一个子数组的容量太大，需要减少容量，即 right = mid - 1
     */
    public function splitArray($nums, $m)
    {
        $left  = max($nums);
        $right = array_sum($nums);

        while ($left < $right) {
            $count = 1;
            $mid   = floor(($right - $left) / 2) + $left;
            $sum   = 0;
            foreach ($nums as $num) {
                if ($sum + $num > $mid) {
                    $sum = 0;
                    $count++;
                }
                $sum += $num;
            }
            if ($count > $m) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return $left;
    }
}
