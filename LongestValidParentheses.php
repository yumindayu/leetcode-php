<?php
class Solution {

  /**
   * @param String $s
   * @return Integer

   输入: "(()"
   输出: 2

   输入: ")()())"

   )start = 0;
   (start = 1; stack top 1
   ) max = 2;
   ( stack  3
   ) max = 4

   

   输出: 4
   */
  function longestValidParentheses($s) {
    $res = 0;
    $start = 0;
    $stack = new SplStack();
    for ($i = 0; $i < strlen($s); $i++) {
      if ($s[$i] == "(") {
        $stack->push($i);
      } else {
        if ($stack->isEmpty()) {
          $start = $i + 1;
        } else {
          $stack->pop();
          $res = $stack->isEmpty() ? max($res, $i - $start + 1) : max($res, $i - $stack->top());
        }
      }
    }
    return $res;
  }
}