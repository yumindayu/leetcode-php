<?php
class Solution {

  /**
   * @param Integer[] $nums1
   * @param Integer $m
   * @param Integer[] $nums2
   * @param Integer $n
   * @return NULL

   nums1 = [1,2,3,0,0,0], m = 3
   nums2 = [2,5,6],       n = 3
   */
  function merge(&$nums1, $m, $nums2, $n) {
    $count = $m + $n - 1;
    $i = $m - 1;
    $j = $n - 1;
    while ($i >= 0 && $j >= 0) {
      if ($nums1[$i] > $nums2[$j]) {
        $nums1[$count--] = $nums1[$i--];
      } else {
        $nums1[$count--] = $nums2[$j--];
      }
    }
    while ($j >= 0) {
      $nums1[$count--] = $nums2[$j--];
    }
  }
}