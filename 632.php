<?php
class Solution
{

    /**
     * @param Integer[][] $nums
     * @return Integer[]

     *
     *                        --------
     *                       |        |    <--- 取区间差值最小就是最终的结果
     *                       |        |
     *
     *        nums[0]        |     4  |  10    15         24 26
     *
     *        nums[1]        |0       | 9   12      20                <-- 滑动左指针
     *
     *        nums[2]        |      5 |          18     22         30
     */
    public function smallestRange($nums)
    {
        $left  = 0; //区间左指针
        $right = PHP_INT_MAX; //区间右指针
        $min   = $right - $left; //区间差值 最终要获取这个区间差值最小的区间

        $max = PHP_INT_MIN; //当前区间的最大致

        $count = count($nums);
        $index = array_fill(0, $count, 0);

        $pq = new PQ(); //构建一个小顶堆，堆顶的元素最小，每次滑动窗口都从left往右滑动

        for ($i = 0; $i < $count; $i++) {
            $pq->insert($i, $nums[$i][0]);
            $max = max($max, $nums[$i][0]); //此时已经最起码有了一个包含所有列表中一个元素的区间，接下来就是更新这个区间的长度
        }
        // $pq->setExtractFlags(PQ::EXTR_BOTH);

        while (true) {
            $min_index = $pq->extract(); //左侧的索引，通过这个就知道下一次滑动从哪个列表往右滑
            // $min_index = $min_data['data'];
            $cur = $max - $nums[$min_index][$index[$min_index]]; //当前区间最大最小差
            if ($cur < $min) {
                //如果当前区间差值小则需要更新
                $min   = $cur;
                $left  = $nums[$min_index][$index[$min_index]];
                $right = $max;
            }
            $index[$min_index]++;
            if ($index[$min_index] == count($nums[$min_index])) {
                break;
            }
            $pq->insert($min_index, $nums[$min_index][$index[$min_index]]);
            $max = max($max, $nums[$min_index][$index[$min_index]]);
        }
        return [$left, $right];
    }
}

class PQ extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 < $priority2 ? 1 : -1;
    }
}
