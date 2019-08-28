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
    [15,7],
    [9,20],
    [3],
  ]
   */
  function levelOrderBottom($root) {
    $res = [];
    if (!$root) return $res;

    $queue = [];
    array_push($queue, $root);

    while (!empty($queue)) {
      $list = [];
      foreach ($queue as $r) {
        array_push($list, $r->val);
        if ($r->left != null) {
          array_push($queue, $r->left);
        }
        if ($r->right != null) {
          array_push($queue, $r->right);
        }
        array_shift($queue);
      }
      array_unshift($res, $list);
    }
    return $res;
  }
}




