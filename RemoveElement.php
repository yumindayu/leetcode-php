<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @param Integer $val
   * @return Integer

   移除元素
   你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。

   nums = [3,2,2,3], val = 3,

   */
  function removeElement(&$nums, $val) {
    $j = 0;
    for ($i = 0; $i < count($nums); $i++) {
      if ($nums[$i] != $val) {
        $nums[$j] = $nums[$i];
        $j++;
      }
    }
    return $j;
  }
}