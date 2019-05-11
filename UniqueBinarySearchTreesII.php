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
   * @param Integer $n
   * @return TreeNode[]
   *
   * @github https://github.com/yumindayu/leetcode-php


           4
          / \
          2  6
         / \ /
        1  3 5
   */
  function generateTrees($n) {
    if ($n == 0) return [];
    return $this->gen(1, $n);
  }

  function gen($start, $end) {
    $res = [];
    if ($start > $end) {
      array_push($res, $null);
    }

    for ($i = $start; $i <= $end; $i++) {
      $left = $this->gen($start, $i - 1);
      $right = $this->gen($i + 1, $end);
      foreach ($left as $l) {
        foreach ($right as $r) {
          $node = new TreeNode($i);
          $node->left = $l;
          $node->right = $r;
          array_push($res, $node);
        }
      }
    }
    return $res;
  }
}