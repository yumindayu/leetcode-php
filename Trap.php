<?php
class Solution {

  /**
   * @param Integer[] $height
   * @return Integer
   */
  function trap($height) {
    $max_value = 0;
    $max_idx = 0;
    for ($i = 0; $i < count($height); $i++) {
      if ($height[$i] > $max_value) {
        $max_value = $height[$i];
        $max_idx = $i;
      }
    }
    $left_height = $height[0];
    $area = 0;
    for ($i = 0; $i < $max_idx; $i++) {
      if ($left_height < $height[$i]) {
        $left_height = $height[$i];
      } else {
        $area += $left_height - $height[$i];
      }
    }

    $right_height = $height[count($height) - 1];
    for ($i = count($height) - 1; $i > $max_idx; $i--) {
      if ($right_height < $height[$i]) {
        $right_height = $height[$i];
      } else {
        $area += $right_height - $height[$i];
      }
    }
    return $area;
  }

  function trap2($height) {
    $stack = new SplStack;
    $res = 0;
    for ($i = 0; $i < count($height); $i++) {
      if ($stack->isEmpty() || $height[$i] < $height[$stack->top()]) {
        $stack->push($i);
      } else {
        while (!$stack->isEmpty() && $height[$i] > $height[$stack->top()]) {
          $top = $stack->pop();
          if (!$stack->isEmpty()) {
            $res += ($i - $stack->top() - 1) * (min($height[$i], $height[$stack->top()]) - $height[$top]);
          }
        }
        $stack->push($i);
      }
    }
    return $res;
  }















}