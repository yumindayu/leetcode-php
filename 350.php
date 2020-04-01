<?php
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersect($nums1, $nums2)
    {
        sort($nums1);
        sort($nums2);
        $i   = $j   = 0;
        $ret = [];
        while ($i < count($nums1)) {
            if ($j >= count($nums2)) {
                break;
            }

            if ($nums1[$i] < $nums2[$j]) {
                $i++;
            } elseif ($nums1[$i] > $nums2[$j]) {
                $j++;
            } else {
                $ret[] = $nums1[$i];
                $i++;
                $j++;
            }
        }
        return $ret;
    }
}
