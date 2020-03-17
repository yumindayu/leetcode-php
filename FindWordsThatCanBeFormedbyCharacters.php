<?php
class Solution {

  /**
   * @param String[] $words
   * @param String $chars
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

  输入：words = ["cat","bt","hat","tree"], chars = "atach"
  输出：6
  解释： 
  可以形成字符串 "cat" 和 "hat"，所以答案是 3 + 3 = 6。

  {a => 2, t => 1, c => 1, h => 1}
  

   */
  function countCharacters($words, $chars) {
    $map = [];
    for ($i = 0; $i < strlen($chars); $i++) {
      if (isset($map[$chars[$i]])) {
        $map[$chars[$i]] += 1;
      } else {
        $map[$chars[$i]] = 1;
      }
    }
    $length = 0;
    foreach ($words as $word) {
      if ($this->checkWord($map, $word)) {
        $length += strlen($word);
      }
    }
    return $length;
  }

  public function checkWord($map, $word) {
    for ($i = 0; $i < strlen($word); $i++) {
      if (!isset($map[$word[$i]]) || $map[$word[$i]] == 0) {
        return false;
      } else {
        $map[$word[$i]]--;
      }
    }
    return $word;
  }
}