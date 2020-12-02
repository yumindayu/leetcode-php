<?php
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[]
     */
    public function maxNumber($nums1, $nums2, $k)
    {
        $ans = [];
        // 从 nums1 中选出长 i 的子序列
        for ($i = 0; $i <= $k && $i <= count($nums1); $i++) {
            // 从 nums2 中选出长 k - i 的子序列
            if ($k - $i >= 0 && $k - $i <= count($nums2)) {
                // 合并
                $tmp = $this->merge($this->subMaxNumber($nums1, $i), $this->subMaxNumber($nums2, $k - $i));
                // 取最大值
                if ($this->compare($tmp, 0, $ans, 0)) {
                    $ans = $tmp;
                }
            }
        }
        return $ans;
    }

    // 类似于单调递减栈
    public function subMaxNumber($nums, $len)
    {
        $subNums = array_fill(0, $len, 0);
        $cur     = 0;
        $rem     = count($nums) - $len; // rem 表示还可以删去多少字符
        for ($i = 0; $i < count($nums); $i++) {
            while ($cur > 0 && $subNums[$cur - 1] < $nums[$i] && $rem > 0) {
                $cur--;
                $rem--;
            }
            if ($cur < $len) {
                $subNums[$cur++] = $nums[$i];
            } else {
                $rem--; // 避免超过边界而少删字符
            }
        }
        return $subNums;
    }

    public function merge($nums1, $nums2)
    {
        $res = array_fill(0, count($nums1) + count($nums2), 0);
        $cur = 0;
        $p1  = 0;
        $p2  = 0;
        while ($cur < count($nums1) + count($nums2)) {
            if ($this->compare($nums1, $p1, $nums2, $p2)) {
                // 不能只比较当前值，如果当前值相等还需要比较后续哪个大
                $res[$cur++] = $nums1[$p1++];
            } else {
                $res[$cur++] = $nums2[$p2++];
            }
        }
        return $res;
    }

    public function compare($nums1, $p1, $nums2, $p2)
    {
        if ($p2 >= count($nums2)) {
            return true;
        }

        if ($p1 >= count($nums1)) {
            return false;
        }

        if ($nums1[$p1] > $nums2[$p2]) {
            return true;
        }

        if ($nums1[$p1] < $nums2[$p2]) {
            return false;
        }

        return $this->compare($nums1, $p1 + 1, $nums2, $p2 + 1);
    }
}
