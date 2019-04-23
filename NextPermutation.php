<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return NULL

   1,2,3 → 1,3,2
   3,2,1 → 1,2,3
   1,1,5 → 1,5,1


    index:1
   1  2  7  4  3  1  //右到左第一个逆序的数字 是 2

   1  2  7  4  3  1  //右到左第一个比逆序的数字大的数字 是 3

   1  3  7  4  2  1  // 2 和 3 交换 

   1  3  7  4  2  1  //index之后的数字翻转
     index   

   1  3  1  2  4  7
   */
  function nextPermutation(&$nums) {
    $n = count($nums);
    for ($i = $n - 2; $i >= 0; $i--) {
      if ($nums[$i + 1] > $nums[$i]) {
        for ($j = $n - 1; $j >= 0; $j--) {
          if ($nums[$j] > $nums[$i]) {
            break;
          }
        }
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;

        $left = $i + 1;
        $right = $n - 1;
        return $this->reverse($nums, $left, $right);
      }
    }
    return $this->reverse($nums, 0, $n - 1);
  }

  function reverse(&$nums, $left, $right) {
    while ($left < $right) {
      $temp = $nums[$left];
      $nums[$left] = $nums[$right];
      $nums[$right] = $temp;
      $left++;
      $right--;
    }
  }
}
