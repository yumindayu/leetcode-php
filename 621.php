<?php
class Solution
{

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    public function leastInterval($tasks, $n)
    {
        // 总排队时间 = (最大任务数量 - 1) * (n + 1) + 最后一桶的任务数x
        // 记录最大任务数量，看一下任务数量并列最多的任务有多少个，即最后一个桶子的任务数
        // 这样剩下就很好处理了，我们只需要算两个数：
        // 1.记录最大任务数量max_freq，看一下任务数量并列最多的任务有多少个，
        //   即最后一个桶子的任务数X，计算NUM1=（max_freq-1）*（n+1）+ x
        // 2.NUM2=count(tasks)
        // 输出其中较大值即可
        // 因为存在空闲时间时肯定是NUM1大，不存在空闲时间时肯定是NUM2>=NUM1

        $tasks_freqs = count_chars(implode($tasks), 1);

        $max_freq = max($tasks_freqs);
        $count    = 0;
        foreach ($tasks_freqs as $tasks_freq) {
            if ($tasks_freq == $max_freq) {
                $count++;
            }

        }
        return max(count($tasks), ($max_freq - 1) * ($n + 1) + $count);
    }
}
