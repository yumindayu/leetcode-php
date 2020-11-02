<?php
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersection($nums1, $nums2)
    {
        sort($nums1);
        sort($nums2);
        $i   = 0;
        $j   = 0;
        $ans = [];
        while ($i < count($nums1) && $j < count($nums2)) {
            if ($nums1[$i] == $nums2[$j]) {
                if (empty($ans) || $ans[count($ans) - 1] != $nums1[$i]) {
                    array_push($ans, $nums1[$i]);
                }
                $i++;
                $j++;
            } elseif ($nums1[$i] < $nums2[$j]) {
                $i++;
            } else {
                $j++;
            }
        }
        return $ans;
    }
}
