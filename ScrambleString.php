<?php
class Solution {

  /**
   * @param String $s1
   * @param String $s2
   * @return Boolean
   *
   * @github https://github.com/yumindayu/leetcode-php

   great    g   reat    g reat
  
   reatg    r   eatg    reat g
   */
  function isScramble($s1, $s2) {
    if (strlen($s1) != strlen($s2)) return false;
    if ($s1 == $s2) return true;

    $str1 = $s1;
    $str2 = $s2;

    $string1 = str_split($str1);
    sort($string1);
    $str1 = implode('', $string1); 

    $string2 = str_split($str2);
    sort($string2);
    $str2 = implode('', $string2);

    if ($str1 != $str2) return false;

    for ($i = 1; $i < strlen($s1); $i++) {
        
      if ($this->isScramble(substr($s1, 0, $i), substr($s2, 0, $i)) && $this->isScramble(substr($s1, $i), substr($s2, $i))) return true;
          
      if ($this->isScramble(substr($s1, 0, $i), substr($s2, strlen($s2) - $i)) && $this->isScramble(substr($s1, $i), substr($s2, 0, strlen($s2) - $i))) return true;

    }
    return false;
  }
}