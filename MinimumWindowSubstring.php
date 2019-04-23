<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     输入: S = "ADOBECODEBANC", T = "ABC"
     输出: "BANC"

     map{A:1,B:1,C:1} //A:1  代表我们还需要找1个A

     ADOBECODEBANC   
    [ ] 发现有A {A:0,B:1,C:1} length = 1;

    ADOB ECODEBANC 
   [    ] 发现有B {A:0,B:0,C:1} length = 2;

    ADOBEC ODEBANC 
   [      ] 发现有C {A:0,B:0,C:0} length = 3 纪录字符串继续找 发现A>=0 说明在使用中 left++ 
                                                           length-- == 2{A:1,B:0,C:0}

    A DOBECODEB ANC
     [         ]  发现有B {A:1,B:－1,C:0} length=2

    A DOBECODEBA NC
     [          ]  发现有A {A:0,B:－1,C:0}  length=3 纪录字符串继续找 第一个B等于－1 说明有重复的，{A:0,B:0,C:0},发现C，C在使用中 length=2 {A:0,B:0,C:1}  left++

    A DOBEC ODE BANC
               [    ]  发现有C {A:0,B:0,C:0}  length=3 纪录字符串继续找 

    
     */
   
    function minWindow($s, $t) {
      if (strlen($s) < strlen($t)) return "";
      $map = [];
      for ($i = 0; $i < strlen($t); $i++) {
        if (isset($map[$t[$i]])) {
          $map[$t[$i]]++;
        } else {
          $map[$t[$i]] = 1;
        }
      }
      // {A:1,B:1,C:1}
      $count = 0; //当前已经找到多少个字符
      $left = 0;
      $min = PHP_INT_MAX;
      for ($right = 0; $right < strlen($s); $right++) {
        if (isset($map[$s[$right]])) {
          if ($map[$s[$right]] > 0) {
            $count++;
          }
          $map[$s[$right]]--;
        }
        while ($count == strlen($t)) {
          if ($right - $left < $min) {
            $min = $right - $left;
            $head = $left;
            $end = $right;
          }
          if (isset($map[$s[$left]])) {
            if ($map[$s[$left]] >= 0) {
              $count--;
            }
            $map[$s[$left]]++;
          }
          $left++;
        }
      }
      if ($min == PHP_INT_MAX) return "";
      return substr($s, $head, $end - $head + 1);
    }
}
























