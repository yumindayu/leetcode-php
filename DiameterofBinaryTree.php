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

  public $max = 0;
  /**
   * @param TreeNode $root
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

          1
         / \
        2   3
       / \     
      4   5 
     /
    6
    直径 左子树最大高度 加右子树最大高度
    高度 max(left, right) + 1
   */
  function diameterOfBinaryTree($root) {
    if ($root == null) return 0;
    $this->helper($root);
    return $this->max;
  }

  function helper($root) {
    $left = $root->left == null ? 0 : $this->helper($root->left) + 1;
    $right = $root->right == null ? 0 : $this->helper($root->right) + 1;
    $this->max = max($this->max, $left + $right);
    return max($left, $right);
  }
}