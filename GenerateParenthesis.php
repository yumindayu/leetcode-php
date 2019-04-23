<?php
class Solution {

    /**
     * @param Integer $n
     * @return String[]

     给出 n 代表生成括号的对数，请你写出一个函数，使其能够生成所有可能的并且有效的括号组合。

     例如，给出 n = 3，生成结果为：
     [
        "((()))",
        "(()())",
        "(())()",
        "()(())",
        "()()()"
     ]
     */
    public $list = [];
    
    function generateParenthesis($n) {
       $this->_gen(0, 0, $n, "");
       return $this->list;
    }

    private function _gen($left, $right, $num, $result) {
      if ($left == $num && $right == $num) {
        array_push($this->list, $result);
        return;
      }
      if ($left < $num) {
        $this->_gen($left + 1, $right, $num, $result . "(");
      }
      if ($right < $num && $left > $right) {
        $this->_gen($left, $right + 1, $num, $result . ")");
      }
    }
}