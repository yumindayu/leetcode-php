<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

  /**
   * @param TreeNode $root
   * @return Integer[][]
   * @github https://github.com/yumindayu/leetcode-php

    3
   / \
  9  20
    /  \
   15   7

   [
      [3],
      [20,9],
      [15,7]
   ]


   */
  function zigzagLevelOrder($root) {
    $res = [];
    if (!$root) return $res;
    $queue = [];
    array_push($queue, $root);
    $level = 0;
    while (!empty($queue)) {
      $list = [];
      foreach ($queue as $r) {
        if ($level % 2 == 0) {
          array_push($list, $r->val);
        } else {
          array_unshift($list, $r->val);
        }
        if ($r->left != null) array_push($queue, $r->left);
        if ($r->right != null) array_push($queue, $r->right);
        array_shift($queue);
      }
      array_push($res, $list);
      $level++;
    }
    return $res;
  }
}


