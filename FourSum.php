<?php
class Solution {
  
  function fourSum($nums, $target) {
    if (!$nums) return [];

    sort($nums);
    $ret = [];
    for ($i=0;$i < count($nums) - 3;$i++) {
      if ($i >0 && $nums[$i] == $nums[$i-1]) continue;
      for ($j=$i+1;$j < count($nums) -2;$j++) {
        if ($j >$i+1 && $nums[$j] == $nums[$j-1]) continue;
        $left = $j+1;
        $right = count($nums) -1;
        while ($left < $right) {
          $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];
          if ($sum == $target) {
            array_push($ret,[$nums[$i] , $nums[$j] , $nums[$left] , $nums[$right]]);
            while($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
            while($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
            $left++;
            $right--;
          } else if ($sum > $target) {
            $right--;
          } else {
            $left++;
          }
        }
      }  
    }
    return $ret;
  }
}