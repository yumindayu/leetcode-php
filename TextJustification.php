<?php
class Solution {

  /**
   * @param String[] $words
   * @param Integer $maxWidth
   * @return String[]
    输入:
    words = ["This", "is", "an", "example", "of", "text", "justification."]
    maxWidth = 16
    输出:
    [
       "This    is    an",
       "example  of text",
       "justification.  "
    ]
   */
  function fullJustify($words, $maxWidth) {
    $start = 0;
    $ret = [];
    while ($start < count($words)) {
      $len = strlen($words[$start]);
      $next = $start + 1;
      while ($next < count($words)) {
        if (strlen($words[$next]) + $len + 1 > $maxWidth) break;
        $len += strlen($words[$next]) + 1;
        $next++;
      }
      $str = "";
      $str .= $words[$start];
      $space = $next - $start - 1; //空格的位置的个数
      if ($next == count($words) || $space == 0) { //最后一行
        for ($i = $start + 1; $i < $next; $i++) {
          $str .= " ";
          $str .= $words[$i];
        }
        for ($i = strlen($str); $i < $maxWidth; $i++) {
          $str .= " ";
        }
      } else {
        $space_num = floor(($maxWidth - $len) / $space); //每个单词之间空格的平均数
        $carry = ($maxWidth - $len) % $space;
        for ($i = $start + 1; $i < $next; $i++) {
          $str .= " ";
          for ($k = $space_num; $k > 0; $k--) {
            $str .= " ";
          }
          if ($carry > 0) {
            $str .= " ";
            $carry--;
          }
          $str .= $words[$i];
        }
      }
      $start = $next;
      array_push($ret, $str);
    }
    return $ret;
  }
}