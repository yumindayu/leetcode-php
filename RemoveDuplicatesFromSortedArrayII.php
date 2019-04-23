<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer

      给定 nums = [1,1,1,2,2,3],

      函数应返回新长度 length = 5, 并且原数组的前五个元素被修改为 1, 1, 2, 2, 3 。

      你不需要考虑数组中超出新长度后面的元素。
     */
    function removeDuplicates(&$nums) {
      if (!$nums || count($nums) <= 2) return count($nums);
      $count = 2;
      for ($i = 2; $i < count($nums); $i++) {
        if ($nums[$i] != $nums[$count - 2]) {
          $nums[$count++] = $nums[$i];
        }
      }
      return $count;
    }
}