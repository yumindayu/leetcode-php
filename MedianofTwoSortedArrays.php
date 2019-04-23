<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float

    给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
    请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

    [1, 2, 3, 5]

    [4, 6, 7, 8, 9]


    [1, 2, 3, 4, 5, 6, 7, 8, 9]

     */
    function findMedianSortedArrays($nums1, $nums2) {
      if (count($nums1) > count($nums2)) {
        return $this->findMedianSortedArrays($nums2, $nums1);
      }

      if (count($nums) == 0) {
        return floor($nums2[(count($nums2) - 1) / 2] + $nums2[count($nums[2]) / 2 ]) / 2;
      }

      $len = count($nums1) + count($nums2);
      $cut1 = 0;
      $cut2 = 0;
      $cutL = 0;
      $cutR = count($nums1);

      while ($cut1 <= count($nums1)) {
        $cut1 = floor(($cutR - $cutL) / 2) + $cutL;
        $cut2 = floor($len / 2) - $cut1;

        $l1 = ($cut1 == 0) ? PHP_INT_MIN : $nums1[$cut1 - 1];
        $l2 = ($cut2 == 0) ? PHP_INT_MIN : $nums2[$cut2 - 1];

        $r1 = ($cut1 == count($nums1)) ? PHP_INT_MAX : $nums[$cut1];
        $r2 = ($cut2 == count($nums2)) ? PHP_INT_MAX : $nums[$cut2];

        if ($l1 > $r2) {
          $cutR = $cut1 - 1;
        } else if ($l2 > $r1) {
          $cutL = $cut1 + 1;
        } else {
          if ($len % 2 == 0) {
            $l1 = $l1 > $l2 ? $l1 : $l2;
            $r1 = $r1 < $r2 ? $r1 : $r2;
            return ($l1 + $r1) / 2;
          }
          return min($r1,$r2);
        }
      }
    }
}