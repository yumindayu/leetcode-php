<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer

     删除排序数组中的重复项

     不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。

     nums = [1,1,2], 
     */
    function removeDuplicates(&$nums) {
      if (!$nums) return 0;

      $i = 0;
      for ($j = 1; $j < count($nums); $j++) {
        if ($nums[$j] != $nums[$i]) {
          $i++;
          $nums[$i] = $nums[$j];
        }
      }
      return $i + 1;
    }
}