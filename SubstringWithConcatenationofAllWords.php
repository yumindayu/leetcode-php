<?php
class Solution {

  /**
   * @param String $s
   * @param String[] $words
   * @return Integer[]

   s = "barfoothefoobarman",
   words = ["foo","bar"]

   */
  function findSubstring($s, $words) {
    $map = [];
    $ret = [];
    if (!$s || $!$words) return $ret;
    $words_count = count($words);
    $words_length = strlen($words[0]);

    foreach ($words as $word) {
      if (isset($map[$word])) {
        $map[$word] += 1;
      } else {
        $map[$word] = 1;
      }
    }
    //  s = "barfoothefoobarman" 
    // map : [bar => 0, foo => 1]
    for ($i = 0; $i <= strlen($s) - $words_count * $words_length; $i++) {
      $map_as_valid = $map;
      $num = 0;
      $j = $i;
      while ($num < $words_count) {
        $str = substr($s, $j, $words_length);
        if (!isset($map_as_valid[$str]) || $map_as_valid[$str] < 1) {
          unset($map_as_valid);
          break;
        }
        $map_as_valid[$str] -= 1;
        $num++;
        $j = $j + $words_length;
      }
      if ($num == $words_count) {
        array_push($ret, $i);
      }
    }
    return $ret;
  }
}