<?php
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
      array_push($heights, 0);
      $stack = new SplStack;
      $max = 0;
      for ($i = 0; $i < count($heights); $i++) {
        while (!$stack->isEmpty() && $heights[$stack->top()] >= $heights[$i]) {
          $last = $stack->pop();
          if (!$stack->isEmpty()) {
            $width = $i - $stack->top() - 1;
          } else { 
            $width = $i;
          }
          $max = max($max, $heights[$last] * $width);
        }
        $stack->push($i);
      }
      return $max;
    }
}