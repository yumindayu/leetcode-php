<?php
class Solution {

  /**
   * @param Integer[] $rec1
   * @param Integer[] $rec2
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php

          ____________________x4,y4
          |                   |
   _______|______x2,y2        |
  |       |______|____________|
  |      x3,y3   |
  |______________|
 x1,y1
  
  [0,0,2,2] [1,1,3,3]

   ___________________  x4,y4
  |                   |
  |            _______|____________x2,y2
  |___________|_______|           |
x3,y3         |                   | 
              |___________________|
            x1,y1
   */
  function isRectangleOverlap($rec1, $rec2) {
    // $rec1[2] <= $rec2[0]; //x 轴：rec1 最右边和 rec2 最左边比较
    // $rec1[3] <= $rec2[1]; //y 轴：rec1 最上 和rec2 的最下比较
    // $rec2[2] <= $rec1[0];
    // $rec2[3] <= $rec1[1];
    return !($rec1[2] <= $rec2[0] || $rec1[3] <= $rec2[1] || $rec2[2] <= $rec1[0] || $rec2[3] <= $rec1[1]);
  }
}